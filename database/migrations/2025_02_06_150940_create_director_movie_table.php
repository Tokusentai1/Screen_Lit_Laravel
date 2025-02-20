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
        Schema::create('director_movie', function (Blueprint $table) {
            $table->foreignId('director_id')->constrained('directors')->cascadeOnDelete();
            $table->foreignId('movie_id')->constrained('movies')->cascadeOnDelete();
            $table->string('director_role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('director_movie');
    }
};
