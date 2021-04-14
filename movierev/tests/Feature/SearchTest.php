<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class SearchTest extends TestCase
{
    /** @test */
    public function search_results_are_correct()
    {
        // Http::fake([
        //     'https://api.themoviedb.org/3/search/multi&query=' => $this->fakeSearchResult(),
        // ]);

        $response = $this
            ->followingRedirects()
            ->get('/search?search=falcon');

        $response->assertSee('Search results for falcon');
        $response->assertSee('The Falcon and the Winter Soldier');
    }

    private function fakeSearchResult()
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
                'media_type'     => 'tv',
                'name'           => 'Fake TV Show',
                'origin_country' => [
                    'US',
                ],
                'original_language' => 'en',
                'original_name'     => 'Fake TV Show',
                'overview'          => 'Following the events of “Avengers: Endgame”, the Falcon, Sam Wilson and the Winter Soldier, Bucky Barnes team up in a global adventure that tests their abilities, and their patience.',
                'popularity'        => 3775.298,
                'poster_path'       => '/6kbAMLteGO8yyewYau6bJ683sw7.jpg',
                'vote_average'      => 7.8,
                'vote_count'        => 3659,
            ],
        ], 200);
    }
}
