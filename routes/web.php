<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\VisitorLogController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

Route::get('/register', [ParticipantController::class, 'create']);
Route::post('/register', [ParticipantController::class, 'store']);


Route::group(['middleware' => 'auth'], function () {

    Route::resource('artists', ArtistController::class);
    Route::resource('albums', AlbumController::class);
    Route::get('albums/{album}/set-to-play', [AlbumController::class, 'setToPlay'])->name('setToPlay');
    Route::get('albums/{album}/tracks', [AlbumController::class, 'albumTrack'])->name('albumTrack');
    Route::get('albums/{album}/tracks/{track}', [AlbumController::class, 'albumTrackEdit'])->name('albumTrackEdit');
    Route::put('albums/{album}/tracks/{track}', [AlbumController::class, 'albumTrackUpdate'])->name('albumTrackUpdate');
    Route::resource('genres', GenreController::class);
    Route::resource('tracks', TrackController::class);
    Route::get('visitors', [VisitorLogController::class, 'index']);
    Route::get('participants', [ParticipantController::class, 'index']);
    Route::get('participants/export', [ParticipantController::class, 'export'])->name('participants.export');


});



Route::get('login', [\App\Http\Controllers\AuthController::class, 'showLogin'])->name('login');

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('loginAdmin');

Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
