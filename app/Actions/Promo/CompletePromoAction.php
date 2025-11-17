<?php

declare(strict_types=1);

namespace App\Actions\Promo;

use App\Models\Promo;
use Carbon\CarbonImmutable;
use Lorisleiva\Actions\Concerns\AsAction;

/**
 * @method static Promo run(Promo $promo)
 */
final readonly class CompletePromoAction
{
    use AsAction;

    public function handle(Promo $promo): Promo
    {
        $promo->update([
            'available_till' => CarbonImmutable::now(),
        ]);

        return $promo->fresh();
    }
}

