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

        return DB::transaction(fn (): Promo => $this->updatePromoWithinTransaction($dto));
    }

    private function updatePromoWithinTransaction(CreatePromoData $dto): Promo
    {
        $promo = Promo::findOrFail($dto->id);

        $updateData = $this->buildUpdateData($promo, $dto);

        $finalPaths = $this->syncPhotosAndGetFinalPaths($promo, $dto);

        if (! empty($finalPaths)) {
            $updateData['img'] = $finalPaths[0];
        }

        $promo->fill($updateData)->save();

        $this->syncRelations($promo, $dto);

        $fresh = $promo->fresh();
        assert($fresh !== null);

        return $fresh;
    }

    /**
     * @return list<string>
     */
    private function syncPhotosAndGetFinalPaths(Promo $promo, CreatePromoData $dto): array
    {
        $uploadedPathsByIndex = $this->uploadPhotosIndexed($dto->photos);

        $finalPaths = [];

        if (array_key_exists(0, $uploadedPathsByIndex)) {
            $finalPaths = [$uploadedPathsByIndex[0]];
        } elseif ($dto->existingPhoto) {
            $finalPaths = [$dto->existingPhoto];
        }

        foreach ($uploadedPathsByIndex as $idx => $path) {
            if ((int) $idx === 0) {
                continue;
            }
            $finalPaths[] = $path;
        }

        $promo->photos()->delete();

        foreach ($finalPaths as $i => $path) {
            $promo->photos()->create([
                'path' => $path,
                'sort_order' => (int) $i,
            ]);
        }

        return $finalPaths;
    }

    /**
     * @return array<string, mixed>
     */
    private function buildUpdateData(Promo $promo, CreatePromoData $dto): array
    {
        $promoType = $this->getPromoTypeEnum($dto->promoTypeId);
        $discount = $this->getDiscount($dto, $promoType);
        $amount = $this->getAmount($dto, $promoType);

        $discountAmount = null;
        $discountCurrency = null;

        if ($dto->discount !== null) {
            $discountAmount = $dto->discount->toFloat();
            $discountCurrency = $dto->discount->getCurrency() === 'RUB' ? 'RUB' : 'PCT';
        } elseif ($dto->cashback !== null) {
            $discountAmount = $dto->cashback->toFloat();
            $discountCurrency = $dto->cashback->getCurrency() === 'RUB' ? 'RUB' : 'PCT';
        }

        $availableTill = $promo->started_at !== null
            ? $promo->started_at->addDays($dto->durationDays)
            : CarbonImmutable::now()->addDays($dto->durationDays);

        $updateData = [
            'promo_type_id' => $dto->promoTypeId,
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
            'img' => $promo->img,
            'free_delivery_from' => $dto->freeDeliveryFrom ?? MoneyValueObject::fromCents(0),
            'discount_amount' => $discountAmount,
            'discount_currency' => $discountCurrency,
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
            } elseif ($promo->moderation_status === PromoModerationStatus::APPROVED) {
                $updateData['moderation_status'] = PromoModerationStatus::PENDING;
                $updateData['approved_at'] = null;
                $updateData['approved_by'] = null;
                $updateData['approving_notes'] = null;
            }
        }

        return $updateData;
    }
}
