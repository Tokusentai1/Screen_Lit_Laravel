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
        Schema::create('actor_award', function (Blueprint $table) {
            $table->foreignId('actor_id')->constrained('actors')->cascadeOnDelete();
            $table->foreignId('award_id')->constrained('awards')->cascadeOnDelete();
            $table->date('year_won');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actor_award');
    }
};
