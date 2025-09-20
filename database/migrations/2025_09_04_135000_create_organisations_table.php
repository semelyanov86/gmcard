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
        Schema::create('organisations', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('address_id')->constrained('addresses');
            $table->string('name');
            $table->string('owner_role');
            $table->string('inn', 15)->nullable();
            $table->string('ogrn', 20)->nullable();
            $table->string('contact')->nullable();
            $table->string('contact_fio')->nullable();
            $table->json('opening_hours')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organisations');
    }
};
