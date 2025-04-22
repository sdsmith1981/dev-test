<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Http\Controllers\DashboardController::class)->name('dashboard');
Route::get('breed/{breedId}', \App\Http\Controllers\BreedController::class)->name('breed.show');

Route::middleware(['throttle:search'])->group(function () {
    Route::get('search', \App\Http\Controllers\SearchController::class)->name('search');
});
