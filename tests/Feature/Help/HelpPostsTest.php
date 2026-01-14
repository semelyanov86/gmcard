<?php

declare(strict_types=1);

namespace Tests\Feature\Help;

use App\Models\HelpPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HelpPostsTest extends TestCase
{
    use RefreshDatabase;

    public function test_help_index_page_renders_posts_list(): void
    {
        HelpPost::factory()->create([
            'title' => 'Тестовый пост',
            'slug' => 'test-post',
        ]);

        $response = $this->get('/help');

        $response->assertOk();

        $response->assertInertia(
            fn ($page) => $page
                ->component('help/Help')
                ->has('posts')
                ->has('contact.email')
                ->has('contact.phone')
        );
    }

    public function test_help_post_page_renders_single_post_and_sidebar(): void
    {
        $post = HelpPost::factory()->create([
            'title' => 'Тестовый пост',
            'slug' => 'test-post',
        ]);

        $response = $this->get('/help/' . $post->slug);

        $response->assertOk();

        $response->assertInertia(
            fn ($page) => $page
                ->component('help/Post')
                ->has('post')
                ->has('posts')
                ->has('contact.email')
                ->has('contact.phone')
        );
    }
}


