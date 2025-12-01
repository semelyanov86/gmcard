<?php

declare(strict_types=1);

namespace Tests\Feature\Actions\Promo;

use App\Actions\Promo\BuildPromoFormDataAction;
use App\Data\PromoFormData;
use App\Enums\Promo\PromoModerationStatus;
use App\Enums\PromoType as PromoTypeEnum;
use App\Models\Address;
use App\Models\Category;
use App\Models\City;
use App\Models\Promo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BuildPromoFormDataActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_builds_basic_fields(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Promo $promo */
        $promo = Promo::factory()->create([
            'user_id' => $user->id,
            'name' => 'Test Promo',
            'description' => 'Test description',
            'extra_conditions' => 'Test conditions',
            'code' => 'TEST123',
            'img' => 'test.jpg',
            'video_link' => 'https://example.com/video',
            'smm_links' => ['instagram' => 'https://instagram.com/test'],
            'show_on_home' => true,
            'free_delivery' => true,
            'moderation_status' => PromoModerationStatus::APPROVED,
        ]);

        $result = BuildPromoFormDataAction::run($promo);

        $this->assertInstanceOf(PromoFormData::class, $result);
        $this->assertSame($promo->id, $result->id);
        $this->assertSame('Test Promo', $result->title);
        $this->assertSame('Test description', $result->description);
        $this->assertSame('Test conditions', $result->conditions);
        $this->assertSame('TEST123', $result->promoCode);
        $this->assertSame('test.jpg', $result->existingPhoto);
        $this->assertSame('https://example.com/video', $result->youtubeUrl);
        $this->assertSame(['instagram' => 'https://instagram.com/test'], $result->socialLinks);
        $this->assertTrue($result->showInBanner);
        $this->assertTrue($result->freeDelivery);
        $this->assertFalse($result->isDraft);
    }

    public function test_splits_discount_and_cashback(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Promo $discountPromo */
        $discountPromo = Promo::factory()->create([
            'user_id' => $user->id,
            'type' => PromoTypeEnum::SIMPLE,
            'discount' => '25%',
        ]);

        $discountResult = BuildPromoFormDataAction::run($discountPromo);

        $this->assertSame(['amount' => 25.0, 'currency' => '%'], $discountResult->discount);
        $this->assertNull($discountResult->cashback);

        /** @var Promo $cashbackPromo */
        $cashbackPromo = Promo::factory()->create([
            'user_id' => $user->id,
            'type' => PromoTypeEnum::CASHBACK,
            'discount' => '500₽',
        ]);

        $cashbackResult = BuildPromoFormDataAction::run($cashbackPromo);

        $this->assertNull($cashbackResult->discount);
        $this->assertSame(['amount' => 500.0, 'currency' => '₽'], $cashbackResult->cashback);
    }

    public function test_builds_schedule_and_relations(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        $categories = Category::factory()->count(2)->create();
        $cities = City::factory()->count(2)->create();
        /** @var Address $address */
        $address = Address::factory()->create([
            'name' => 'Test Address',
            'open_hours' => ['schedule' => 'Mon-Fri 9-18'],
        ]);

        /** @var Promo $promo */
        $promo = Promo::factory()->create([
            'user_id' => $user->id,
            'days_availability' => ['monday', 'wednesday'],
            'availabe_from' => now()->toImmutable()->startOfDay()->addHours(9),
            'available_to' => now()->toImmutable()->startOfDay()->addHours(18),
        ]);

        $promo->categories()->attach($categories->pluck('id'));
        $promo->cities()->attach($cities->pluck('id'));
        $promo->addresses()->attach($address);

        $result = BuildPromoFormDataAction::run($promo);

        $this->assertTrue($result->schedule['enabled']);
        $this->assertSame(['monday', 'wednesday'], $result->schedule['days']);
        $this->assertTrue($result->schedule['timeRange']['enabled']);
        $this->assertSame('00:00', $result->schedule['timeRange']['start']);
        $this->assertSame('18:00', $result->schedule['timeRange']['end']);

        $this->assertCount(2, $result->categoryIds);
        $this->assertContains((string) $categories->first()->id, $result->categoryIds);
        $this->assertCount(2, $result->cityIds);
        $this->assertContains($cities->first()->id, $result->cityIds);

        $this->assertCount(1, $result->addresses);
        $this->assertSame('Test Address', $result->addresses[0]['address']);
        $this->assertSame('Mon-Fri 9-18', $result->addresses[0]['schedule']);
    }

    public function test_maps_promo_type_and_draft_flag(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Promo $promo */
        $promo = Promo::factory()->create([
            'user_id' => $user->id,
            'promo_type_id' => null,
            'type' => PromoTypeEnum::COUPON,
            'moderation_status' => PromoModerationStatus::DRAFT,
        ]);

        $result = BuildPromoFormDataAction::run($promo);

        $this->assertSame(2, $result->promoTypeId);
        $this->assertTrue($result->isDraft);
    }
}
