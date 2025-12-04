<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tariff_plans', function (Blueprint $table): void {
            $table->unsignedTinyInteger('banner_slots_total')->after('extra_ad_price');
            $table->unsignedTinyInteger('own_banner_slots_total')->after('banner_slots_total');
            $table->decimal('cashback_bonus_percent', 3, 1)->after('own_banner_slots_total');

            $table->boolean('auto_schedule_enabled')->after('cashback_bonus_percent');
            $table->boolean('auto_restart_enabled')->after('auto_schedule_enabled');
            $table->boolean('auto_bump_enabled')->after('auto_restart_enabled');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tariff_plans', function (Blueprint $table): void {
            $table->dropColumn([
                'banner_slots_total',
                'own_banner_slots_total',
                'cashback_bonus_percent',
                'auto_schedule_enabled',
                'auto_restart_enabled',
                'auto_bump_enabled',
            ]);
        });
    }
};


