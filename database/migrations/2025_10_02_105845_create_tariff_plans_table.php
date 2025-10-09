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
        Schema::create('tariff_plans', function (Blueprint $table): void {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->text('description')->nullable();
            $table->bigInteger('price');
            $table->integer('ads_count')->default(0);
            $table->bigInteger('banner_price')->nullable();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table): void {
            $table->foreignId('tariff_plan_id')->nullable()->constrained()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            $table->dropForeign(['tariff_plan_id']);
            $table->dropColumn('tariff_plan_id');
        });

        Schema::dropIfExists('tariff_plans');
    }
};
