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
        Schema::create('bonuses', function (Blueprint $table): void {
            $table->id();
            $table->bigInteger('amount')->nullable();
            $table->bigInteger('code')->nullable();
            $table->foreignId('source_id')->nullable()->constrained('users');
            $table->foreignId('target_id')->nullable()->constrained('users');
            $table->string('type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bonuses');
    }
};
