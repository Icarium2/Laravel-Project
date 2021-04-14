<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'search' => 'required|string',
        ]);
        $query = str_replace(' ', '+', $request->input('search'));

        $result = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/search/multi?query='.$query)
            ->json()['results'];

        return view('search', [
            'searchResults' => $result,
            'query'         => $query,
        ]);
    }
}
