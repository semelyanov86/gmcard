<?php

declare(strict_types=1);

namespace App\Actions\PromoButton;

use App\Data\PromoActionButtonData;
use App\Models\PromoActionButton;
use Lorisleiva\Actions\Concerns\AsAction;

/**
 * @method static PromoActionButtonData[] run()
 */
final readonly class GetPromoActionButtonsAction
{
    use AsAction;

    /**
     * @return PromoActionButtonData[]
     */
    public function handle(): array
    {
        $items = PromoActionButton::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get(['id', 'title']);

        return PromoActionButtonData::collect($items, 'array');
    }
}
