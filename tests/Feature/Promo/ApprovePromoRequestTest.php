<?php

declare(strict_types=1);

namespace Tests\Feature\Promo;

use App\Http\Requests\Promo\ApprovePromoRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class ApprovePromoRequestTest extends TestCase
{
    use RefreshDatabase;

    public function test_validates_message_as_optional(): void
    {
        $validator = $this->makeValidator([]);

        $this->assertTrue($validator->passes());
    }

    public function test_validates_message_max_500_characters(): void
    {
        $validator = $this->makeValidator([
            'message' => str_repeat('a', 501),
        ]);

        $this->assertFalse($validator->passes());
        $this->assertArrayHasKey('message', $validator->errors()->toArray());

        $validator = $this->makeValidator([
            'message' => str_repeat('a', 500),
        ]);

        $this->assertTrue($validator->passes());
    }

    public function test_validates_message_as_string(): void
    {
        $validator = $this->makeValidator([
            'message' => 123,
        ]);

        $this->assertFalse($validator->passes());
        $this->assertArrayHasKey('message', $validator->errors()->toArray());

        $validator = $this->makeValidator([
            'message' => 'Test message',
        ]);

        $this->assertTrue($validator->passes());
    }

    public function test_authorizes_all_users(): void
    {
        $request = new ApprovePromoRequest();
        $this->assertTrue($request->authorize());
    }

    /**
     * @param  array<string, mixed>  $data
     */
    private function makeValidator(array $data): \Illuminate\Validation\Validator
    {
        $request = new ApprovePromoRequest();

        return Validator::make($data, $request->rules());
    }
}

