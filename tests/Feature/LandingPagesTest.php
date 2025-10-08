<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Override;
use Tests\TestCase;

class LandingPagesTest extends TestCase
{
    use RefreshDatabase;

    #[Override]
    protected function setUp(): void
    {
        parent::setUp();

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

    public function test_business_landing_page_is_accessible(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_business_landing_page_has_required_props(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertInertia(
            fn ($page) => $page
                ->component('landing/BusinessLanding')
                ->has('slides')
                ->has('reviews')
                ->has('contact.email')
                ->has('contact.phone')
                ->has('meta')
        );
    }

    public function test_user_landing_page_is_accessible(): void
    {
        $response = $this->get('/user-landing');

        $response->assertStatus(200);
    }

    public function test_user_landing_page_renders_correct_component(): void
    {
        $response = $this->get('/user-landing');

        $response->assertStatus(200);
        $response->assertInertia(
            fn ($page) => $page
                ->component('landing/UserLanding')
        );
    }

    public function test_business_landing_has_correct_contact_data(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertInertia(
            fn ($page) => $page
                ->where('contact.phone', '+7 (927) 997-888-44')
                ->where('contact.email', 'admin@gm1lp.ru')
        );
    }
}
