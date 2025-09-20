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
        Schema::create('promos', function (Blueprint $table): void {
            $table->id();
            $table->string('name', 64);
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('type');
            $table->string('code')->nullable();
            $table->string('img')->nullable();
            $table->bigInteger('amount')->nullable();
            $table->text('description');
            $table->text('extra_conditions');
            $table->string('video_link', 2083)->nullable();
            $table->json('smm_links')->nullable();
            $table->json('days_availability')->nullable();
            $table->date('availabe_from')->nullable();
            $table->time('available_to')->nullable();
            $table->dateTime('started_at')->nullable();
            $table->dateTime('available_till');
            $table->boolean('show_on_home')->default(false);
            $table->integer('raise_on_top_hours')->default(0);
            $table->integer('restart_after_finish_days')->default(0);
            $table->bigInteger('sales_order_from')->default(0);
            $table->bigInteger('free_delivery_from')->default(0);
            $table->boolean('free_delivery')->default(false);
            $table->dateTime('approved_at')->nullable();
            $table->text('approving_notes')->nullable();
            $table->string('crmid')->nullable();
            $table->foreignId('adv_campaign_id')->nullable()->constrained('adv_campaigns');
            $table->foreignId('organisation_id')->nullable()->constrained('organisations');
            $table->string('discount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promos');
    }
};
