<?php

declare(strict_types=1);

namespace App\Actions\Promo;

use App\Data\CreatePromoData;
use App\Enums\PromoType;
use App\Models\Address;
use App\Models\Promo;
use App\ValueObjects\MoneyValueObject;
use Illuminate\Http\UploadedFile;
use Lorisleiva\Actions\Concerns\AsAction;
use ValueError;

abstract readonly class AbstractPromoSaveAction
{
    use AsAction;

    final public function uploadOnePhoto(UploadedFile $file): ?string
    {
        $path = $file->store('promos', 'public');

        return $path === false ? null : $path;
    }

    /**
     * @param  array<int, UploadedFile|string|null>|null  $photos
     * @return array<int, string>
     */
    final public function uploadPhotosIndexed(?array $photos): array
    {
        return collect($photos ?? [])
            ->mapWithKeys(function ($file, $index): array {
                $i = (int) $index;

                if ($file instanceof UploadedFile) {
                    $path = $this->uploadOnePhoto($file);

                    return $path !== null ? [$i => $path] : [];
                }

                if (is_string($file)) {
                    return [$i => $file];
                }

                return [];
            })
            ->sortKeys()
            ->all();
    }

    protected function getPromoTypeEnum(int $id): PromoType
    {
        try {
            return PromoType::fromId($id);
        } catch (ValueError) {
            return PromoType::SIMPLE;
        }
    }

    protected function getDiscount(CreatePromoData $dto, PromoType $type): ?string
    {
        if (in_array($type, [PromoType::SIMPLE, PromoType::COUPON, PromoType::GIFT], true) && $dto->discount) {
            return $dto->discount->toString() . ($dto->discount->getCurrency() === 'RUB' ? '₽' : '%');
        }

        if (in_array($type, [PromoType::CASHBACK, PromoType::KONKURS], true) && $dto->cashback) {
            return $dto->cashback->toString() . ($dto->cashback->getCurrency() === 'RUB' ? '₽' : '%');
        }

        return null;
    }

    protected function getAmount(CreatePromoData $dto, PromoType $type): ?MoneyValueObject
    {
        if (in_array($type, [PromoType::SIMPLE, PromoType::COUPON, PromoType::GIFT], true) && $dto->discount) {
            return $dto->discount->getCurrency() === 'RUB' ? $dto->discount : null;
        }

        if (in_array($type, [PromoType::CASHBACK, PromoType::KONKURS], true) && $dto->cashback) {
            return $dto->cashback->getCurrency() === 'RUB' ? $dto->cashback : null;
        }

        return null;
    }

    /**
     * @param  array<string, mixed>|null  $schedule
     */
    protected function getScheduleTime(?array $schedule, string $key): ?string
    {
        if (! is_array($schedule)) {
            return null;
        }

        $timeRange = $schedule['timeRange'] ?? null;
        if (! is_array($timeRange)) {
            return null;
        }

        $value = $timeRange[$key] ?? null;

        return is_string($value) ? $value : null;
    }

    /**
     * @param  array<int, UploadedFile|string>|null  $photos
     */
    protected function handlePhotoUpload(?array $photos): ?string
    {
        if (empty($photos) || ! isset($photos[0])) {
            return null;
        }

        $file = $photos[0];

        if ($file instanceof UploadedFile) {
            $path = $file->store('promos', 'public');

            return $path === false ? null : $path;
        }

        /** @var string|mixed $file */
        return is_string($file) ? $file : null;
    }

    protected function syncRelations(Promo $promo, CreatePromoData $dto): void
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
