<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Actions\CategoryPathAction;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryPathActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_creates_hierarchy_and_links_parents(): void
    {
        $path = ['Root', 'Child', 'Leaf'];

        CategoryPathAction::run($path);

        $root = Category::query()->where('name', 'Root')->first();
        $this->assertNotNull($root);
        $this->assertNull($root->parent_id);

        $child = Category::query()->where('name', 'Child')->first();
        $this->assertNotNull($child);
        $this->assertSame($root->id, $child->parent_id);

        $leaf = Category::query()->where('name', 'Leaf')->first();
        $this->assertNotNull($leaf);
        $this->assertSame($child->id, $leaf->parent_id);
    }

    public function test_is_idempotent_for_same_path(): void
    {
        $path = ['Root', 'Child', 'Leaf'];

        CategoryPathAction::run($path);
        CategoryPathAction::run($path);

        $this->assertSame(3, Category::query()->count());

        $root = Category::query()->where('name', 'Root')->firstOrFail();
        $child = Category::query()->where('name', 'Child')->firstOrFail();
        $leaf = Category::query()->where('name', 'Leaf')->firstOrFail();

        $this->assertNull($root->parent_id);
        $this->assertSame($root->id, $child->parent_id);
        $this->assertSame($child->id, $leaf->parent_id);
    }
} 