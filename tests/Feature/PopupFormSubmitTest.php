<?php

namespace Tests\Feature;

use App\Contracts\VtigerCrmInterface;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Tests\TestCase;

class PopupFormSubmitTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function test_example(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_form_submit_successfully_creates_lead()
    {
        $this->withoutMiddleware();

        $mockCrm = Mockery::mock(VtigerCrmInterface::class);

        $mockCrm->shouldReceive('createLead')
            ->once()
            ->andReturn([
                'id' => '10x123',
                'lastname' => 'Test',
                'email' => 'test@example.com',
            ]);

        $this->app->instance(VtigerCrmInterface::class, $mockCrm);

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
