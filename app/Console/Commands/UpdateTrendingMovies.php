<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Traits\MovieTrait;
use App\Models\Movie;

class UpdateTrendingMovies extends Command
{
    use MovieTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movies:trending';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update daily trending movies';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $trending = $this->callTMDBendpoint('trending/movie/day');
    
        foreach($trending->results as $m) {
            $movie = Movie::where('movie_id', $m->id)->first();
            if(!$movie) $movie = new Movie();

            $movie->movie_id = $m->id;
            $movie->backdrop_path = $m->backdrop_path;
            $movie->title = $m->title;
            $movie->overview = $m->overview;
            $movie->poster_path = $m->poster_path;
            $movie->media_type = $m->media_type;
            $movie->adult = $m->adult;
            $movie->genre_ids = json_encode($m->genre_ids);
            $movie->popularity = $m->popularity;
            $movie->release_date = $m->release_date;
            $movie->vote_average = $m->vote_average;
            $movie->vote_count = $m->vote_count;

            $movie->save();
        }
    }
}
