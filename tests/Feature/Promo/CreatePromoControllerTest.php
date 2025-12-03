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

class CreatePromoControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_redirected_from_index(): void
    {
        $response = $this->get(route('promos.create'));

        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_users_can_access_index(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['tariff_plan_id' => null]);

        $response = $this->actingAs($user)->get(route('promos.create'));

        $response->assertOk();
    }

    public function test_index_renders_correct_inertia_component(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['tariff_plan_id' => null]);

        $response = $this->actingAs($user)->get(route('promos.create'));

        $response->assertOk();
        $response->assertInertia(
            fn ($page) => $page->component('Promo/CreatePromo')
        );
    }

    public function test_index_has_required_props(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['tariff_plan_id' => null]);

        $response = $this->actingAs($user)->get(route('promos.create'));

        $response->assertOk();
        $response->assertInertia(
            fn ($page) => $page
                ->has('contact.email')
                ->has('contact.phone')
                ->has('categories')
                ->has('cities')
                ->has('promoTypes')
                ->has('discountFilters')
                ->has('defaultDescription')
                ->has('weekdays')
                ->has('socialNetworks')
                ->has('navbarMenu')
                ->has('sidebarMenu')
        );
    }

    public function test_index_loads_user_with_relations(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['tariff_plan_id' => null]);

        $response = $this->actingAs($user)->get(route('promos.create'));

        $response->assertOk();
        $response->assertInertia(
            fn ($page) => $page->has('user')
        );
    }

    public function test_guests_cannot_store_promo(): void
    {
        $categories = new Collection([Category::factory()->createOne()]);
        $cities = new Collection([City::factory()->createOne()]);

        $response = $this->post(route('promos.store'), $this->getValidData($categories, $cities));

        $response->assertRedirect(route('login'));
    }

    public function test_store_creates_promo_successfully(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['tariff_plan_id' => null]);
        $categories = Category::factory()->count(2)->create();
        $cities = City::factory()->count(2)->create();
        $data = $this->getValidData($categories, $cities);

        $response = $this->actingAs($user)->post(route('promos.store'), $data);

        $response->assertRedirect(route('promos.create'));
        $response->assertSessionHas('success', 'Акция успешно создана и отправлена на модерацию');

        $promo = Promo::where('user_id', $user->id)
            ->where('name', 'Test Promo')
            ->first();

        $this->assertNotNull($promo);
        $this->assertDatabaseHas('promos', [
            'id' => $promo->id,
            'user_id' => $user->id,
            'name' => 'Test Promo',
            'description' => 'Test description',
            'extra_conditions' => 'Test conditions',
        ]);

        $promo->load(['categories', 'cities']);
        $this->assertCount(2, $promo->categories);
        $this->assertCount(2, $promo->cities);
        $firstCategory = $categories->first();
        $this->assertNotNull($firstCategory);
        $this->assertInstanceOf(Category::class, $firstCategory);
        $this->assertTrue($promo->categories->contains($firstCategory));
        $firstCity = $cities->first();
        $this->assertNotNull($firstCity);
        $this->assertInstanceOf(City::class, $firstCity);
        $this->assertTrue($promo->cities->contains($firstCity));
    }

    public function test_store_creates_draft_promo_with_draft_message(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['tariff_plan_id' => null]);
        $categories = new Collection([Category::factory()->createOne()]);
        $cities = new Collection([City::factory()->createOne()]);
        $data = $this->getValidData($categories, $cities);
        $data['is_draft'] = true;

        $response = $this->actingAs($user)->post(route('promos.store'), $data);

        $response->assertRedirect(route('promos.create'));
        $response->assertSessionHas('success', 'Акция сохранена как черновик');
    }

    public function test_store_validates_request_data(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['tariff_plan_id' => null]);

        $response = $this->actingAs($user)->post(route('promos.store'), []);

        $response->assertSessionHasErrors(['promo_type_id', 'title', 'description', 'duration_days', 'category_ids', 'city_ids']);
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
            'agree_to_terms' => true,
        ];
    }
}
