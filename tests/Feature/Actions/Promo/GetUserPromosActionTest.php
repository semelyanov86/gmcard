<?php

declare(strict_types=1);

namespace Tests\Feature\Actions\Promo;

use App\Actions\Promo\GetUserPromosAction;
use App\Data\PromoListItemData;
use App\Enums\Promo\PromoModerationStatus;
use App\Models\Promo;
use App\Models\User;
use Carbon\CarbonImmutable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetUserPromosActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_groups_promos_by_status(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        Promo::factory()->create([
            'user_id' => $user->id,
            'started_at' => now()->subDay(),
            'available_till' => now()->addDays(7),
            'moderation_status' => PromoModerationStatus::APPROVED,
        ]);

        Promo::factory()->create([
            'user_id' => $user->id,
            'started_at' => now()->subDays(10),
            'available_till' => now()->subDay(),
            'moderation_status' => PromoModerationStatus::APPROVED,
        ]);

        Promo::factory()->create([
            'user_id' => $user->id,
            'started_at' => null,
            'moderation_status' => PromoModerationStatus::DRAFT,
        ]);

        $moderationPromo = Promo::factory()->create([
            'user_id' => $user->id,
            'started_at' => null,
            'available_till' => now()->addDays(7),
            'moderation_status' => PromoModerationStatus::PENDING,
        ]);

        $result = GetUserPromosAction::run($user);

        $this->assertArrayHasKey('activePromos', $result);
        $this->assertArrayHasKey('completedPromos', $result);
        $this->assertArrayHasKey('draftPromos', $result);
        $this->assertArrayHasKey('moderationPromos', $result);

        $this->assertCount(1, $result['activePromos']);
        $this->assertCount(1, $result['completedPromos']);
        $this->assertCount(2, $result['draftPromos']);
        $this->assertContains($moderationPromo->id, array_column($result['moderationPromos'], 'id'));
    }

    public function test_returns_empty_arrays_when_no_promos(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        $result = GetUserPromosAction::run($user);

        $this->assertEmpty($result['activePromos']);
        $this->assertEmpty($result['completedPromos']);
        $this->assertEmpty($result['draftPromos']);
        $this->assertEmpty($result['moderationPromos']);
    }

    public function test_maps_to_promo_list_item_data(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        $promo = Promo::factory()->create([
            'user_id' => $user->id,
            'name' => 'Test Promo',
            'description' => 'Test description',
            'started_at' => now()->subDay(),
            'available_till' => now()->addDays(7),
            'moderation_status' => PromoModerationStatus::APPROVED,
        ]);

        $result = GetUserPromosAction::run($user);

        $this->assertCount(1, $result['activePromos']);
        $this->assertInstanceOf(PromoListItemData::class, $result['activePromos'][0]);
        $this->assertEquals($promo->id, $result['activePromos'][0]->id);
        $this->assertEquals('Test Promo', $result['activePromos'][0]->name);
        $this->assertEquals('Test description', $result['activePromos'][0]->description);
    }
}

