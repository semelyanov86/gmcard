<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::table('promos', function (Blueprint $table): void {
            $table->string('moderation_status')->default('draft')->after('approving_notes');
            $table->dateTime('rejected_at')->nullable()->after('moderation_status');
            $table->foreignId('rejected_by')->nullable()->constrained('users')->nullOnDelete()->after('rejected_at');
            $table->text('rejection_reason')->nullable()->after('rejected_by');
            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete()->after('rejection_reason');
        });
    }

    public function down(): void
    {
        Schema::table('promos', function (Blueprint $table): void {
            $table->dropForeign(['rejected_by']);
            $table->dropForeign(['approved_by']);
            $table->dropColumn([
                'moderation_status',
                'rejected_at',
                'rejected_by',
                'rejection_reason',
                'approved_by',
            ]);
        });
    }
};
