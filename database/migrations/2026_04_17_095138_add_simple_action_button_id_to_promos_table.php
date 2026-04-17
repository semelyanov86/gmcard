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
        Schema::table('promos', function (Blueprint $table): void {
            $table->foreignId('simple_action_button_id')
                ->nullable()
                ->after('promo_type_id')
                ->constrained('promo_action_buttons')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('promos', function (Blueprint $table): void {
            $table->dropForeign(['simple_action_button_id']);
            $table->dropColumn('simple_action_button_id');
        });
    }
};
