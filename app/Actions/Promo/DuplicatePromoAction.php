<?php

declare(strict_types=1);

namespace App\Actions\Promo;

use App\Enums\Promo\PromoModerationStatus;
use App\Models\Address;
use App\Models\Promo;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

/**
 * @method static Promo run(Promo $sourcePromo, int $userId)
 */
final readonly class DuplicatePromoAction
{
    use AsAction;

    public function handle(Promo $sourcePromo, int $userId): Promo
    {
        return DB::transaction(function () use ($sourcePromo, $userId): Promo {
            $sourcePromo->loadMissing(['categories', 'cities', 'addresses', 'photos']);

            $newPromo = $sourcePromo->replicate();

            $newPromo->user_id = $userId;
            $newPromo->moderation_status = PromoModerationStatus::DRAFT;
            $newPromo->started_at = null;
            $newPromo->approved_at = null;
            $newPromo->approved_by = null;
            $newPromo->approving_notes = null;
            $newPromo->rejected_at = null;
            $newPromo->rejected_by = null;
            $newPromo->rejection_reason = null;
            $newPromo->rejection_message = null;
            $newPromo->raise_on_top_hours = 0;
            $newPromo->restart_after_finish_days = 0;

            $newPromo->save();

            $newPromo->categories()->sync($sourcePromo->categories->pluck('id')->all());
            $newPromo->cities()->sync($sourcePromo->cities->pluck('id')->all());

            $newAddressIds = [];

            foreach ($sourcePromo->addresses as $address) {
                $newAddress = Address::create([
                    'name' => $address->name,
                    'open_hours' => $address->open_hours,
                    'phone' => $address->phone,
                    'phone_secondary' => $address->phone_secondary,
                    'website' => $address->website,
                ]);
                $newAddressIds[] = $newAddress->id;
            }

            if (! empty($newAddressIds)) {
                $newPromo->addresses()->sync($newAddressIds);
            }

            foreach ($sourcePromo->photos as $photo) {
                $newPromo->photos()->create([
                    'path' => $photo->path,
                    'sort_order' => $photo->sort_order,
                ]);
            }

            return $newPromo;
        });
    }
}
