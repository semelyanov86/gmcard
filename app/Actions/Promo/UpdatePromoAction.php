<?php

declare(strict_types=1);

namespace App\Actions\Promo;

use App\Actions\Promo\Concerns\InteractsWithPromoFields;
use App\Data\CreatePromoData;
use App\Enums\Promo\PromoModerationStatus;
use App\Models\Address;
use App\Models\Promo;
use App\ValueObjects\MoneyValueObject;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

final readonly class UpdatePromoAction
{
    use AsAction;
    use InteractsWithPromoFields;

    public function handle(Promo $promo, CreatePromoData $dto): Promo
    {
        return DB::transaction(function () use ($promo, $dto): Promo {
            $updateData = $this->buildUpdateData($promo, $dto);

            $promo->fill($updateData)->save();

            $this->syncRelations($promo, $dto);

            $fresh = $promo->fresh();
            assert($fresh !== null);

            return $fresh;
        });
    }

    /**
     * @return array<string, mixed>
     */
    private function buildUpdateData(Promo $promo, CreatePromoData $dto): array
    {
        $promoType = $this->getPromoType($dto->promoTypeId);
        $discount = $this->getDiscount($dto, $promoType);
        $amount = $this->getAmount($dto, $promoType);

        $availableTill = $promo->started_at !== null
            ? $promo->started_at->addDays($dto->durationDays)
            : Carbon::now()->addDays($dto->durationDays);

        $updateData = [
            'name' => $dto->title,
            'type' => $promoType,
            'description' => $dto->description,
            'extra_conditions' => $dto->conditions,
            'free_delivery' => $dto->freeDelivery ?? false,
            'show_on_home' => $dto->showInBanner ?? false,
            'available_till' => $availableTill,
            'discount' => $discount,
            'amount' => $amount,
            'sales_order_from' => $dto->minimumOrder ?? MoneyValueObject::fromCents(0),
            'code' => $dto->promoCode,
            'video_link' => $dto->youtubeUrl,
            'smm_links' => $dto->socialLinks,
            'days_availability' => is_array($dto->schedule) ? ($dto->schedule['days'] ?? null) : null,
            'availabe_from' => $this->getScheduleTime($dto->schedule, 'start'),
            'available_to' => $this->getScheduleTime($dto->schedule, 'end'),
            'img' => $this->resolvePhoto($promo, $dto),
            'free_delivery_from' => $dto->freeDeliveryFrom ?? MoneyValueObject::fromCents(0),
        ];

        if ($dto->isDraft) {
            $updateData['started_at'] = null;
            $updateData['moderation_status'] = PromoModerationStatus::DRAFT;
        } else {
            if ($promo->moderation_status === PromoModerationStatus::REJECTED) {
                $updateData['moderation_status'] = PromoModerationStatus::PENDING;
                $updateData['rejected_at'] = null;
                $updateData['rejected_by'] = null;
                $updateData['rejection_reason'] = null;
            } elseif ($promo->moderation_status === PromoModerationStatus::DRAFT) {
                $updateData['moderation_status'] = PromoModerationStatus::PENDING;
            }
        }

        return $updateData;
    }

    private function resolvePhoto(Promo $promo, CreatePromoData $dto): ?string
    {
        $newPhotoPath = $this->handlePhotoUpload($dto->photos);

        if ($newPhotoPath !== null) {
            return $newPhotoPath;
        }

        if ($dto->existingPhoto) {
            return $dto->existingPhoto;
        }

        return $promo->img;
    }

    private function syncRelations(Promo $promo, CreatePromoData $dto): void
    {
        $promo->categories()->sync($dto->categoryIds);
        $promo->cities()->sync($dto->cityIds);

        $addressIds = [];

        if ($dto->addresses && ! empty($dto->addresses)) {
            foreach ($dto->addresses as $addressData) {
                if (empty($addressData['address']) && empty($addressData['phone'])) {
                    continue;
                }

                $addressCreateData = [
                    'name' => $addressData['address'] ?? '',
                    'open_hours' => ! empty($addressData['schedule']) ? ['schedule' => $addressData['schedule']] : null,
                    'phone' => $addressData['phone'] ?? '',
                    'phone_secondary' => $addressData['phone2'] ?? null,
                ];

                $address = Address::create($addressCreateData);
                $addressIds[] = $address->id;
            }
        }

        if (! empty($addressIds)) {
            $promo->addresses()->sync($addressIds);
        } else {
            $promo->addresses()->detach();
        }
    }
}
