<?php

use App\Http\Controllers\CreateReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TVController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MoviesController::class, 'index'])->name('movies.index');
Route::get('/movies/{movie}', [MoviesController::class, 'show'])->name('movies.show');
Route::get('/tv/{tv}', [TVController::class, 'show'])->name('tv.show');
Route::post('register', RegisterController::class)->middleware('guest');
Route::post('review', CreateReviewController::class)->middleware('auth');
Route::view('authorization', 'login')->name('login')->middleware('guest');
Route::post('login', LoginController::class)->middleware('guest');
Route::get('profile', ProfileController::class)->middleware('auth');
Route::get('logout', LogoutController::class);
