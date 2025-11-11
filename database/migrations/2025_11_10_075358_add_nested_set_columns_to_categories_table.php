<?php

declare(strict_types=1);

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasColumn('categories', '_lft')) {
            Schema::table('categories', function (Blueprint $table): void {
                $table->unsignedInteger('_lft')->default(0);
                $table->unsignedInteger('_rgt')->default(0);
            });

            if (Category::count() > 0) {
                Category::fixTree();
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('categories', '_lft')) {
            Schema::table('categories', function (Blueprint $table): void {
                $table->dropNestedSet();
            });
        }
    }
};
