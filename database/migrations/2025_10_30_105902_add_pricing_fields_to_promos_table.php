<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::table('promos', function (Blueprint $table): void {
            $table->bigInteger('daily_cost')->default(0)->after('discount');
            $table->boolean('payment_required')->default(false)->after('daily_cost');
        });
    }

    public function down(): void
    {
        Schema::table('promos', function (Blueprint $table): void {
            $table->dropColumn(['daily_cost', 'payment_required']);
        });
    }
};
