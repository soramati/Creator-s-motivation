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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('goals_name', 20);
            $table->boolean('goals_is_deadline');
            $table->dateTimeTz('goals_deadline', $precision = 2);
            $table->string('goals_reward', 50);
            $table->string('goals_conditions', 50);
            $table->boolean('goals_repeat');
            $table->integer('goals_point');
            $table->boolean('goals_is_achieved');
            $table->integer('goagoals_percentls_point');
            $table->integer('goals_id');
            $table->integer('wishlists_id');
            $table->boolean('goals_is_set');
            $table->timestampsTz($precision = 2);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
