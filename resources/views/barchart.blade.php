<!DOCTYPE html>
<html>
<head>
    <title>Bar Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div style="width: 75%;">        
        <dropdown>
            <select id="player1">
                @foreach($players as $player)
                    <option value="{{ $player->id }}">{{ $player->name }}</option>
                @endforeach
            </select>
            <select id="player2">
                @foreach($players as $player)
                    <option value="{{ $player->id }}">{{ $player->name }}</option>
                @endforeach
            </select>
            <button onclick="changePlayers()">Change Players</button>
        </dropdown>
        <canvas id="myBarChart"></canvas>
        <a href="/">Go Back</a>
    </div>

    <script>
        var ctx = document.getElementById('myBarChart').getContext('2d');
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {!! json_encode($data) !!},
            options: {
                scales: {
                    y: {
                        type: 'logarithmic',
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Value'
                        }
                    }
                }
            }
        });

        function changePlayers() {
            var player1Id = document.getElementById('player1').value;
            var player2Id = document.getElementById('player2').value;

            fetch(`/barchart/data?player1=${player1Id}&player2=${player2Id}`)
                .then(response => response.json())
                .then(data => {
                    myBarChart.data = data;
                    myBarChart.update();
                });
        }
    </script>
</body>
</html>