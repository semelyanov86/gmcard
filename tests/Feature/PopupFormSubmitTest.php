<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;
use App\Contracts\VtigerCrmInterface;
use Tests\Mocks\MockVtigerAdapter;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class PopupFormSubmitTest extends TestCase
{
    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutMiddleware();
        $this->app->bind(VtigerCrmInterface::class, MockVtigerAdapter::class);

        if (! Schema::hasTable('settings')) {
            Schema::create('settings', function ($table): void {
                $table->id();
                $table->string('group');
                $table->string('name');
                $table->boolean('locked')->default(false);
                $table->json('payload');
                $table->timestamps();
                $table->unique(['group', 'name']);
            });
        }

        DB::table('settings')->insertOrIgnore([
            [
                'group' => 'general',
                'name' => 'phone',
                'payload' => json_encode('+7 (927) 997-888-44'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'group' => 'general',
                'name' => 'email',
                'payload' => json_encode('admin@gm1lp.ru'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public function test_example(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_form_submit_successfully_creates_lead(): void
    {
        $response = $this->post('/submit-form', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '1234567890',
            'city' => 'TestCity',
            'agree' => true,
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Заявка отправлена!');
    }
}
