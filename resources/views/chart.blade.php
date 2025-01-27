<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.css">
    <style>
        .chart-container {
            width: 400px;
            height: 400px;
            display: inline-block;
            margin: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Player Comparison Charts</h1>
        <a href="/">Go to Home</a>
        <br>
        <label for="playerSelect">Player:</label>
        <select id="playerSelect" onchange="updatePlayerStats()">
            @foreach($players as $player)
                <option value="{{ $player->id }}" data-stats='@json($player->stats)'>{{ $player->name }}</option>
            @endforeach
        </select>
        <br>
        <label for="dummyDataSelect">Dummy Data Type:</label>
        <select id="dummyDataSelect" onchange="updateDummyData()">
            <option value="good">Good</option>
            <option value="ok">Ok</option>
            <option value="poor">Poor</option>
        </select>
        <br>
        <button onclick="syncData()">Sync Data</button>
        <br>
        @for ($i = 0; $i < 12; $i++)
            <div class="chart-container">
                <h2>Chart {{ $i + 1 }}: {{ ['Goalkeeper', 'CB-Stopper', 'CB-BallPlaying', 'Fullback', 'Wingback', 'MF-Destroyer', 'MF-Creator', 'MF-Attacking', 'Wing-Provider', 'Wing-Striker', 'FW-Provider', 'FW-Striker'][$i] }}</h2>
                <label for="chartType{{ $i }}">Chart Type:</label>
                <select id="chartType{{ $i }}" onchange="updateChartType({{ $i }})">
                    <option value="radar">Radar</option>
                    <option value="bar">Bar</option>
                    <option value="line">Line</option>
                </select>
                <canvas id="myChart{{ $i }}"></canvas>
            </div>
        @endfor
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <script>
        var charts = [];
        var chartAttributes = [
            ['xgp_per_90', 'con_per_90', 'int_per_90', 'pas_perc'], // Goalkeeper
            ['tck_per_90', 'hdrs_w_per_90', 'clr_per_90', 'int_per_90', 'blk_per_90'], // CB-Stopper
            ['tck_per_90', 'clr_per_90', 'int_per_90', 'blk_per_90', 'pr_passes_per_90'], // CB-BallPlaying
            ['tck_per_90', 'int_per_90', 'pres_c_per_90', 'op_crs_c_per_90', 'pr_passes_per_90'], // Fullback
            ['tck_per_90', 'int_per_90', 'pres_c_per_90', 'op_crs_c_per_90', 'drb_per_90'], // Wingback
            ['tck_per_90', 'int_per_90', 'blk_per_90', 'pres_c_per_90', 'pas_perc'], // MF-Destroyer
            ['op_kp_per_90', 'pr_passes_per_90', 'xa_per_90', 'drb_per_90', 'pas_perc'], // MF-Creator
            ['op_kp_per_90', 'xa_per_90', 'drb_per_90', 'pas_perc', 'sht_per_90'], // MF-Attacking
            ['drb_per_90', 'op_kp_per_90', 'sprints_per_90', 'op_kp_per_90', 'xa_per_90'], // Wing-Provider
            ['drb_per_90', 'sht_per_90', 'sprints_per_90', 'np_xg_per_90', 'conv_perc'], // Wing-Striker
            ['hdrs_w_per_90', 'xa_per_90', 'np_xg_per_90', 'sht_per_90', 'conv_perc'], // FW-Provider
            ['hdrs_w_per_90', 'drb_per_90', 'np_xg_per_90', 'sht_per_90', 'conv_perc'] // FW-Striker
        ];

        @for ($i = 0; $i < 12; $i++)
            var ctx{{ $i }} = document.getElementById('myChart{{ $i }}').getContext('2d');
            var myChart{{ $i }} = new Chart(ctx{{ $i }}, {
                type: 'radar',
                data: {
                    labels: chartAttributes[{{ $i }}],
                    datasets: [{
                        label: 'Player Stats',
                        data: [0, 0, 0, 0, 0],
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Dummy Data',
                        data: [1, 1, 1, 1, 1],
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            charts.push(myChart{{ $i }});
        @endfor

        function updateChartType(index) {
            var chartType = document.getElementById('chartType' + index).value;
            charts[index].config.type = chartType;
            charts[index].update();
        }

        function updatePlayerStats() {
            var playerSelect = document.getElementById('playerSelect');
            var selectedOption = playerSelect.options[playerSelect.selectedIndex];
            var playerStats = JSON.parse(selectedOption.getAttribute('data-stats'));

            charts.forEach((chart, index) => {
                chart.data.datasets[0].data = chart.data.labels.map(label => playerStats[label] || 0);
                chart.update();
            });
        }

        function updateDummyData() {
            var dummyDataType = document.getElementById('dummyDataSelect').value;
            fetch('/getDummyData')
                .then(response => response.json())
                .then(data => {
                    var dummyData = data[dummyDataType];
                    charts.forEach((chart, index) => {
                        chart.data.datasets[1].data = chart.data.labels.map((_, i) => dummyData[index][i] || 0);
                        chart.update();
                    });
                });
        }

        function syncData() {
            updatePlayerStats();
            updateDummyData();
        }

        document.addEventListener('DOMContentLoaded', function() {
            syncData();
        });
    </script>
</body>
</html>