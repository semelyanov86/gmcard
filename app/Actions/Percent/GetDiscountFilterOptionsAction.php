<?php

declare(strict_types=1);

namespace App\Actions\Percent;

use App\Data\DiscountFilterOptionData;
use App\Models\DiscountFilterOption;
use Lorisleiva\Actions\Concerns\AsAction;

/**
 * @method static DiscountFilterOptionData[] run()
 */
final readonly class GetDiscountFilterOptionsAction
{
    use AsAction;

    /**
     * @return DiscountFilterOptionData[]
     */
    public function handle(): array
    {
        $options = DiscountFilterOption::query()
            ->orderBy('sort_order')
            ->get(['id', 'min_percent']);

        return DiscountFilterOptionData::collect($options, 'array');
    }
}
