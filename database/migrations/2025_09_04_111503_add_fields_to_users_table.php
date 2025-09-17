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
            $table->bigInteger('balance')->default(0)->nullable();
            $table->string('job', 50)->nullable();
            $table->string('job_status', 100)->nullable();
            $table->bigInteger('city')->nullable();
            $table->string('country', 50)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('gender')->nullable();
            $table->string('code', 20)->nullable();
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
