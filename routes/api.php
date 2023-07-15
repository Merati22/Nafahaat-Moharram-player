<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Artists
Route::get('/artists', [ArtistController::class, 'index']);
Route::post('/artists', [ArtistController::class, 'store']);
Route::get('/artists/{artist}', [ArtistController::class, 'show']);
Route::put('/artists/{artist}', [ArtistController::class, 'update']);
Route::delete('/artists/{artist}', [ArtistController::class, 'destroy']);

// Albums
Route::get('/albums', [AlbumController::class, 'index']);
Route::post('/albums', [AlbumController::class, 'store']);
Route::get('/albums/{album}', [AlbumController::class, 'show']);
Route::put('/albums/{album}', [AlbumController::class, 'update']);
Route::delete('/albums/{album}', [AlbumController::class, 'destroy']);

// Tracks
Route::get('/tracks', [TrackController::class, 'index']);
Route::post('/tracks', [TrackController::class, 'create']);
Route::get('/tracks/{track}', [TrackController::class, 'show']);
Route::put('/tracks/{track}', [TrackController::class, 'update']);
Route::delete('/tracks/{track}', [TrackController::class, 'destroy']);

// Users
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{user}', [UserController::class, 'show']);
Route::put('/users/{user}', [UserController::class, 'update']);
Route::delete('/users/{user}', [UserController::class, 'destroy']);


Route::get('genres', [GenreController::class, 'index']);
Route::post('genres', [GenreController::class, 'store']);
Route::get('genres/{genre}', [GenreController::class, 'show']);
Route::put('genres/{genre}', [GenreController::class, 'update']);
Route::delete('genres/{genre}', [GenreController::class, 'destroy']);
