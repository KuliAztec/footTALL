<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart.js with Laravel</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div style="width: 80%; margin: 0 auto;">
        <a href="/">Back to Welcome</a>
        <div class="dropdown">
            <div class="dropdown-content">
            <form id="positionForm" method="POST" action="/chart">
                @csrf
                <input type="hidden" name="position" id="positionInput">
                <button type="button" class="dropbtn" onclick="submitForm('Forward')">Forward</button>
                <button type="button" class="dropbtn" onclick="submitForm('Midfielder')">Midfielder</button>
                <button type="button" class="dropbtn" onclick="submitForm('Defender')">Defender</button>
            </form>
            </div>
        </div>

        <style>
            .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            }

            .dropdown-content {
            display: block; /* Ensure the dropdown content is visible */
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            }

            .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            }

            .dropdown-content a:hover {
            background-color: #f1f1f1;
            }

            .dropdown:hover .dropdown-content {
            display: block;
            }

            .dropdown:hover .dropbtn {
            background-color: #3e8e41;
            }
        </style>
        <canvas id="myChart" style="width: 400px; height: 400px;"></canvas> <!-- Set width and height using style -->
    </div>

    <script>
        function submitForm(position) {
            document.getElementById('positionInput').value = position;
            document.getElementById('positionForm').submit();
        }

        var ctx = document.getElementById('myChart').getContext('2d');
        
        var myChart = new Chart(ctx, {
            type: 'radar', // Change chart type to 'radar'
            data: {
                labels: {!! json_encode($labels) !!}, // Pass the labels from the controller
                datasets: {!! json_encode($datasets) !!} // Pass the datasets from the controller
            },
            options: {
                responsive: false, // Disable responsiveness
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.raw + ' units';
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
