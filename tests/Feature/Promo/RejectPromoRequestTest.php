<?php

declare(strict_types=1);

namespace Tests\Feature\Promo;

use App\Http\Requests\Promo\RejectPromoRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class RejectPromoRequestTest extends TestCase
{
    use RefreshDatabase;

    public function test_requires_rejection_reason(): void
    {
        $validator = $this->makeValidator([]);

        $this->assertFalse($validator->passes());
        $this->assertArrayHasKey('rejection_reason', $validator->errors()->toArray());
    }

    public function test_validates_rejection_reason_min_10_characters(): void
    {
        $validator = $this->makeValidator([
            'rejection_reason' => str_repeat('a', 9),
        ]);

        $this->assertFalse($validator->passes());
        $this->assertArrayHasKey('rejection_reason', $validator->errors()->toArray());

        $validator = $this->makeValidator([
            'rejection_reason' => str_repeat('a', 10),
        ]);

        $this->assertTrue($validator->passes());
    }

    public function test_validates_rejection_reason_max_1000_characters(): void
    {
        $validator = $this->makeValidator([
            'rejection_reason' => str_repeat('a', 1001),
        ]);

        $this->assertFalse($validator->passes());
        $this->assertArrayHasKey('rejection_reason', $validator->errors()->toArray());

        $validator = $this->makeValidator([
            'rejection_reason' => str_repeat('a', 1000),
        ]);

        $this->assertTrue($validator->passes());
    }

    public function test_validates_rejection_reason_as_string(): void
    {
        $validator = $this->makeValidator([
            'rejection_reason' => 123,
        ]);

        $this->assertFalse($validator->passes());
        $this->assertArrayHasKey('rejection_reason', $validator->errors()->toArray());

        $validator = $this->makeValidator([
            'rejection_reason' => 'This is a rejection reason',
        ]);

        $this->assertTrue($validator->passes());
    }

    public function test_validates_message_as_optional(): void
    {
        $validator = $this->makeValidator([
            'rejection_reason' => 'Valid rejection reason with more than 10 characters',
        ]);

        $this->assertTrue($validator->passes());
    }

    public function test_validates_message_max_500_characters(): void
    {
        $validator = $this->makeValidator([
            'rejection_reason' => 'Valid rejection reason with more than 10 characters',
            'message' => str_repeat('a', 501),
        ]);

        $this->assertFalse($validator->passes());
        $this->assertArrayHasKey('message', $validator->errors()->toArray());

        $validator = $this->makeValidator([
            'rejection_reason' => 'Valid rejection reason with more than 10 characters',
            'message' => str_repeat('a', 500),
        ]);

        $this->assertTrue($validator->passes());
    }

    public function test_authorizes_all_users(): void
    {
        $request = new RejectPromoRequest();
        $this->assertTrue($request->authorize());
    }

    /**
     * @param  array<string, mixed>  $data
     */
    private function makeValidator(array $data): \Illuminate\Validation\Validator
    {
        $request = new RejectPromoRequest();

        return Validator::make($data, $request->rules());
    }
}
