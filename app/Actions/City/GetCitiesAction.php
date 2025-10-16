<?php

declare(strict_types=1);

namespace App\Actions\City;

use App\Data\CityData;
use App\Models\City;
use Lorisleiva\Actions\Concerns\AsAction;

/**
 * @method static CityData[] run()
 */
final readonly class GetCitiesAction
{
    use AsAction;

    /**
     * @return CityData[]
     */
    public function handle(): array
    {
        return City::orderBy('name')
            ->get(['id', 'name', 'country'])
            ->map(fn (City $city) => new CityData(
                name: $city->name,
                country: $city->country,
                id: $city->id,
            ))
            ->all();
    }
}

