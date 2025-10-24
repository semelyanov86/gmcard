<?php

declare(strict_types=1);

namespace Tests\Feature\Promo;

use App\Http\Requests\Promo\CreatePromoRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class CreatePromoRequestTest extends TestCase
{
    use RefreshDatabase;

    public function test_requires_promo_type_id(): void
    {
        $validator = $this->makeValidator([]);

        $this->assertFalse($validator->passes());
        $this->assertArrayHasKey('promo_type_id', $validator->errors()->toArray());
    }

    public function test_promo_type_id_must_be_between_1_and_7(): void
    {
        $validator = $this->makeValidator(['promo_type_id' => 0]);
        $this->assertFalse($validator->passes());

        $validator = $this->makeValidator(['promo_type_id' => 8]);
        $this->assertFalse($validator->passes());

        $validator = $this->makeValidator(['promo_type_id' => 5]);
        $this->assertTrue($validator->passes() || $validator->errors()->missing('promo_type_id'));
    }

    public function test_discount_amount_is_integer(): void
    {
        $validator = $this->makeValidator([
            'discount_amount' => 'not-numeric',
        ]);

        $this->assertFalse($validator->passes());
        $this->assertArrayHasKey('discount_amount', $validator->errors()->toArray());

        $validator = $this->makeValidator([
            'discount_amount' => '50.5',
        ]);

        $this->assertFalse($validator->passes());
        $this->assertArrayHasKey('discount_amount', $validator->errors()->toArray());
    }

    public function test_cashback_amount_is_integer(): void
    {
        $validator = $this->makeValidator([
            'cashback_amount' => 'not-numeric',
        ]);

        $this->assertFalse($validator->passes());
        $this->assertArrayHasKey('cashback_amount', $validator->errors()->toArray());

        $validator = $this->makeValidator([
            'cashback_amount' => '10.25',
        ]);

        $this->assertFalse($validator->passes());
        $this->assertArrayHasKey('cashback_amount', $validator->errors()->toArray());
    }

    public function test_requires_category_ids(): void
    {
        $validator = $this->makeValidator([
            'promo_type_id' => 1,
            'title' => 'Test',
        ]);

        $this->assertFalse($validator->passes());
        $this->assertArrayHasKey('category_ids', $validator->errors()->toArray());
    }

    public function test_category_ids_must_exist(): void
    {
        $validator = $this->makeValidator([
            'category_ids' => [99999],
        ]);

        $this->assertFalse($validator->passes());
    }

    public function test_requires_title(): void
    {
        $validator = $this->makeValidator(['promo_type_id' => 1]);

        $this->assertFalse($validator->passes());
        $this->assertArrayHasKey('title', $validator->errors()->toArray());
    }

    public function test_title_max_64_characters(): void
    {
        $validator = $this->makeValidator([
            'title' => str_repeat('a', 65),
        ]);

        $this->assertFalse($validator->passes());
        $this->assertArrayHasKey('title', $validator->errors()->toArray());

        $validator = $this->makeValidator([
            'title' => str_repeat('a', 64),
        ]);

        $this->assertTrue($validator->passes() || $validator->errors()->missing('title'));
    }

    public function test_requires_description(): void
    {
        $validator = $this->makeValidator([
            'promo_type_id' => 1,
            'title' => 'Test',
        ]);

        $this->assertFalse($validator->passes());
        $this->assertArrayHasKey('description', $validator->errors()->toArray());
    }

    public function test_requires_duration_days(): void
    {
        $validator = $this->makeValidator([
            'promo_type_id' => 1,
            'title' => 'Test',
        ]);

        $this->assertFalse($validator->passes());
        $this->assertArrayHasKey('duration_days', $validator->errors()->toArray());
    }

    public function test_duration_days_must_be_between_1_and_30(): void
    {
        $validator = $this->makeValidator([
            'duration_days' => 0,
        ]);
        $this->assertFalse($validator->passes());

        $validator = $this->makeValidator([
            'duration_days' => 31,
        ]);
        $this->assertFalse($validator->passes());

        $validator = $this->makeValidator([
            'duration_days' => 15,
        ]);
        $this->assertTrue($validator->passes() || $validator->errors()->missing('duration_days'));
    }

    public function test_requires_city_ids(): void
    {
        $validator = $this->makeValidator([
            'promo_type_id' => 1,
            'title' => 'Test',
        ]);

        $this->assertFalse($validator->passes());
        $this->assertArrayHasKey('city_ids', $validator->errors()->toArray());
    }

    public function test_city_ids_must_exist(): void
    {
        $validator = $this->makeValidator([
            'city_ids' => [99999],
        ]);

        $this->assertFalse($validator->passes());
    }

    public function test_youtube_url_must_be_valid_url(): void
    {
        $validator = $this->makeValidator([
            'youtube_url' => 'not-a-url',
        ]);

        $this->assertFalse($validator->passes());
        $this->assertArrayHasKey('youtube_url', $validator->errors()->toArray());

        $validator = $this->makeValidator([
            'youtube_url' => 'https://youtube.com/watch?v=test',
        ]);

        $this->assertTrue($validator->passes() || $validator->errors()->missing('youtube_url'));
    }

    public function test_requires_agree_to_terms(): void
    {
        $categories = Category::factory()->count(1)->create();
        $cities = City::factory()->count(1)->create();

        $data = [
            'promo_type_id' => 4,
            'title' => 'Test',
            'description' => 'Test',
            'conditions' => 'Test',
            'duration_days' => 7,
            'category_ids' => $categories->pluck('id')->toArray(),
            'city_ids' => $cities->pluck('id')->toArray(),
        ];

        $validator = $this->makeValidator($data);
        $this->assertFalse($validator->passes());
        $this->assertArrayHasKey('agree_to_terms', $validator->errors()->toArray());
    }

    public function test_validates_complete_promo_data(): void
    {
        $categories = Category::factory()->count(2)->create();
        $cities = City::factory()->count(2)->create();

        $categoryIds = [];
        foreach ($categories as $category) {
            /** @var Category $category */
            $categoryIds[] = (string) $category->id;
        }

        $data = [
            'promo_type_id' => 4,
            'category_ids' => $categoryIds,
            'title' => 'Test Promo',
            'description' => 'Test description',
            'conditions' => 'Test conditions',
            'minimum_order_amount' => 100,
            'promo_code' => 'TEST123',
            'free_delivery' => true,
            'duration_days' => 7,
            'show_in_banner' => false,
            'city_ids' => $cities->pluck('id')->toArray(),
            'youtube_url' => 'https://youtube.com/watch?v=test',
            'agree_to_terms' => true,
        ];

        $validator = $this->makeValidator($data);
        $this->assertTrue($validator->passes());
    }

    public function test_validates_minimum_order_amount_must_be_integer(): void
    {
        $validator = $this->makeValidator([
            'minimum_order_amount' => 'not-a-number',
        ]);

        $this->assertFalse($validator->passes());
        $this->assertArrayHasKey('minimum_order_amount', $validator->errors()->toArray());

        $validator = $this->makeValidator([
            'minimum_order_amount' => '100.50',
        ]);

        $this->assertFalse($validator->passes());
        $this->assertArrayHasKey('minimum_order_amount', $validator->errors()->toArray());
    }

    public function test_validates_photos_max_10(): void
    {
        $validator = $this->makeValidator([
            'photos' => array_fill(0, 11, 'photo.jpg'),
        ]);

        $this->assertFalse($validator->passes());
        $this->assertArrayHasKey('photos', $validator->errors()->toArray());
    }

    public function test_authorizes_authenticated_users(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $this->actingAs($user);

        $request = new CreatePromoRequest();
        $this->assertTrue($request->authorize());
    }

    public function test_does_not_authorize_guests(): void
    {
        $request = new CreatePromoRequest();
        $this->assertFalse($request->authorize());
    }

    /**
     * @param  array<string, mixed>  $data
     */
    private function makeValidator(array $data): \Illuminate\Validation\Validator
    {
        $request = new CreatePromoRequest();

        return Validator::make($data, $request->rules());
    }
}
