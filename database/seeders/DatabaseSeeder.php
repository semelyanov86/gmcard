<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Auth\RolesSeeder;
use Database\Seeders\Auth\PermissionsSeeder;
use Database\Seeders\Base\CategorySeeder;
use Database\Seeders\Base\CitySeeder;
use Database\Seeders\Base\UserSeeder;
use Database\Seeders\Business\AddressSeeder;
use Database\Seeders\Business\AdvCampaignSeeder;
use Database\Seeders\Business\OrganisationSeeder;
use Database\Seeders\Finance\PaymentSeeder;
use Database\Seeders\Finance\SubscriptionSeeder;
use Database\Seeders\Promo\BonusSeeder;
use Database\Seeders\Promo\PromoSeeder;
use Database\Seeders\Promo\PromoUsageSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RolesSeeder::class,
            PermissionsSeeder::class,
        ]);

        $this->call(CreateSuperAdminSeeder::class);

        $this->call([
            CitySeeder::class,
            CategorySeeder::class,
            UserSeeder::class,

            AddressSeeder::class,
            OrganisationSeeder::class,
            AdvCampaignSeeder::class,

            PromoSeeder::class,
            PromoUsageSeeder::class,
            BonusSeeder::class,

            PaymentSeeder::class,
            SubscriptionSeeder::class,
        ]);
    }
}
