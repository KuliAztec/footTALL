<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{

    public function index(Request $request)
    {
        // Example data, radar chart
        $position = $request->input('position', 'Forward'); // Get position from request, default to 'Forward'
        error_log('Current position: ' . $position); // Log the current position

        $defaultLabels = ['HdrW/90', 'Dr/90', 'NpXG/90', 'SoT/90', 'Conversion%'];
        $defaultDatasets = [
            [
                'label' => 'Player 1',
                'data' => [2.22, 3.29, 1.95, 4.35, 3.51],
                'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                'borderColor' => 'rgba(255, 99, 132, 1)',
                'pointBackgroundColor' => 'rgb(255, 99, 132)',
                'pointBorderColor' => '#fff',
                'pointHoverBackgroundColor' => '#fff',
                'pointHoverBorderColor' => 'rgb(255, 99, 132)'
            ],
            [
                'label' => 'Player 2',
                'data' => [2.83, 3.30, 0.65, 2.83, 1.72],
                'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                'borderColor' => 'rgba(54, 162, 235, 1)',
                'pointBackgroundColor' => 'rgb(54, 162, 235)',
                'pointBorderColor' => '#fff',
                'pointHoverBackgroundColor' => '#fff',
                'pointHoverBorderColor' => 'rgb(54, 162, 235)'
            ]
        ];

        if ($position === 'Midfielder') {
            $labels = ['Op-Kp/90', 'PrP/90', 'xA/90', 'Dr/90', 'Ps%'];
            $datasets = [
                [
                    'label' => 'Player 1',
                    'data' => [2.22, 3.29, 1.95, 4.35, 3.51],
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'pointBackgroundColor' => 'rgb(255, 99, 132)',
                    'pointBorderColor' => '#fff',
                    'pointHoverBackgroundColor' => '#fff',
                    'pointHoverBorderColor' => 'rgb(255, 99, 132)'
                ],
                [
                    'label' => 'Player 2',
                    'data' => [2.83, 3.30, 0.65, 2.83, 1.72],
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'pointBackgroundColor' => 'rgb(54, 162, 235)',
                    'pointBorderColor' => '#fff',
                    'pointHoverBackgroundColor' => '#fff',
                    'pointHoverBorderColor' => 'rgb(54, 162, 235)'
                ]
            ];
        } elseif ($position === 'Defender') {
            $labels = ['Tck/90', 'Clr/90', 'Itc/90', 'Blk/90', 'PrP/90'];
            $datasets = [
                [
                    'label' => 'Player 1',
                    'data' => [2.22, 3.29, 1.95, 4.35, 3.51],
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'pointBackgroundColor' => 'rgb(255, 99, 132)',
                    'pointBorderColor' => '#fff',
                    'pointHoverBackgroundColor' => '#fff',
                    'pointHoverBorderColor' => 'rgb(255, 99, 132)'
                ],
                [
                    'label' => 'Player 2',
                    'data' => [2.83, 3.30, 0.65, 2.83, 1.72],
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'pointBackgroundColor' => 'rgb(54, 162, 235)',
                    'pointBorderColor' => '#fff',
                    'pointHoverBackgroundColor' => '#fff',
                    'pointHoverBorderColor' => 'rgb(54, 162, 235)'
                ]
            ];
        } else {
            $labels = $request->input('labels', $defaultLabels);
            $datasets = $request->input('datasets', $defaultDatasets);
        }

        return view('chart', compact('labels', 'datasets', 'position'));
    }
}
