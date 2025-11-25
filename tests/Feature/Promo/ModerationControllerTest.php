<?php

declare(strict_types=1);

namespace Tests\Feature\Promo;

use App\Enums\Promo\PromoModerationStatus;
use App\Models\Promo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;
use Override;

class ModerationControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Override]
    protected function setUp(): void
    {
        parent::setUp();

        if (! Permission::query()->where('name', 'moderate promos')->exists()) {
            Permission::create(['name' => 'moderate promos', 'guard_name' => 'web']);
        }

        if (! Role::query()->where('name', 'moderator')->exists()) {
            Role::create(['name' => 'moderator', 'guard_name' => 'web']);
        }

        $moderatorRole = Role::findByName('moderator', 'web');
        $moderatorRole->givePermissionTo('moderate promos');
    }

    public function test_approve_requires_authentication(): void
    {
        /** @var Promo $promo */
        $promo = Promo::factory()->create([
            'moderation_status' => PromoModerationStatus::PENDING,
        ]);

        $response = $this->post(route('moderation.promos.approve', $promo));

        $response->assertRedirect('/login');
    }

    public function test_approve_requires_moderation_permission(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        /** @var Promo $promo */
        $promo = Promo::factory()->create([
            'moderation_status' => PromoModerationStatus::PENDING,
        ]);

        $response = $this->actingAs($user)->post(route('moderation.promos.approve', $promo));

        $response->assertStatus(403);
    }

    public function test_approve_approves_promo(): void
    {
        /** @var User $moderator */
        $moderator = User::factory()->create();
        $moderator->assignRole('moderator');
        /** @var Promo $promo */
        $promo = Promo::factory()->create([
            'moderation_status' => PromoModerationStatus::PENDING,
        ]);

        $response = $this->actingAs($moderator)->post(route('moderation.promos.approve', $promo), [
            'message' => 'Looks good!',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Акция одобрена');

        $promo->refresh();
        $this->assertEquals(PromoModerationStatus::APPROVED, $promo->moderation_status);
        $this->assertEquals($moderator->id, $promo->approved_by);
        $this->assertEquals('Looks good!', $promo->approving_notes);
    }

    public function test_reject_requires_authentication(): void
    {
        /** @var Promo $promo */
        $promo = Promo::factory()->create([
            'moderation_status' => PromoModerationStatus::PENDING,
        ]);

        $response = $this->post(route('moderation.promos.reject', $promo), [
            'rejection_reason' => 'Test rejection reason',
        ]);

        $response->assertRedirect('/login');
    }

    public function test_reject_requires_moderation_permission(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        /** @var Promo $promo */
        $promo = Promo::factory()->create([
            'moderation_status' => PromoModerationStatus::PENDING,
        ]);

        $response = $this->actingAs($user)->post(route('moderation.promos.reject', $promo), [
            'rejection_reason' => 'Test rejection reason',
        ]);

        $response->assertStatus(403);
    }

    public function test_reject_rejects_promo(): void
    {
        /** @var User $moderator */
        $moderator = User::factory()->create();
        $moderator->assignRole('moderator');
        /** @var Promo $promo */
        $promo = Promo::factory()->create([
            'moderation_status' => PromoModerationStatus::PENDING,
        ]);

        $response = $this->actingAs($moderator)->post(route('moderation.promos.reject', $promo), [
            'rejection_reason' => 'Inappropriate content',
            'message' => 'Please review guidelines',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Акция отклонена');

        $promo->refresh();
        $this->assertEquals(PromoModerationStatus::REJECTED, $promo->moderation_status);
        $this->assertEquals($moderator->id, $promo->rejected_by);
        $this->assertEquals('Inappropriate content', $promo->rejection_reason);
    }
}
