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
        Schema::table('users', function (Blueprint $table): void {
            $table->string('last_name')->nullable();
            $table->tinyInteger('age')->default(0);
            $table->decimal('balance', 10, 2)->default(0)->nullable();
            $table->string('job')->nullable();
            $table->string('job_status', 100)->nullable();
            $table->bigInteger('city')->nullable();
            $table->string('country')->nullable();
            $table->date('birth_date')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            $table->dropColumn([
                'last_name',
                'age',
                'balance',
                'job',
                'job_status',
                'city',
                'country',
                'birth_date',
                'gender',
                'code',
            ]);
        });
    }
};
