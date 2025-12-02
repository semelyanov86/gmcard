<?php

declare(strict_types=1);

namespace App\Actions\Promo;

use App\Data\PromoListItemData;
use App\Enums\Promo\PromoModerationStatus;
use App\Models\Promo;
use Lorisleiva\Actions\Concerns\AsAction;

/**
 * @method static PromoListItemData[] run()
 */
final readonly class GetPendingPromosAction
{
    use AsAction;

    /**
     * @return PromoListItemData[]
     */
    public function handle(): array
    {
        $promos = Promo::where('moderation_status', PromoModerationStatus::PENDING->value)
            ->latest()
            ->get();

        return PromoListItemData::collect($promos, 'array');
    }
}
