<?php

declare(strict_types=1);

namespace Tests\Feature\Promo;

use App\Models\Category;
use App\Models\City;
use App\Models\Promo;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PromoControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_edit_requires_authentication(): void
    {
        /** @var Promo $promo */
        $promo = Promo::factory()->create();

        $response = $this->get(route('promos.edit', $promo));

        $response->assertRedirect('/login');
    }

    public function test_edit_authorizes_only_owner(): void
    {
        /** @var User $owner */
        $owner = User::factory()->create(['tariff_plan_id' => null]);
        /** @var User $otherUser */
        $otherUser = User::factory()->create(['tariff_plan_id' => null]);
        /** @var Promo $promo */
        $promo = Promo::factory()->create(['user_id' => $owner->id]);

        $response = $this->actingAs($otherUser)->get(route('promos.edit', $promo));

        $response->assertStatus(403);
    }

    public function test_edit_renders_promo_edit_page(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['tariff_plan_id' => null]);
        /** @var Promo $promo */
        $promo = Promo::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->get(route('promos.edit', $promo));

        $response->assertStatus(200);
        $response->assertInertia(
            fn ($page) => $page
                ->component('Promo/EditPromo')
                ->has('promo')
                ->has('categories')
                ->has('cities')
                ->has('promoTypes')
        );
    }

    public function test_update_requires_authentication(): void
    {
        /** @var Promo $promo */
        $promo = Promo::factory()->create();
        $categories = new Collection([Category::factory()->createOne()]);
        $cities = new Collection([City::factory()->createOne()]);

        $response = $this->put(route('promos.update', $promo), $this->getValidData($categories, $cities));

        $response->assertRedirect('/login');
    }

    public function test_update_authorizes_only_owner(): void
    {
        /** @var User $owner */
        $owner = User::factory()->create(['tariff_plan_id' => null]);
        /** @var User $otherUser */
        $otherUser = User::factory()->create(['tariff_plan_id' => null]);
        /** @var Promo $promo */
        $promo = Promo::factory()->create(['user_id' => $owner->id]);
        $categories = new Collection([Category::factory()->createOne()]);
        $cities = new Collection([City::factory()->createOne()]);

        $response = $this->actingAs($otherUser)->put(route('promos.update', $promo), $this->getValidData($categories, $cities));

        $response->assertStatus(403);
    }

    public function test_update_updates_promo_successfully(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['tariff_plan_id' => null]);
        /** @var Promo $promo */
        $promo = Promo::factory()->create([
            'user_id' => $user->id,
            'name' => 'Old Title',
            'description' => 'Old description',
        ]);
        $categories = Category::factory()->count(2)->create();
        $cities = City::factory()->count(2)->create();
        $data = $this->getValidData($categories, $cities);
        $data['title'] = 'New Title';
        $data['description'] = 'New description';

        $response = $this->actingAs($user)->put(route('promos.update', $promo), $data);

        $response->assertRedirect(route('profile'));
        $response->assertSessionHas('success', 'Акция обновлена');

        $promo->refresh();
        $this->assertEquals('New Title', $promo->name);
        $this->assertEquals('New description', $promo->description);
    }

    public function test_destroy_requires_authentication(): void
    {
        /** @var Promo $promo */
        $promo = Promo::factory()->create();

        $response = $this->delete(route('promos.destroy', $promo));

        $response->assertRedirect('/login');
    }

    public function test_destroy_authorizes_only_owner(): void
    {
        /** @var User $owner */
        $owner = User::factory()->create(['tariff_plan_id' => null]);
        /** @var User $otherUser */
        $otherUser = User::factory()->create(['tariff_plan_id' => null]);
        /** @var Promo $promo */
        $promo = Promo::factory()->create(['user_id' => $owner->id]);

        $response = $this->actingAs($otherUser)->delete(route('promos.destroy', $promo));

        $response->assertStatus(403);
    }

    public function test_destroy_deletes_promo(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['tariff_plan_id' => null]);
        /** @var Promo $promo */
        $promo = Promo::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->delete(route('promos.destroy', $promo));

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Акция удалена');
        $this->assertDatabaseMissing('promos', ['id' => $promo->id]);
    }

    public function test_complete_requires_authentication(): void
    {
        /** @var Promo $promo */
        $promo = Promo::factory()->create();

        $response = $this->post(route('promos.complete', $promo));

        $response->assertRedirect('/login');
    }

    public function test_complete_authorizes_only_owner(): void
    {
        /** @var User $owner */
        $owner = User::factory()->create(['tariff_plan_id' => null]);
        /** @var User $otherUser */
        $otherUser = User::factory()->create(['tariff_plan_id' => null]);
        /** @var Promo $promo */
        $promo = Promo::factory()->create(['user_id' => $owner->id]);

        $response = $this->actingAs($otherUser)->post(route('promos.complete', $promo));

        $response->assertStatus(403);
    }

    public function test_complete_completes_promo(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['tariff_plan_id' => null]);
        /** @var Promo $promo */
        $promo = Promo::factory()->create([
            'user_id' => $user->id,
            'available_till' => now()->addDays(7),
        ]);

        $response = $this->actingAs($user)->post(route('promos.complete', $promo));

        $response->assertRedirect(route('profile'));
        $response->assertSessionHas('success', 'Акция завершена');

        $promo->refresh();
        $this->assertNotNull($promo->available_till);
        $this->assertLessThanOrEqual(now()->timestamp, $promo->available_till->timestamp);
    }

    /**
     * @param  Collection<int, Model>  $categories
     * @param  Collection<int, Model>  $cities
     * @return array<string, mixed>
     */
    private function getValidData(Collection $categories, Collection $cities): array
    {
        $categoryIds = [];
        foreach ($categories as $category) {
            /** @var Category $category */
            $categoryIds[] = (string) $category->id;
        }

        return [
            'promo_type_id' => 1,
            'title' => 'Test Promo',
            'description' => 'Test description',
            'conditions' => 'Test conditions',
            'duration_days' => 7,
            'category_ids' => $categoryIds,
            'city_ids' => $cities->pluck('id')->toArray(),
            'discount' => ['amount' => 10, 'currency' => '%'],
        ];
    }
}
