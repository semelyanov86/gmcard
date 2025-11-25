<?php

declare(strict_types=1);

namespace Tests\Feature\Promo;

use App\Http\Requests\Promo\UpdatePromoRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class UpdatePromoRequestTest extends TestCase
{
    use RefreshDatabase;

    public function test_does_not_require_agree_to_terms(): void
    {
        $data = $this->getValidData();

        $validator = $this->makeValidator($data);

        $this->assertTrue($validator->passes());
        $this->assertArrayNotHasKey('agree_to_terms', $validator->errors()->toArray());
    }

    public function test_validates_existing_photo(): void
    {
        $validator = $this->makeValidator([
            'existing_photo' => str_repeat('a', 256),
        ]);

        $this->assertFalse($validator->passes());
        $this->assertArrayHasKey('existing_photo', $validator->errors()->toArray());

        $validator = $this->makeValidator([
            'existing_photo' => 'photo.jpg',
        ]);

        $this->assertTrue($validator->passes() || $validator->errors()->missing('existing_photo'));
    }

    public function test_inherits_parent_validation_rules(): void
    {
        $data = $this->getValidData([
            'title' => 'Test Promo',
            'description' => 'Test description',
            'existing_photo' => 'existing-photo.jpg',
        ]);

        $validator = $this->makeValidator($data);

        $this->assertTrue($validator->passes());
    }

    public function test_authorizes_authenticated_users(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $this->actingAs($user);

        $request = new UpdatePromoRequest();
        $this->assertTrue($request->authorize());
    }

    /**
     * @param  array<string, mixed>  $data
     */
    private function makeValidator(array $data): \Illuminate\Validation\Validator
    {
        $request = new UpdatePromoRequest();

        return Validator::make($data, $request->rules());
    }

    /**
     * @param  array<string, mixed>  $override
     * @return array<string, mixed>
     */
    private function getValidData(array $override = []): array
    {
        /** @var \Illuminate\Database\Eloquent\Collection<int, Category> $categories */
        $categories = new Collection([Category::factory()->createOne()]);
        /** @var \Illuminate\Database\Eloquent\Collection<int, City> $cities */
        $cities = new Collection([City::factory()->createOne()]);

        return array_merge([
            'promo_type_id' => 1,
            'title' => 'Test',
            'description' => 'Test',
            'duration_days' => 7,
            'category_ids' => $this->getCategoryIds($categories),
            'city_ids' => $cities->pluck('id')->toArray(),
        ], $override);
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Collection<int, Category>  $categories
     * @return array<int, string>
     */
    private function getCategoryIds($categories): array
    {
        $ids = [];
        foreach ($categories as $category) {
            /** @var Category $category */
            $ids[] = (string) $category->id;
        }

        return $ids;
    }
}
