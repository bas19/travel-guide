<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\VenueController;

Route::get('/forecast/{city}', [ForecastController::class, 'get_data_by_city']);
Route::get('/venue/search', [VenueController::class, 'get_places_by_city']);