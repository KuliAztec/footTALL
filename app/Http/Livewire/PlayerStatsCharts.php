<?php

namespace App\Http\Livewire;

use App\Models\PerformanceStat;
use Livewire\Component;

class PlayerStatsCharts extends Component
{
    public $chartData = [];

    public function mount()
    {
        $stats = PerformanceStat::all();

        $this->chartData = [
            'labels' => $stats->pluck('name')->map(fn($name) => $name ?? 'Unknown'),
            'datasets' => [
                [
                    'label' => 'Goals',
                    'data' => $stats->pluck('goals'),
                    'backgroundColor' => '#4CAF50',
                ],
                [
                    'label' => 'Assists',
                    'data' => $stats->pluck('assists'),
                    'backgroundColor' => '#2196F3',
                ],
            ],
        ];

        // Log chartData for debugging
        logger('Chart Data:', $this->chartData);
    }

    public function render()
    {
        return view('livewire.player-stats-chart', [
            'chartData' => $this->chartData, // Ensure chartData is passed here
        ])->layout('layouts.app'); // Specify the correct layout
    }
}
