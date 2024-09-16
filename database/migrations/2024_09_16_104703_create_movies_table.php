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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->integer('movie_id');
            $table->string('backdrop_path', 255);
            $table->string('title', 255);
            $table->text('overview');
            $table->string('poster_path', 255);
            $table->string('media_type', 255);
            $table->boolean('adult');
            $table->text('genre_ids');
            $table->float('popularity');
            $table->date('release_date');
            $table->float('vote_average');
            $table->integer('vote_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
