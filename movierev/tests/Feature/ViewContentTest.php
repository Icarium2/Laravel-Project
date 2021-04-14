<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ViewContentTest extends TestCase
{
    /** @test */
    public function the_man_page_shows_correct_info()
    {
        Http::fake();

        $response = $this->get(route('movies.index'));

        $response->assertSeeText('Trending Movies');
        $response->assertSeeText('Trending TV Shows');
        $response->assertSeeText('Score');
        $response->assertSeeText('Reviews');
    }
}
