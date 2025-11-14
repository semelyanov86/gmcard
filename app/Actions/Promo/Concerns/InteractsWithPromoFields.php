<?php

declare(strict_types=1);

namespace App\Actions\Promo\Concerns;

use App\Data\CreatePromoData;
use App\Enums\PromoType;
use App\ValueObjects\MoneyValueObject;
use Illuminate\Http\UploadedFile;

trait InteractsWithPromoFields
{
    protected function getPromoType(int $id): PromoType
    {
        return match ($id) {
            1 => PromoType::SIMPLE,
            2 => PromoType::COUPON,
            3 => PromoType::GIFT,
            4 => PromoType::ONE_PLUS_ONE,
            5 => PromoType::TWO_PLUS_ONE,
            6 => PromoType::CASHBACK,
            7 => PromoType::KONKURS,
            default => PromoType::SIMPLE,
        };
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

        if (is_string($file)) {
            return $file;
        }

        return null;
    }
}

