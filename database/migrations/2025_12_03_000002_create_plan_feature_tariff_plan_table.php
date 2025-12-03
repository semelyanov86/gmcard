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
        Schema::create('plan_feature_tariff_plan', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('tariff_plan_id')->constrained()->cascadeOnDelete();
            $table->foreignId('plan_feature_id')->constrained()->cascadeOnDelete();
            $table->boolean('is_included')->default(true);
            $table->timestamps();

            $table->unique(['tariff_plan_id', 'plan_feature_id'], 'plan_feature_tariff_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_feature_tariff_plan');
    }
};
