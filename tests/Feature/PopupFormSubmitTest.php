<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;
use App\Contracts\VtigerCrmInterface;
use Tests\Mocks\MockVtigerAdapter;

class PopupFormSubmitTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        
        $this->withoutMiddleware();
        $this->app->bind(VtigerCrmInterface::class, MockVtigerAdapter::class);
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
