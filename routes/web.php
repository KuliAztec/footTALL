<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\PlayerStats;
use App\Http\Livewire\PlayerStatsCharts;

Route::get('/player-stats', PlayerStats::class);

Route::get('/player-stats-charts', PlayerStatsCharts::class);

Route::get('/', function () {
    return view('welcome');
});