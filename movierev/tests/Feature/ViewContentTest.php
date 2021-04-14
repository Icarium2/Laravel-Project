<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ViewContentTest extends TestCase
{
    /** @test */
    public function the_main_page_shows_correct_info()
    {
        Http::fake([
            'https://api.themoviedb.org/3/movie/popular' => $this->fakePopularMovies(),
            'https://api.themoviedb.org/3/tv/popular'    => $this->fakePopularTvShows(),
        ]);

        $response = $this->get(route('movies.index'));

        $response->assertSee('Trending Movies');
        $response->assertSee('Trending TV Shows');
        $response->assertSee('Score');
        $response->assertSee('Reviews');
        $response->assertSee('Fake Movie');
        $response->assertSee('Fake TV Series');
    }

    /** @test */
    public function the_movie_page_shows_the_correct_info()
    {
        Http::fake([
            'https://api.themoviedb.org/3/movie/*' => $this->fakeSingleMovie(),
        ]);

        $response = $this->get(route('movies.show', 399566));
        $response->assertSee('Fake King Kong');
        $response->assertSee('Monsters are not real you buffoon, I cannot believe you would watch this film.');
        $response->assertSee('Score: 8.4');
    }

    /** @test */
    public function the_tv_page_shows_the_correct_info()
    {
        Http::fake([
            'https://api.themoviedb.org/3/tv/*' => $this->fakeSingleTvShow(),
        ]);

        $response = $this->get(route('tv.show', 88396));
        $response->assertSee('Bird man and Russian slave');
        $response->assertSee('Following a trail of bird shit, the russian slave wanders into wakanda where he is served nice food :)');
        $response->assertSee('Score: 7.8');
        $response->assertSee('Post a review');
    }

    /** @test */
    public function the_movies_page_shows_the_correct_info()
    {
        Http::fake([
            'https://api.themoviedb.org/3/movie/popular' => $this->fakePopularMovies(),
        ]);

        $response = $this->get(route('movies.list'));
        $response->assertSee('Popular Movies');
        $response->assertSee('Fake Movie');
    }

    private function fakeSingleMovie()
    {
        return Http::response([
            'results' => [
                'adult'                 => false,
                'backdrop_path'         => '/inJjDhCjfhh3RtrJWBmmDqeuSYC.jpg',
                'belongs_to_collection' => [
                    'id'            => 535313,
                    'name'          => 'Godzilla Collection',
                    'poster_path'   => '/inNN466SKHNjbGmpfhfsaPQNleS.jpg',
                    'backdrop_path' => '/oboBn4VYB79uDxnyIri0Nt3U3N2.jpg',
                ],
                'budget' => 200000000,
                'genres' => [
                    [
                        'id'   => 28,
                        'name' => 'Action',
                    ],
                    [
                        'id'   => 878,
                        'name' => 'Science Fiction',
                    ],
                ],
                'homepage'             => 'https=>//www.godzillavskong.net',
                'id'                   => 399566,
                'imdb_id'              => 'tt5034838',
                'original_language'    => 'en',
                'original_title'       => 'Fake King Kong',
                'overview'             => 'Monsters are not real you buffoon, I cannot believe you would watch this film.',
                'popularity'           => 6335.196,
                'poster_path'          => '/pgqgaUx1cJb5oZQQ5v0tNARCeBp.jpg',
                'production_companies' => [
                    [
                        'id'             => 174,
                        'logo_path'      => '/ky0xOc5OrhzkZ1N6KyUxacfQsCk.png',
                        'name'           => 'Warner Bros. Pictures',
                        'origin_country' => 'US',
                    ],
                    [
                        'id'             => 923,
                        'logo_path'      => '/5UQsZrfbfG2dYJbx8DxfoTr2Bvu.png',
                        'name'           => 'Legendary Pictures',
                        'origin_country' => 'US',
                    ],
                ],
                'production_countries' => [
                    [
                        'iso_3166_1' => 'US',
                        'name'       => 'United States of America',
                    ],
                ],
                'release_date'     => '2021-03-24',
                'revenue'          => 358600000,
                'runtime'          => 113,
                'spoken_languages' => [
                    [
                        'english_name' => 'English',
                        'iso_639_1'    => 'en',
                        'name'         => 'English',
                    ],
                ],
                'status'       => 'Released',
                'tagline'      => 'One Will Fall',
                'title'        => 'Fake King Kong',
                'video'        => false,
                'vote_average' => 8.4,
                'vote_count'   => 4373,
            ],
        ], 200);
    }

    private function fakeSingleTvShow()
    {
        return Http::response([
            'results' => [
                'backdrop_path' => '/b0WmHGc8LHTdGCVzxRb3IBMur57.jpg',
                'created_by'    => [
                    [
                        'id'           => 1868712,
                        'credit_id'    => '605508e2960cde00721fc5e8',
                        'name'         => 'Malcolm Spellman',
                        'gender'       => 2,
                        'profile_path' => null,
                    ],
                ],
                'episode_run_time' => [
                    50,
                ],
                'first_air_date' => '2021-03-19',
                'genres'         => [
                    [
                        'id'   => 10765,
                        'name' => 'Sci-Fi & Fantasy',
                    ],
                    [
                        'id'   => 10759,
                        'name' => 'Action & Adventure',
                    ],
                    [
                        'id'   => 18,
                        'name' => 'Drama',
                    ],
                    [
                        'id'   => 10768,
                        'name' => 'War & Politics',
                    ],
                ],
                'homepage'      => 'https=>//www.disneyplus.com/series/the-falcon-and-the-winter-soldier/4gglDBMx8icA',
                'id'            => 88396,
                'in_production' => true,
                'languages'     => [
                    'en',
                ],
                'last_air_date'       => '2021-04-09',
                'last_episode_to_air' => [
                    'air_date'        => '2021-04-09',
                    'episode_number'  => 4,
                    'id'              => 2558741,
                    'name'            => 'The Whole World Is Watching',
                    'overview'        => 'John Walker loses patience with Sam and Bucky as they learn more about Karli Morgenthau.',
                    'production_code' => '',
                    'season_number'   => 1,
                    'still_path'      => '/4TEsU66PQT7G2cexbliJcpvTPbH.jpg',
                    'vote_average'    => 7.7,
                    'vote_count'      => 6,
                ],
                'name'                => 'Bird man and Russian slave',
                'next_episode_to_air' => [
                    'air_date'        => '2021-04-16',
                    'episode_number'  => 5,
                    'id'              => 2558742,
                    'name'            => '',
                    'overview'        => '',
                    'production_code' => '',
                    'season_number'   => 1,
                    'still_path'      => null,
                    'vote_average'    => 10.0,
                    'vote_count'      => 1,
                ],
                'networks' => [
                    [
                        'name'           => 'Disney+',
                        'id'             => 2739,
                        'logo_path'      => '/gJ8VX6JSu3ciXHuC2dDGAo2lvwM.png',
                        'origin_country' => 'US',
                    ],
                ],
                'number_of_episodes' => 6,
                'number_of_seasons'  => 1,
                'origin_country'     => [
                    'US',
                ],
                'original_language'    => 'en',
                'original_name'        => 'Bird man and Russian slave',
                'overview'             => 'Following a trail of bird shit, the russian slave wanders into wakanda where he is served nice food :)',
                'popularity'           => 3775.298,
                'poster_path'          => '/6kbAMLteGO8yyewYau6bJ683sw7.jpg',
                'production_companies' => [
                    [
                        'id'             => 420,
                        'logo_path'      => '/hUzeosd33nzE5MCNsZxCGEKTXaQ.png',
                        'name'           => 'Marvel Studios',
                        'origin_country' => 'US',
                    ],
                ],
                'production_countries' => [
                    [
                        'iso_3166_1' => 'US',
                        'name'       => 'United States of America',
                    ],
                ],
                'seasons' => [
                    [
                        'air_date'      => '2021-03-19',
                        'episode_count' => 6,
                        'id'            => 156676,
                        'name'          => 'Season 1',
                        'overview'      => '',
                        'poster_path'   => '/fIT6Y6O3cUX1X8qY8pZgzEvxUDQ.jpg',
                        'season_number' => 1,
                    ],
                ],
                'spoken_languages' => [
                    [
                        'english_name' => 'English',
                        'iso_639_1'    => 'en',
                        'name'         => 'English',
                    ],
                ],
                'status'       => 'Returning Series',
                'tagline'      => 'Honor the shield.',
                'type'         => 'Miniseries',
                'vote_average' => 7.8,
                'vote_count'   => 3687,
            ],
        ], 200);
    }

    private function fakePopularMovies()
    {
        return Http::response([
            'results' => [
                'adult'         => false,
                'backdrop_path' => '/inJjDhCjfhh3RtrJWBmmDqeuSYC.jpg',
                'genre_ids'     => [
                    0 => 28,
                    1 => 878,
                ],
                'id'                => 399566,
                'original_language' => 'en',
                'original_title'    => 'Fake Movie',
                'overview'          => 'In a time when fakers roamed the League of Legends, humanity’s fight for its future sets faker and rekkless on a collision course that will see the two most powerful forces of nature on the planet collide in a spectacular battle for the ages.',
                'popularity'        => 6335.196,
                'poster_path'       => '/pgqgaUx1cJb5oZQQ5v0tNARCeBp.jpg',
                'release_date'      => '2021-03-24',
                'title'             => 'Fake Movie',
                'video'             => false,
                'vote_average'      => 8.4,
                'vote_count'        => 4359,
            ],
        ], 200);
    }

    private function fakePopularTvShows()
    {
        return Http::response([
            'results' => [
                'backdrop_path'  => '/b0WmHGc8LHTdGCVzxRb3IBMur57.jpg',
                'first_air_date' => '2021-03-19',
                'genre_ids'      => [
                    10765,
                    10759,
                    18,
                    10768,
                ],
                'id'             => 88396,
                'name'           => 'Fake TV Series',
                'origin_country' => [
                    'US',
                ],
                'original_language' => 'en',
                'original_name'     => 'Fake TV Series',
                'overview'          => 'Following the events of “LCS: Stockholm”, the Faker, Sam Raimi and Jonjo team up in a global adventure that tests their abilities, and their patience.',
                'popularity'        => 3775.298,
                'poster_path'       => '/6kbAMLteGO8yyewYau6bJ683sw7.jpg',
                'vote_average'      => 7.8,
                'vote_count'        => 3659,
            ],
        ], 200);
    }
}
