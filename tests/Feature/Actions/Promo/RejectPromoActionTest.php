<?php

declare(strict_types=1);

namespace Tests\Feature\Actions\Promo;

use App\Actions\Promo\RejectPromoAction;
use App\Data\RejectPromoData;
use App\Enums\Promo\PromoModerationStatus;
use App\Models\Promo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RejectPromoActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_rejects_promo(): void
    {
        /** @var User $moderator */
        $moderator = User::factory()->create();
        /** @var Promo $promo */
        $promo = Promo::factory()->create([
            'moderation_status' => PromoModerationStatus::PENDING,
        ]);

        $dto = new RejectPromoData(
            promoId: $promo->id,
            moderatorId: $moderator->id,
            rejectionReason: 'Inappropriate content',
            message: 'Please review guidelines',
        );

        RejectPromoAction::run($dto);

        $this->assertDatabaseHas('promos', [
            'id' => $promo->id,
            'moderation_status' => PromoModerationStatus::REJECTED->value,
            'rejected_by' => $moderator->id,
            'rejection_reason' => 'Inappropriate content',
        ]);
        $promo->refresh();
        $this->assertNotNull($promo->rejected_at);
    }

    public function test_clears_approved_fields(): void
    {
        /** @var User $moderator */
        $moderator = User::factory()->create();
        /** @var Promo $promo */
        $promo = Promo::factory()->create([
            'moderation_status' => PromoModerationStatus::APPROVED,
            'approved_at' => now()->subDay(),
            'approved_by' => User::factory()->create()->id,
            'approving_notes' => 'Looks good!',
        ]);

        $dto = new RejectPromoData(
            promoId: $promo->id,
            moderatorId: $moderator->id,
            rejectionReason: 'Content violation',
        );

        RejectPromoAction::run($dto);

        $this->assertDatabaseHas('promos', [
            'id' => $promo->id,
            'moderation_status' => PromoModerationStatus::REJECTED->value,
            'approved_at' => null,
            'approved_by' => null,
            'approving_notes' => null,
        ]);
    }
}

