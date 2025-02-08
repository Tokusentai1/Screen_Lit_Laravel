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
        Schema::create('movie_review', function (Blueprint $table) {
            $table->foreignId('movie_id')->constrained('movies')->cascadeOnDelete();
            $table->foreignId('review_id')->constrained('reviews')->cascadeOnDelete();
            $table->integer('movie_score');
            $table->string('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_review');
    }
};
