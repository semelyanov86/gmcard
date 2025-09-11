<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            Base\CitySeeder::class,
            Base\CategorySeeder::class,
            Base\UserSeeder::class,

            Business\AddressSeeder::class,
            Business\OrganisationSeeder::class,
            Business\AdvCampaignSeeder::class,

            Media\MediaSeeder::class,

            Promo\PromoSeeder::class,
            Promo\PromoUsageSeeder::class,
            Promo\BonusSeeder::class,

            Finance\PaymentSeeder::class,
            Finance\SubscriptionSeeder::class,
        ]);

        $this->call(CreateAdminSeeder::class);
    }
}
