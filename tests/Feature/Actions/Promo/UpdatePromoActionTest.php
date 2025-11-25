<?php

declare(strict_types=1);

namespace Tests\Feature\Actions\Promo;

use App\Actions\Promo\UpdatePromoAction;
use App\Data\CreatePromoData;
use App\Enums\Promo\PromoModerationStatus;
use App\Models\Category;
use App\Models\City;
use App\Models\Promo;
use App\Models\User;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class UpdatePromoActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_updates_promo_fields(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        /** @var Promo $promo */
        $promo = Promo::factory()->create([
            'user_id' => $user->id,
            'name' => 'Old Title',
            'description' => 'Old description',
        ]);
        $categories = Category::factory()->count(2)->create();
        $cities = City::factory()->count(2)->create();

        $dto = $this->createUpdateDto($promo, $user, $categories, $cities, [
            'title' => 'New Title',
            'description' => 'New description',
            'conditions' => 'New conditions',
            'durationDays' => 10,
        ]);

        $result = UpdatePromoAction::run($dto);

        $this->assertEquals($promo->id, $result->id);
        $this->assertEquals('New Title', $result->name);
        $this->assertEquals('New description', $result->description);
        $this->assertEquals('New conditions', $result->extra_conditions);
    }

    public function test_recalculates_available_till_based_on_started_at(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $startedAt = CarbonImmutable::now()->subDays(2);
        /** @var Promo $promo */
        $promo = Promo::factory()->create([
            'user_id' => $user->id,
            'started_at' => $startedAt,
            'available_till' => $startedAt->addDays(5),
        ]);
        $categories = new Collection([Category::factory()->createOne()]);
        $cities = new Collection([City::factory()->createOne()]);

        $dto = $this->createUpdateDto($promo, $user, $categories, $cities, [
            'durationDays' => 10,
        ]);

        $result = UpdatePromoAction::run($dto);

        $expectedAvailableTill = $startedAt->addDays(10);
        $this->assertNotNull($result->available_till);
        $this->assertEqualsWithDelta(
            $expectedAvailableTill->timestamp,
            $result->available_till->timestamp,
            5
        );
    }

    public function test_recalculates_available_till_when_started_at_is_null(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        /** @var Promo $promo */
        $promo = Promo::factory()->create([
            'user_id' => $user->id,
            'started_at' => null,
        ]);
        $categories = new Collection([Category::factory()->createOne()]);
        $cities = new Collection([City::factory()->createOne()]);

        $before = CarbonImmutable::now();

        $dto = $this->createUpdateDto($promo, $user, $categories, $cities);

        $result = UpdatePromoAction::run($dto);

        $after = CarbonImmutable::now();
        $this->assertNotNull($result->available_till);
        $expectedMin = $before->addDays(7)->timestamp;
        $expectedMax = $after->addDays(7)->timestamp;
        $actualTimestamp = $result->available_till->timestamp;

        $this->assertGreaterThanOrEqual($expectedMin, $actualTimestamp);
        $this->assertLessThanOrEqual($expectedMax, $actualTimestamp);
    }

    public function test_syncs_categories(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        /** @var Promo $promo */
        $promo = Promo::factory()->create(['user_id' => $user->id]);
        $oldCategories = Category::factory()->count(2)->create();
        $promo->categories()->attach($oldCategories->pluck('id')->toArray());

        $newCategories = Category::factory()->count(3)->create();
        $cities = new Collection([City::factory()->createOne()]);

        $dto = $this->createUpdateDto($promo, $user, $newCategories, $cities);

        UpdatePromoAction::run($dto);

        $promo->refresh();
        $this->assertCount(3, $promo->categories);
        $firstNewCategory = $newCategories->first();
        $this->assertNotNull($firstNewCategory);
        $this->assertInstanceOf(Category::class, $firstNewCategory);
        $this->assertTrue($promo->categories->contains($firstNewCategory));
        $firstOldCategory = $oldCategories->first();
        $this->assertNotNull($firstOldCategory);
        $this->assertInstanceOf(Category::class, $firstOldCategory);
        $this->assertFalse($promo->categories->contains($firstOldCategory));
    }

    public function test_syncs_cities(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        /** @var Promo $promo */
        $promo = Promo::factory()->create(['user_id' => $user->id]);
        $oldCities = City::factory()->count(2)->create();
        $promo->cities()->attach($oldCities->pluck('id')->toArray());

        $newCities = City::factory()->count(3)->create();
        $categories = new Collection([Category::factory()->createOne()]);

        $dto = $this->createUpdateDto($promo, $user, $categories, $newCities);

        UpdatePromoAction::run($dto);

        $promo->refresh();
        $this->assertCount(3, $promo->cities);
        $firstNewCity = $newCities->first();
        $this->assertNotNull($firstNewCity);
        $this->assertInstanceOf(City::class, $firstNewCity);
        $this->assertTrue($promo->cities->contains($firstNewCity));
        $firstOldCity = $oldCities->first();
        $this->assertNotNull($firstOldCity);
        $this->assertInstanceOf(City::class, $firstOldCity);
        $this->assertFalse($promo->cities->contains($firstOldCity));
    }

    public function test_sets_draft_status_when_is_draft_is_true(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        /** @var Promo $promo */
        $promo = Promo::factory()->create([
            'user_id' => $user->id,
            'moderation_status' => PromoModerationStatus::PENDING,
            'started_at' => CarbonImmutable::now(),
        ]);
        $categories = new Collection([Category::factory()->createOne()]);
        $cities = new Collection([City::factory()->createOne()]);

        $dto = $this->createUpdateDto($promo, $user, $categories, $cities, [
            'isDraft' => true,
        ]);

        $result = UpdatePromoAction::run($dto);

        $this->assertEquals(PromoModerationStatus::DRAFT, $result->moderation_status);
        $this->assertNull($result->started_at);
    }

    public function test_changes_rejected_status_to_pending(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        /** @var Promo $promo */
        $promo = Promo::factory()->create([
            'user_id' => $user->id,
            'moderation_status' => PromoModerationStatus::REJECTED,
            'rejected_at' => CarbonImmutable::now(),
            'rejected_by' => 1,
            'rejection_reason' => 'Test rejection',
        ]);
        $categories = new Collection([Category::factory()->createOne()]);
        $cities = new Collection([City::factory()->createOne()]);

        $dto = $this->createUpdateDto($promo, $user, $categories, $cities, [
            'isDraft' => false,
        ]);

        $result = UpdatePromoAction::run($dto);

        $this->assertEquals(PromoModerationStatus::PENDING, $result->moderation_status);
        $this->assertNull($result->rejected_at);
        $this->assertNull($result->rejected_by);
        $this->assertNull($result->rejection_reason);
    }

    public function test_changes_draft_status_to_pending_when_not_draft(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        /** @var Promo $promo */
        $promo = Promo::factory()->create([
            'user_id' => $user->id,
            'moderation_status' => PromoModerationStatus::DRAFT,
        ]);
        $categories = new Collection([Category::factory()->createOne()]);
        $cities = new Collection([City::factory()->createOne()]);

        $dto = $this->createUpdateDto($promo, $user, $categories, $cities, [
            'isDraft' => false,
        ]);

        $result = UpdatePromoAction::run($dto);

        $this->assertEquals(PromoModerationStatus::PENDING, $result->moderation_status);
    }

    public function test_requires_id_in_dto(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $categories = new Collection([Category::factory()->createOne()]);
        $cities = new Collection([City::factory()->createOne()]);

        $dto = $this->createUpdateDto(null, $user, $categories, $cities, [
            'id' => null,
        ]);

        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage('Promo ID is required for update');

        UpdatePromoAction::run($dto);
    }

    public function test_preserves_existing_photo_when_no_new_photo_or_existing_photo(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        /** @var Promo $promo */
        $promo = Promo::factory()->create([
            'user_id' => $user->id,
            'img' => 'existing-photo.jpg',
        ]);
        $categories = new Collection([Category::factory()->createOne()]);
        $cities = new Collection([City::factory()->createOne()]);

        $dto = $this->createUpdateDto($promo, $user, $categories, $cities, [
            'photos' => null,
            'existingPhoto' => null,
        ]);

        $result = UpdatePromoAction::run($dto);

        $this->assertEquals('existing-photo.jpg', $result->img);
    }

    public function test_uses_existing_photo_when_provided(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        /** @var Promo $promo */
        $promo = Promo::factory()->create([
            'user_id' => $user->id,
            'img' => 'old-photo.jpg',
        ]);
        $categories = new Collection([Category::factory()->createOne()]);
        $cities = new Collection([City::factory()->createOne()]);

        $dto = $this->createUpdateDto($promo, $user, $categories, $cities, [
            'photos' => null,
            'existingPhoto' => 'new-existing-photo.jpg',
        ]);

        $result = UpdatePromoAction::run($dto);

        $this->assertEquals('new-existing-photo.jpg', $result->img);
    }

    /**
     * @param  Collection<int, Model>  $categories
     * @param  Collection<int, Model>  $cities
     * @param  array{title?: string, description?: string, conditions?: string|null, durationDays?: int, isDraft?: bool, id?: int|null, photos?: array<int, string>|null, existingPhoto?: string|null}  $override
     */
    private function createUpdateDto(?Promo $promo, User $user, Collection $categories, Collection $cities, array $override = []): CreatePromoData
    {
        return new CreatePromoData(
            id: $override['id'] ?? $promo?->id,
            userId: $user->id,
            title: $override['title'] ?? 'Test Promo',
            promoTypeId: 1,
            description: $override['description'] ?? 'Description',
            conditions: $override['conditions'] ?? null,
            durationDays: $override['durationDays'] ?? 7,
            categoryIds: $this->getCategoryIds($categories),
            cityIds: $this->getCityIds($cities),
            discount: null,
            cashback: null,
            minimumOrder: null,
            promoCode: null,
            freeDelivery: false,
            freeDeliveryFrom: null,
            showInBanner: false,
            useBonusBalance: false,
            youtubeUrl: null,
            socialLinks: null,
            schedule: null,
            addresses: null,
            photos: $override['photos'] ?? null,
            existingPhoto: $override['existingPhoto'] ?? null,
            isDraft: $override['isDraft'] ?? false,
        );
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
