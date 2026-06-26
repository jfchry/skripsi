<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AdminController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/destinations', [HomeController::class, 'destinations'])
    ->name('destinations');

Route::get('/destinations/{id}', [HomeController::class, 'destinationDetail'])
    ->name('destinations.detail');

Route::get('/guides', [HomeController::class, 'guides'])
    ->name('guides');

Route::get('/guides/{id}', [HomeController::class, 'guideDetail'])
    ->name('guides.detail');

Route::get('/itineraries', [HomeController::class, 'itineraries'])
    ->name('itineraries');

Route::get('/itineraries/{id}', [HomeController::class, 'itineraryDetail'])
    ->name('itineraries.detail');

Route::get('/villa', [HomeController::class, 'villa'])
    ->name('villa');
    

Route::get('/admin', [AdminController::class, 'dashboard'])
    ->name('dashboard');

