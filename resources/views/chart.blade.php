<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .chart-container {
            position: relative;
            width: 100%;
            height: 500px;
            margin: 30px auto;
            padding: 25px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .container {
            text-align: center;
            padding-bottom: 50px;
        }
        .form-group {
            margin: 20px 0;
        }
        .row {
            clear: both;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="my-4">Player Comparison Charts</h1>
        <a href="/" class="btn btn-primary mb-4">Go to Home</a>
        <div class="form-group">
            <label for="playerSelect">Player:</label>
            <select id="playerSelect" class="form-control w-50 mx-auto" onchange="updatePlayerStats()">
                @foreach($players as $player)
                    <option value="{{ $player->id }}" data-stats='@json($player->stats)'>{{ $player->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="dummyDataSelect">Dummy Data Type:</label>
            <select id="dummyDataSelect" class="form-control w-50 mx-auto" onchange="updateDummyData()">
                <option value="good">Good</option>
                <option value="ok">Ok</option>
                <option value="poor">Poor</option>
            </select>
        </div>
        <button class="btn btn-success mb-4" onclick="syncData()">Sync Data</button>
        <div class="container">
            @for ($i = 0; $i < 12; $i++)
                @if ($i % 2 == 0)
                    <div class="row justify-content-center">
                @endif
                <div class="col-lg-5 col-md-6 chart-container mx-4">
                    <h2>Chart {{ $i + 1 }}: {{ ['Goalkeeper', 'CB-Stopper', 'CB-BallPlaying', 'Fullback', 'Wingback', 'MF-Destroyer', 'MF-Creator', 'MF-Attacking', 'Wing-Provider', 'Wing-Striker', 'FW-Provider', 'FW-Striker'][$i] }}</h2>
                    <div class="form-group">
                        <label for="chartType{{ $i }}">Chart Type:</label>
                        <select id="chartType{{ $i }}" class="form-control" onchange="updateChartType({{ $i }})">
                            @foreach($chartTypes as $type)
                                <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <canvas id="myChart{{ $i }}"></canvas>
                </div>
                @if ($i % 2 == 1 || $i == 11)
                    </div>
                @endif
            @endfor
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        var charts = [];
        var chartAttributes = @json($chartAttributes);

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
                    responsive: true,
                    maintainAspectRatio: false,
                    layout: {
                        padding: 20
                    },
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                padding: 10
                            }
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