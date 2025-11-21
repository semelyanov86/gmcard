<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::table('promos', function (Blueprint $table): void {
            $table->text('rejection_message')->nullable()->after('rejection_reason');
        });
    }

    public function down(): void
    {
        Schema::table('promos', function (Blueprint $table): void {
            $table->dropColumn('rejection_message');
        });
    }
};
