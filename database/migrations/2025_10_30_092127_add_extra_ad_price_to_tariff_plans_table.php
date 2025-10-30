<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tariff_plans', function (Blueprint $table) {
            $table->bigInteger('extra_ad_price')->default(0)->after('banner_price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tariff_plans', function (Blueprint $table) {
            $table->dropColumn('extra_ad_price');
        });
    }
};
