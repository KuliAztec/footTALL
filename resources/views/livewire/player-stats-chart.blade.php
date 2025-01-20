<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Stats Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @livewireStyles
</head>
<body>
    <div style="width: 75%; margin: auto;">
        <canvas id="playerStatsChart"></canvas>
        <pre>{{ json_encode($chartData, JSON_PRETTY_PRINT) }}</pre> <!-- Debugging output -->
    </div>

    @livewireScripts
    <script>
        document.addEventListener('livewire:load', () => {
            const ctx = document.getElementById('playerStatsChart')?.getContext('2d');
            if (!ctx) {
                console.error('Canvas element not found!');
                return;
            }

            // Pass chartData from PHP to JavaScript
            const chartData = @json($chartData);

            console.log('Chart Data:', chartData);

            if (chartData && chartData.labels && chartData.datasets) {
                new Chart(ctx, {
                    type: 'bar',
                    data: chartData,
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            tooltip: {
                                mode: 'index',
                            },
                        },
                    },
                });
            } else {
                console.error('Invalid chart data:', chartData);
            }
        });
    </script>
</body>
</html>