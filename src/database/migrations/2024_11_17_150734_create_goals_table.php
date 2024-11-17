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
        Schema::create('goals', function (Blueprint $table) {
            $table->id();
            $table->string('goals_name', 20)->require();
            $table->boolean('goals_is_deadline')->default(false);
            $table->dateTimeTz('goals_deadline', $precision = 2)->nullable($value = true);
            $table->string('goals_reward', 50)->default('特になし')->nullable($value = true);
            $table->string('goals_conditions', 50)->nullable($value = true);
            $table->boolean('goals_repeat')->default(false);
            $table->integer('goals_point')->default(0);
            $table->boolean('goals_is_achieved')->default(false);
            $table->integer('goagoals_percentls_point')->default(0);
            $table->integer('users_id')->nullable($value = true);
            $table->integer('wishlists_id')->nullable($value = true);
            $table->boolean('goals_is_set')->default(false);
            $table->timestampsTz($precision = 2);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goals');
    }
};
