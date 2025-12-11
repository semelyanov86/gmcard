<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Category;
use Database\Seeders\Auth\PermissionsSeeder;
use Database\Seeders\Auth\RolesSeeder;
use Database\Seeders\Base\CitySeeder;
use Database\Seeders\Base\UserSeeder;
use Database\Seeders\Business\AddressSeeder;
use Database\Seeders\Business\AdvCampaignSeeder;
use Database\Seeders\Business\OrganisationSeeder;
use Database\Seeders\Categories\AutoSeeder;
use Database\Seeders\Categories\CategoryKidsSeeder;
use Database\Seeders\Categories\EducationSeeder;
use Database\Seeders\Categories\ElectroSeeder;
use Database\Seeders\Categories\FashionSeeder;
use Database\Seeders\Categories\GiftsSeeder;
use Database\Seeders\Categories\HealthSeeder;
use Database\Seeders\Categories\HomeSeeder;
use Database\Seeders\Categories\PetsSeeder;
use Database\Seeders\Categories\RestaurantsSeeder;
use Database\Seeders\Categories\SportSeeder;
use Database\Seeders\Categories\TravelSeeder;
use Database\Seeders\Finance\PaymentSeeder;
use Database\Seeders\Finance\SubscriptionSeeder;
use Database\Seeders\Finance\VirtualBalanceSeeder;
use Database\Seeders\Promo\BonusSeeder;
use Database\Seeders\Promo\PlanFeaturesSeeder;
use Database\Seeders\Promo\PromoSeeder;
use Database\Seeders\Promo\PromoUsageSeeder;
use Database\Seeders\Promo\TariffPlansSeeder;
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
            MenuSeeder::class,
            TariffPlansSeeder::class,
            PlanFeaturesSeeder::class,
            CategoryKidsSeeder::class,
            FashionSeeder::class,
            ElectroSeeder::class,
            HomeSeeder::class,
            RestaurantsSeeder::class,
            GiftsSeeder::class,
            HealthSeeder::class,
            SportSeeder::class,
            AutoSeeder::class,
            EducationSeeder::class,
            PetsSeeder::class,
            TravelSeeder::class,
            UserSeeder::class,

            AddressSeeder::class,
            OrganisationSeeder::class,
            AdvCampaignSeeder::class,

            PromoTypeSeeder::class,
            PromoSeeder::class,
            PromoUsageSeeder::class,
            BonusSeeder::class,

            PaymentSeeder::class,
            SubscriptionSeeder::class,
            VirtualBalanceSeeder::class,
        ]);

        Category::fixTree();
    }
}
