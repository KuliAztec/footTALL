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
        <h1>Simple Chart</h1>
        <a href="/">Go to Home</a>
        <br>
        <label for="playerSelect">Player:</label>
        <select id="playerSelect">
            @foreach($players as $player)
                <option value="{{ $player->id }}">{{ $player->name }}</option>
            @endforeach
        </select>
        <button onclick="updatePlayerStats()">Update Player Stats</button>
        <br>
        @for ($i = 0; $i < 10; $i++)
            <div class="chart-container">
                <h2>{{ $chartsData[$i]['datasets'][0]['label'] }}</h2>
                <label for="chartType{{ $i }}">Chart Type:</label>
                <select id="chartType{{ $i }}" onchange="updateChartType({{ $i }})">
                    <option value="radar">Radar</option>
                    <option value="bar">Bar</option>
                    <option value="line">Line</option>
                </select>
                <label for="chartCategory{{ $i }}">Category:</label>
                <select id="chartCategory{{ $i }}" onchange="updateChartCategory({{ $i }})">
                    <option value="poor">Poor</option>
                    <option value="ok">Ok</option>
                    <option value="good">Good</option>
                </select>
                <canvas id="myChart{{ $i }}"></canvas>
            </div>
        @endfor
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <script>
        var charts = [];
        @for ($i = 0; $i < 10; $i++)
            var ctx{{ $i }} = document.getElementById('myChart{{ $i }}').getContext('2d');
            var myChart{{ $i }} = new Chart(ctx{{ $i }}, {
                type: 'radar',
                data: @json($chartsData[$i]),
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

        function updateChartCategory(index) {
            var chartCategory = document.getElementById('chartCategory' + index).value;
            // Implement category-specific logic here
            console.log('Chart ' + index + ' category changed to ' + chartCategory);
        }

        function updatePlayerStats() {
            var playerId = document.getElementById('playerSelect').value;
            fetch(`/getPlayerStats/${playerId}`)
                .then(response => response.json())
                .then(data => {
                    // Update charts with player stats
                    charts.forEach((chart, index) => {
                        chart.data.datasets = chart.data.datasets.filter(dataset => dataset.label !== 'Player Stats');
                        chart.data.datasets.push({
                            label: 'Player Stats',
                            data: Object.values(data).slice(1, chart.data.labels.length + 1), // Assuming the stats are in the same order as labels
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        });
                        chart.update();
                    });
                });
        }
    </script>
</body>
</html>