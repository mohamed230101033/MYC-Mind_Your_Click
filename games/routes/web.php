<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Welcome and game start
Route::get('/', [GameController::class, 'welcome'])->name('welcome');
Route::post('/start-game', [GameController::class, 'startGame'])->name('start-game');

// Game routes
Route::prefix('game')->name('game.')->group(function () {
    Route::get('/intro', [GameController::class, 'intro'])->name('intro');
    Route::get('/story', [GameController::class, 'storyMode'])->name('story');
    Route::get('/mission/{id}', [GameController::class, 'mission'])->name('mission');
    Route::post('/mission/{id}', [GameController::class, 'submitMission'])->name('submit-mission');
    Route::get('/village', [GameController::class, 'village'])->name('village');
    Route::get('/challenge', [GameController::class, 'challenge'])->name('challenge');
    Route::post('/challenge', [GameController::class, 'submitChallenge'])->name('submit-challenge');
});

// Simple routes for the remaining pages in the app
Route::get('/home', [GameController::class, 'welcome'])->name('home');
