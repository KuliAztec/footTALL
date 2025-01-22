<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index()
    {
        $chartTypes = [
            'Goalkeeper' => ['XgPrv/90', 'Conc/90', 'Itc/90', 'PsC%'],
            'CB-Stopper' => ['Tck/90', 'HdrsW/90', 'Clr/90', 'Itc/90', 'Blk/90'],
            'CB-BallPlaying' => ['Tck/90', 'Clr/90', 'Itc/90', 'Blk/90', 'PrP/90'],
            'Fullback' => ['Tck/90', 'Itc/90', 'PresC/90', 'OpCrP/90', 'PrP/90'],
            'Wingback' => ['Tck/90', 'Itc/90', 'PresC/90', 'OpCrP/90', 'Dr/90'],
            'MF-Destroyer' => ['Tck/90', 'Itc/90', 'Blk/90', 'PresC/90', 'PsC%'],
            'MF-Creator' => ['OpKP/90', 'PrP/90', 'xA/90', 'Drb/90', 'PsC%'],
            'MF-Attacking' => ['OpKP/90', 'xA/90', 'Drb/90', 'PsC%', 'ShT/90'],
            'Wing-Provider' => ['Drb/90', 'OpKP/90', 'Spr/90', 'OpKP/90', 'xA/90'],
            'Wing-Striker' => ['Drb/90', 'SoT/90', 'Spr/90', 'npxG/90', 'Cnv%'],
            'FW-Provider' => ['HdrsW/90', 'xA/90', 'npxG/90', 'SoT/90', 'Cnv%'],
            'FW-Striker' => ['Hdrs/90', 'Drb/90', 'npxG/90', 'SoT/90', 'Cnv%']
        ];

        $chartsData = [];
        foreach ($chartTypes as $type => $labels) {
            $chartsData[] = [
                'labels' => $labels,
                'datasets' => [[
                    'label' => $type,
                    'data' => array_map(function() { return rand(1, 20); }, $labels),
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    'borderColor' => [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    'borderWidth' => 1
                ]]
            ];
        }

        $players = DB::table('stats')->get();

        return view('chart', ['chartsData' => $chartsData, 'players' => $players]);
    }

    public function getPlayerStats($playerId)
    {
        $playerStats = DB::table('stats')->where('id', $playerId)->first();
        return response()->json($playerStats);
    }
}