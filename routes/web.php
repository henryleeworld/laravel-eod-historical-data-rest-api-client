<?php

use App\Http\Controllers\EODHistoricalDataController;
use Illuminate\Support\Facades\Route;

Route::get('eod_historical_data/show/', [EODHistoricalDataController::class, 'show']);
