<?php

declare(strict_types=1);

namespace Tests\Feature\Actions\Promo;

use App\Actions\Promo\ApprovePromoAction;
use App\Data\ApprovePromoData;
use App\Enums\Promo\PromoModerationStatus;
use App\Models\Promo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApprovePromoActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_approves_promo(): void
    {
        /** @var User $moderator */
        $moderator = User::factory()->create();
        /** @var Promo $promo */
        $promo = Promo::factory()->create([
            'moderation_status' => PromoModerationStatus::PENDING,
            'started_at' => null,
        ]);

        $dto = new ApprovePromoData(
            promoId: $promo->id,
            moderatorId: $moderator->id,
            message: 'Looks good!',
        );

        ApprovePromoAction::run($dto);

        $this->assertDatabaseHas('promos', [
            'id' => $promo->id,
            'moderation_status' => PromoModerationStatus::APPROVED->value,
            'approved_by' => $moderator->id,
        ]);
        $promo->refresh();
        $this->assertNotNull($promo->started_at);
        $this->assertNotNull($promo->approved_at);
        $this->assertEquals('Looks good!', $promo->approving_notes);
    }

    public function test_sets_started_at_when_null(): void
    {
        /** @var User $moderator */
        $moderator = User::factory()->create();
        /** @var Promo $promo */
        $promo = Promo::factory()->create([
            'moderation_status' => PromoModerationStatus::PENDING,
            'started_at' => null,
        ]);

        $dto = new ApprovePromoData(
            promoId: $promo->id,
            moderatorId: $moderator->id,
        );

        ApprovePromoAction::run($dto);

        $promo->refresh();
        $this->assertNotNull($promo->started_at);
    }

    public function test_clears_rejected_fields(): void
    {
        /** @var User $moderator */
        $moderator = User::factory()->create();
        /** @var User $rejectedBy */
        $rejectedBy = User::factory()->create();
        /** @var Promo $promo */
        $promo = Promo::factory()->create([
            'moderation_status' => PromoModerationStatus::REJECTED,
            'rejected_at' => now()->subDay(),
            'rejected_by' => $rejectedBy->id,
            'rejection_reason' => 'Test rejection reason',
        ]);

        $dto = new ApprovePromoData(
            promoId: $promo->id,
            moderatorId: $moderator->id,
        );

        ApprovePromoAction::run($dto);

        $this->assertDatabaseHas('promos', [
            'id' => $promo->id,
            'moderation_status' => PromoModerationStatus::APPROVED->value,
            'rejected_at' => null,
            'rejected_by' => null,
            'rejection_reason' => null,
        ]);
    }
}
