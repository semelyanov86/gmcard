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
use App\ValueObjects\MoneyValueObject;
use Carbon\CarbonImmutable;
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
        $promo = Promo::factory()->create([
            'user_id' => $user->id,
            'started_at' => $startedAt,
            'available_till' => $startedAt->addDays(5),
        ]);
        $categories = Category::factory()->count(1)->create();
        $cities = City::factory()->count(1)->create();

        $dto = $this->createUpdateDto($promo, $user, $categories, $cities, [
            'durationDays' => 10,
        ]);

        $result = UpdatePromoAction::run($dto);

        $expectedAvailableTill = $startedAt->addDays(10);
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
        $promo = Promo::factory()->create([
            'user_id' => $user->id,
            'started_at' => null,
        ]);
        $categories = Category::factory()->count(1)->create();
        $cities = City::factory()->count(1)->create();

        $before = CarbonImmutable::now();

        $dto = $this->createUpdateDto($promo, $user, $categories, $cities);

        $result = UpdatePromoAction::run($dto);

        $after = CarbonImmutable::now();
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
        $promo = Promo::factory()->create(['user_id' => $user->id]);
        $oldCategories = Category::factory()->count(2)->create();
        $promo->categories()->attach($oldCategories->pluck('id')->toArray());

        $newCategories = Category::factory()->count(3)->create();
        $cities = City::factory()->count(1)->create();

        $dto = $this->createUpdateDto($promo, $user, $newCategories, $cities);

        UpdatePromoAction::run($dto);

        $promo->refresh();
        $this->assertCount(3, $promo->categories);
        $this->assertTrue($promo->categories->contains($newCategories->first()));
        $this->assertFalse($promo->categories->contains($oldCategories->first()));
    }

    public function test_syncs_cities(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $promo = Promo::factory()->create(['user_id' => $user->id]);
        $oldCities = City::factory()->count(2)->create();
        $promo->cities()->attach($oldCities->pluck('id')->toArray());

        $newCities = City::factory()->count(3)->create();
        $categories = Category::factory()->count(1)->create();

        $dto = $this->createUpdateDto($promo, $user, $categories, $newCities);

        UpdatePromoAction::run($dto);

        $promo->refresh();
        $this->assertCount(3, $promo->cities);
        $this->assertTrue($promo->cities->contains($newCities->first()));
        $this->assertFalse($promo->cities->contains($oldCities->first()));
    }

    public function test_sets_draft_status_when_is_draft_is_true(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $promo = Promo::factory()->create([
            'user_id' => $user->id,
            'moderation_status' => PromoModerationStatus::PENDING,
            'started_at' => CarbonImmutable::now(),
        ]);
        $categories = Category::factory()->count(1)->create();
        $cities = City::factory()->count(1)->create();

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
        $promo = Promo::factory()->create([
            'user_id' => $user->id,
            'moderation_status' => PromoModerationStatus::REJECTED,
            'rejected_at' => CarbonImmutable::now(),
            'rejected_by' => 1,
            'rejection_reason' => 'Test rejection',
        ]);
        $categories = Category::factory()->count(1)->create();
        $cities = City::factory()->count(1)->create();

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
        $promo = Promo::factory()->create([
            'user_id' => $user->id,
            'moderation_status' => PromoModerationStatus::DRAFT,
        ]);
        $categories = Category::factory()->count(1)->create();
        $cities = City::factory()->count(1)->create();

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
        $categories = Category::factory()->count(1)->create();
        $cities = City::factory()->count(1)->create();

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
        $promo = Promo::factory()->create([
            'user_id' => $user->id,
            'img' => 'existing-photo.jpg',
        ]);
        $categories = Category::factory()->count(1)->create();
        $cities = City::factory()->count(1)->create();

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
        $promo = Promo::factory()->create([
            'user_id' => $user->id,
            'img' => 'old-photo.jpg',
        ]);
        $categories = Category::factory()->count(1)->create();
        $cities = City::factory()->count(1)->create();

        $dto = $this->createUpdateDto($promo, $user, $categories, $cities, [
            'photos' => null,
            'existingPhoto' => 'new-existing-photo.jpg',
        ]);

        $result = UpdatePromoAction::run($dto);

        $this->assertEquals('new-existing-photo.jpg', $result->img);
    }

    /**
     * @param  Promo|null  $promo
     * @param  User  $user
     * @param  \Illuminate\Database\Eloquent\Collection<int, Category>  $categories
     * @param  \Illuminate\Database\Eloquent\Collection<int, City>  $cities
     * @param  array<string, mixed>  $override
     * @return CreatePromoData
     */
    private function createUpdateDto($promo, User $user, $categories, $cities, array $override = []): CreatePromoData
    {
        $data = array_merge([
            'id' => $promo?->id,
            'userId' => $user->id,
            'title' => 'Test Promo',
            'promoTypeId' => 1,
            'description' => 'Description',
            'conditions' => null,
            'durationDays' => 7,
            'categoryIds' => $categories->pluck('id')->map(fn ($id) => (string) $id)->toArray(),
            'cityIds' => $cities->pluck('id')->toArray(),
            'isDraft' => false,
        ], $override);

        return new CreatePromoData(
            id: $data['id'] ?? null,
            userId: $data['userId'],
            title: $data['title'],
            promoTypeId: $data['promoTypeId'],
            description: $data['description'],
            conditions: $data['conditions'] ?? null,
            durationDays: $data['durationDays'],
            categoryIds: $data['categoryIds'],
            cityIds: $data['cityIds'],
            discount: $data['discount'] ?? null,
            cashback: $data['cashback'] ?? null,
            minimumOrder: $data['minimumOrder'] ?? null,
            promoCode: $data['promoCode'] ?? null,
            freeDelivery: $data['freeDelivery'] ?? false,
            freeDeliveryFrom: $data['freeDeliveryFrom'] ?? null,
            showInBanner: $data['showInBanner'] ?? false,
            useBonusBalance: $data['useBonusBalance'] ?? false,
            youtubeUrl: $data['youtubeUrl'] ?? null,
            socialLinks: $data['socialLinks'] ?? null,
            schedule: $data['schedule'] ?? null,
            addresses: $data['addresses'] ?? null,
            photos: $data['photos'] ?? null,
            existingPhoto: $data['existingPhoto'] ?? null,
            isDraft: $data['isDraft'] ?? false,
        );
    }
}

