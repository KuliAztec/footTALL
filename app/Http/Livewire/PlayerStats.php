<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PerformanceStat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PlayerStats extends Component
{
    public $playerStats;
    public $sortField = 'name';
    public $sortDirection = 'asc';

    public function mount()
    {
        $this->loadPlayerStats();
    }

    private function getPositionOrder($position)
    {
        $positions = [
            'gk' => 1,
            'd (l)' => 2,
            'd (c)' => 3,
            'd (r)' => 4,
            'dm' => 5,
            'm (c)' => 6,
            'am (l)' => 7,
            'am (r)' => 8,
            'st (c)' => 9
        ];

        $position = trim(strtolower(str_replace('.', '', $position)));
        return $positions[$position] ?? 999;
    }

    public function loadPlayerStats()
    {
        if ($this->sortField === 'position') {
            $this->playerStats = PerformanceStat::all()
                ->sortBy(function($stat) {
                    return $this->getPositionOrder($stat->position);
                }, SORT_REGULAR, $this->sortDirection === 'desc');
            
            // Debug line - bisa dihapus setelah memastikan sorting bekerja
            Log::info('Sorting positions:', ['positions' => $this->playerStats->pluck('position')->toArray()]);
        } else {
            $this->playerStats = PerformanceStat::orderBy($this->sortField, $this->sortDirection)
                ->get();
        }
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
        $this->loadPlayerStats();
    }

    public function render()
    {
        return view('livewire.player-stats', [
            'playerStats' => $this->playerStats
        ])->layout('layouts.app'); // Ensure this layout exists
    }
}