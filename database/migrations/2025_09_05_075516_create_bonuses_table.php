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
        Schema::create('bonuses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('amount')->nullable();
            $table->bigInteger('code')->nullable();
            $table->foreignId('source_id')->nullable()->constrained('users');
            $table->foreignId('target_id')->nullable()->constrained('users');
            $table->enum('type',['incoming','outgoing'])->nullable();
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
