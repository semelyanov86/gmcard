<?php

declare(strict_types=1);

namespace Tests\Feature\Actions\Promo;

use App\Actions\Promo\GetPromoTypesAction;
use App\Data\PromoTypeData;
use App\Enums\PromoTypeSizeEnum;
use App\Models\PromoType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetPromoTypesActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_returns_only_active_types(): void
    {
        $this->createPromoType('active', 'Active Type', true, 1);
        $this->createPromoType('inactive', 'Inactive Type', false, 2);

        $result = GetPromoTypesAction::run();

        $this->assertCount(1, $result);
        $this->assertEquals('Active Type', $result[0]->title);
    }

    public function test_orders_by_sort_order(): void
    {
        $this->createPromoType('third', 'Third', true, 3);
        $this->createPromoType('first', 'First', true, 1);
        $this->createPromoType('second', 'Second', true, 2);

        $result = GetPromoTypesAction::run();

        $this->assertCount(3, $result);
        $this->assertEquals('First', $result[0]->title);
        $this->assertEquals('Second', $result[1]->title);
        $this->assertEquals('Third', $result[2]->title);
    }

    public function test_maps_to_promo_type_data(): void
    {
        $this->createPromoType('test', 'Test Type', true, 1, 'Test description');

        $result = GetPromoTypesAction::run();

        $this->assertCount(1, $result);
        $this->assertInstanceOf(PromoTypeData::class, $result[0]);
        $this->assertEquals('Test Type', $result[0]->title);
        $this->assertEquals('Test description', $result[0]->description);
    }

    private function createPromoType(string $code, string $name, bool $isActive, int $sortOrder, ?string $description = null): PromoType
    {
        return PromoType::factory()->create([
            'code' => $code,
            'name' => $name,
            'description' => $description,
            'is_active' => $isActive,
            'sort_order' => $sortOrder,
        ]);
    }
}

