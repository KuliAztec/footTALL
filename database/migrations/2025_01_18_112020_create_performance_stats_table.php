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
        Schema::create('performance_stats', function (Blueprint $table) {
            $table->id('uid');

            $table->string('name')->nullable();
            $table->string('position')->nullable();
            $table->integer('age')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('club')->nullable();
            $table->string('nationality')->nullable();
            $table->string('preferred_foot')->nullable();

            $table->integer('apps');
            $table->integer('minutes');
            $table->integer('subs');

            $table->integer('goals');
            $table->decimal('xG', 5, 2);
            $table->integer('shots');

            $table->integer('assists');
            $table->decimal('xA', 5, 2);
            $table->integer('key_passes');
            $table->integer('progressive_passes');

            $table->integer('tackles_completed');
            $table->integer('interceptions');
            $table->integer('clearances');
            $table->integer('blocks');
            $table->decimal('possession_won_per_90', 5, 2);
            $table->decimal('possession_lost_per_90', 5, 2);

            $table->integer('clean_sheets');
            $table->integer('goals_conceded');

            $table->integer('total_distance');
            $table->decimal('headers_won_per_90', 5, 2);
            $table->decimal('headers_lost_per_90', 5, 2);
            $table->integer('aerial_duels_per_90');

            $table->integer('yellow_cards');
            $table->integer('red_cards');
            $table->integer('fouls');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('performance_stats');
    }
};
