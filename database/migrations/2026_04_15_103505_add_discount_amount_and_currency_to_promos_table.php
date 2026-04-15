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
        Schema::table('promos', function (Blueprint $table): void {
            $table->decimal('discount_amount', 10, 2)->unsigned()->nullable()->after('discount');
            $table->string('discount_currency', 3)->nullable()->after('discount_amount');
            $table->index(['discount_currency', 'discount_amount'], 'promos_discount_currency_amount_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('promos', function (Blueprint $table) {
            $table->dropIndex('promos_discount_currency_amount_idx');
            $table->dropColumn(['discount_amount', 'discount_currency']);
        });
    }
};
