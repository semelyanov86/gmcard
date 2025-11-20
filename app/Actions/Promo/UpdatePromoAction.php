<?php

declare(strict_types=1);

namespace App\Actions\Promo;

use App\Data\CreatePromoData;
use App\Enums\Promo\PromoModerationStatus;
use App\Models\Promo;
use App\ValueObjects\MoneyValueObject;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

/**
 * @method static Promo run(CreatePromoData $dto)
 */
final readonly class UpdatePromoAction extends AbstractPromoSaveAction
{
    public function handle(CreatePromoData $dto): Promo
    {
        if ($dto->id === null) {
            throw ValidationException::withMessages([
                'id' => 'Promo ID is required for update',
            ]);
        }

        return DB::transaction(function () use ($dto): Promo {
            $promo = Promo::findOrFail($dto->id);

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
        $promoType = $this->getPromoTypeEnum($dto->promoTypeId);
        $discount = $this->getDiscount($dto, $promoType);
        $amount = $this->getAmount($dto, $promoType);

        $availableTill = $promo->started_at !== null
            ? $promo->started_at->addDays($dto->durationDays)
            : CarbonImmutable::now()->addDays($dto->durationDays);

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
}
