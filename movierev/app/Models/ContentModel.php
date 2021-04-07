<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentModel extends Model
{
    use HasFactory;
    public $popularTv;
    public $popularMovies;


    public function __construct($popularTv, $popularMovies)
    {
        $this->popularTv = $popularTv;
        $this->popularMovies = $popularMovies;
    }

    public function popularTv()
    {
        return $this->formatTv($this->popularTv);
    }


    public function popularMovies()
    {
        return $this->formatMovies($this->popularMovies);
    }


    private function formatTv($tv)
    {
        return collect($tv)->map(function($tvshow) {

            return collect($tvshow)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/'.$tvshow['poster_path'],
                'vote_average' => $tvshow['vote_average'] * 10 .'%',

            ])->only([
                'poster_path', 'id', 'name', 'vote_average', 'overview',
            ]);
        });
    }

    private function formatMovies($movies)
    {
        return collect($movies)->map(function($movie) {

            return collect($movie)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'],
                'vote_average' => $movie['vote_average'] * 10 .'%',

            ])->only([
                'poster_path', 'id', 'name', 'vote_average', 'overview',
            ]);
        });
    }




}
