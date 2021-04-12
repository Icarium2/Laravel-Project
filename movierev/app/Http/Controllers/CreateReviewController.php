<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateReviewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            // Do the validation
        ]);
        $review = new Review();
        $review->user_id = Auth::id();
        $review->movie_id = $request->input('movie_id');
        $review->tv_id = $request->input('tv_id');
        $review->content = $request->input('content');
        $review->save();

        return back();
    }
}
