<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::table('tariff_plans', function (Blueprint $table): void {
            $table->bigInteger('extra_ad_price')->default(0)->after('banner_price');
        });
    }

    public function down(): void
    {
        Schema::table('tariff_plans', function (Blueprint $table): void {
            $table->dropColumn('extra_ad_price');
        });
    }
};
