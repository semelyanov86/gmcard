<?php

declare(strict_types=1);

namespace App\Actions\City;

use App\Data\CityData;
use App\Models\City;
use Lorisleiva\Actions\Concerns\AsAction;

/**
 * @method static CityData[] run(string $query)
 */
final readonly class SearchCityAction
{
    use AsAction;

    private const MIN_QUERY_LENGTH = 2;

    private const MAX_RESULTS = 20;

    /**
     * @return CityData[]
     */
    public function handle(string $query): array
    {
        $query = mb_trim($query);

        if (mb_strlen($query) < self::MIN_QUERY_LENGTH) {
            return [];
        }

        $searchTerm = mb_strtolower($query);
        $likePattern = "%{$searchTerm}%";
        $startsWithPattern = "{$searchTerm}%";

        $cities = City::query()
            ->select('id', 'name', 'country')
            ->where(function ($q) use ($likePattern): void {
                $q->whereRaw('LOWER(name) LIKE ?', [$likePattern])
                    ->orWhereRaw('LOWER(country) LIKE ?', [$likePattern]);
            })
            ->orderByRaw('
                CASE
                    WHEN LOWER(name) = ? THEN 1
                    WHEN LOWER(name) LIKE ? THEN 2
                    WHEN LOWER(name) LIKE ? THEN 3
                    WHEN LOWER(country) LIKE ? THEN 4
                    ELSE 5
                END
            ', [$searchTerm, $startsWithPattern, $likePattern, $likePattern])
            ->orderBy('name')
            ->limit(self::MAX_RESULTS)
            ->get();

        return CityData::collect($cities, 'array');
    }
}
