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
        Schema::table('promos', function (Blueprint $table) {
            $table->foreignId('promo_type_id')->nullable()->after('user_id')->constrained('promo_types')->nullOnDelete();
            $table->string('type')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('promos', function (Blueprint $table) {
            $table->dropForeign(['promo_type_id']);
            $table->dropColumn('promo_type_id');
            $table->string('type')->nullable(false)->change();
        });
    }
};

