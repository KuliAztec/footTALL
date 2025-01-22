<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\BarChartController;
use App\Http\Controllers\PlayerStats;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/barchart', [BarChartController::class, 'index']);
Route::get('/barchart/data', [BarChartController::class, 'getData']);

Route::get('/playerstats', [PlayerStats::class, 'index']);

Route::get('/chart', [ChartController::class, 'index']);