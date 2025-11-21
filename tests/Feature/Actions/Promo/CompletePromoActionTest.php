<?php

declare(strict_types=1);

namespace Tests\Feature\Actions\Promo;

use App\Actions\Promo\CompletePromoAction;
use App\Models\Promo;
use Carbon\CarbonImmutable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompletePromoActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_completes_promo(): void
    {
        /** @var Promo $promo */
        $promo = Promo::factory()->create([
            'available_till' => CarbonImmutable::now()->addDays(7),
        ]);

        CompletePromoAction::run($promo);

        $promo->refresh();
        $this->assertNotNull($promo->available_till);
        $this->assertLessThanOrEqual(
            CarbonImmutable::now()->timestamp,
            $promo->available_till->timestamp
        );
    }

    public function test_sets_available_till_to_current_time(): void
    {
        /** @var Promo $promo */
        $promo = Promo::factory()->create([
            'available_till' => CarbonImmutable::now()->addDays(10),
        ]);

        $before = CarbonImmutable::now();
        CompletePromoAction::run($promo);
        $after = CarbonImmutable::now();

        $promo->refresh();
        $this->assertNotNull($promo->available_till);
        $this->assertGreaterThanOrEqual($before->timestamp, $promo->available_till->timestamp);
        $this->assertLessThanOrEqual($after->timestamp, $promo->available_till->timestamp);
    }
}
