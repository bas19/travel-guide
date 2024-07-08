<?php

use App\Http\Controllers\ForecastController;
use App\Http\Controllers\VenueController;
use Illuminate\Support\Facades\Route;

Route::get('/forecast/{city}', [ForecastController::class, 'get_data_by_city']);
Route::get('/venue/search', [VenueController::class, 'get_places_by_city']);
