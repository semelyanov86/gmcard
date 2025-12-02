<?php

declare(strict_types=1);

namespace App\Data\Modals;

use App\Models\Promo;
use Spatie\LaravelData\Data;

final class RejectPromoModalData extends Data
{
    public function __construct(
        public int $promoId,
    ) {}

    public static function fromPromo(Promo $promo): self
    {
        return new self(
            promoId: $promo->id,
        );
    }
}
