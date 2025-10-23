<?php

declare(strict_types=1);

namespace Tests\Feature\Actions\Promo;

use App\Actions\Promo\CreatePromoAction;
use App\Data\CreatePromoData;
use App\Models\Category;
use App\Models\City;
use App\Models\Promo;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreatePromoActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_creates_promo_with_required_fields(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $categories = Category::factory()->count(2)->create();
        $cities = City::factory()->count(2)->create();

        $dto = new CreatePromoData(
            userId: $user->id,
            title: 'Test Promo',
            promoTypeId: 1,
            description: 'Test description',
            conditions: 'Test conditions',
            durationDays: 7,
            categoryIds: $this->getCategoryIds($categories),
            cityIds: $this->getCityIds($cities),
        );

        $promo = CreatePromoAction::run($dto);

        $this->assertInstanceOf(Promo::class, $promo);
        $this->assertDatabaseHas('promos', [
            'id' => $promo->id,
            'user_id' => $user->id,
            'name' => 'Test Promo',
            'description' => 'Test description',
            'extra_conditions' => 'Test conditions',
        ]);
    }

    public function test_creates_promo_with_discount(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $categories = Category::factory()->count(1)->create();
        $cities = City::factory()->count(1)->create();

        $dto = new CreatePromoData(
            userId: $user->id,
            title: 'Discount Promo',
            promoTypeId: 1,
            description: 'Description',
            conditions: 'Conditions',
            durationDays: 10,
            categoryIds: $this->getCategoryIds($categories),
            cityIds: $this->getCityIds($cities),
            discountAmount: '25',
            discountCurrency: '%',
        );

        $promo = CreatePromoAction::run($dto);

        $this->assertDatabaseHas('promos', [
            'id' => $promo->id,
            'discount' => '25%',
        ]);
    }

    public function test_creates_promo_with_cashback(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $categories = Category::factory()->count(1)->create();
        $cities = City::factory()->count(1)->create();

        $dto = new CreatePromoData(
            userId: $user->id,
            title: 'Cashback Promo',
            promoTypeId: 6,
            description: 'Description',
            conditions: 'Conditions',
            durationDays: 14,
            categoryIds: $this->getCategoryIds($categories),
            cityIds: $this->getCityIds($cities),
            cashbackAmount: '500',
            cashbackCurrency: '₽',
        );

        $promo = CreatePromoAction::run($dto);

        $this->assertDatabaseHas('promos', [
            'id' => $promo->id,
            'discount' => '500₽',
        ]);
    }

    public function test_syncs_categories(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $categories = Category::factory()->count(3)->create();
        $cities = City::factory()->count(1)->create();

        $dto = new CreatePromoData(
            userId: $user->id,
            title: 'Test Promo',
            promoTypeId: 1,
            description: 'Description',
            conditions: 'Conditions',
            durationDays: 7,
            categoryIds: $this->getCategoryIds($categories),
            cityIds: $this->getCityIds($cities),
        );

        $promo = CreatePromoAction::run($dto);

        $this->assertCount(3, $promo->categories);
        $firstCategory = $categories->first();
        assert($firstCategory instanceof Category);
        $this->assertTrue($promo->categories->contains($firstCategory));
    }

    public function test_syncs_cities(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $categories = Category::factory()->count(1)->create();
        $cities = City::factory()->count(3)->create();

        $dto = new CreatePromoData(
            userId: $user->id,
            title: 'Test Promo',
            promoTypeId: 1,
            description: 'Description',
            conditions: 'Conditions',
            durationDays: 7,
            categoryIds: $this->getCategoryIds($categories),
            cityIds: $this->getCityIds($cities),
        );

        $promo = CreatePromoAction::run($dto);

        $this->assertCount(3, $promo->cities);
        $firstCity = $cities->first();
        assert($firstCity instanceof City);
        $this->assertTrue($promo->cities->contains($firstCity));
    }

    public function test_creates_draft_promo(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $categories = Category::factory()->count(1)->create();
        $cities = City::factory()->count(1)->create();

        $dto = new CreatePromoData(
            userId: $user->id,
            title: 'Draft Promo',
            promoTypeId: 1,
            description: 'Description',
            conditions: 'Conditions',
            durationDays: 7,
            categoryIds: $this->getCategoryIds($categories),
            cityIds: $this->getCityIds($cities),
            isDraft: true,
        );

        $promo = CreatePromoAction::run($dto);

        $this->assertNull($promo->started_at);
    }

    public function test_creates_published_promo(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $categories = Category::factory()->count(1)->create();
        $cities = City::factory()->count(1)->create();

        $dto = new CreatePromoData(
            userId: $user->id,
            title: 'Published Promo',
            promoTypeId: 1,
            description: 'Description',
            conditions: 'Conditions',
            durationDays: 7,
            categoryIds: $this->getCategoryIds($categories),
            cityIds: $this->getCityIds($cities),
            isDraft: false,
        );

        $promo = CreatePromoAction::run($dto);

        $this->assertNotNull($promo->started_at);
    }

    public function test_converts_minimum_order_amount_to_minor_units(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $categories = Category::factory()->count(1)->create();
        $cities = City::factory()->count(1)->create();

        $dto = new CreatePromoData(
            userId: $user->id,
            title: 'Test Promo',
            promoTypeId: 1,
            description: 'Description',
            conditions: 'Conditions',
            durationDays: 7,
            categoryIds: $this->getCategoryIds($categories),
            cityIds: $this->getCityIds($cities),
            minimumOrderAmount: '100.50',
        );

        $promo = CreatePromoAction::run($dto);

        $this->assertSame(10050, $promo->sales_order_from);
    }

    public function test_calculates_available_till_correctly(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $categories = Category::factory()->count(1)->create();
        $cities = City::factory()->count(1)->create();

        $dto = new CreatePromoData(
            userId: $user->id,
            title: 'Test Promo',
            promoTypeId: 1,
            description: 'Description',
            conditions: 'Conditions',
            durationDays: 7,
            categoryIds: $this->getCategoryIds($categories),
            cityIds: $this->getCityIds($cities),
        );

        $promo = CreatePromoAction::run($dto);

        $promo->refresh();
        $expectedDate = now()->addDays(7);
        /** @var \Carbon\CarbonImmutable $availableTill */
        $availableTill = $promo->available_till;
        $this->assertEqualsWithDelta(
            $expectedDate->timestamp,
            $availableTill->timestamp,
            5
        );
    }

    public function test_creates_promo_with_optional_fields(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $categories = Category::factory()->count(1)->create();
        $cities = City::factory()->count(1)->create();

        $dto = new CreatePromoData(
            userId: $user->id,
            title: 'Full Promo',
            promoTypeId: 1,
            description: 'Description',
            conditions: 'Conditions',
            durationDays: 7,
            categoryIds: $this->getCategoryIds($categories),
            cityIds: $this->getCityIds($cities),
            promoCode: 'TEST123',
            youtubeUrl: 'https://youtube.com/watch?v=test',
            freeDelivery: true,
            showInBanner: true,
            photos: ['photo1.jpg', 'photo2.jpg'],
        );

        $promo = CreatePromoAction::run($dto);

        $this->assertDatabaseHas('promos', [
            'id' => $promo->id,
            'code' => 'TEST123',
            'video_link' => 'https://youtube.com/watch?v=test',
            'free_delivery' => true,
            'show_on_home' => true,
            'img' => 'photo1.jpg',
        ]);
    }

    public function test_transaction_rollback_on_error(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $categories = Category::factory()->count(1)->create();

        $dto = new CreatePromoData(
            userId: $user->id,
            title: 'Test Promo',
            promoTypeId: 1,
            description: 'Description',
            conditions: 'Conditions',
            durationDays: 7,
            categoryIds: $this->getCategoryIds($categories),
            cityIds: [99999],
        );

        $this->expectException(Exception::class);

        CreatePromoAction::run($dto);

        $this->assertDatabaseMissing('promos', [
            'name' => 'Test Promo',
        ]);
    }

    /**
     * @param  Collection<int, Model>  $categories
     * @return array<int, string>
     */
    private function getCategoryIds(Collection $categories): array
    {
        $ids = [];
        foreach ($categories as $category) {
            /** @var Category $category */
            $ids[] = (string) $category->id;
        }

        return $ids;
    }

    /**
     * @param  Collection<int, Model>  $cities
     * @return array<int, int>
     */
    private function getCityIds(Collection $cities): array
    {
        $ids = [];
        foreach ($cities as $city) {
            /** @var City $city */
            $ids[] = (int) $city->id;
        }

        return $ids;
    }
}
