<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Income Dashboard</title>
    <link rel="stylesheet" href="./static/Income_Dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <nav>
    <input type="checkbox" id="check" />
    <label for="check" class="checkbtn">
      <img class="menu" src="bars.svg" alt="Bars" />
    </label>
    <img class="icon" src="Budget_Buddy_Logo.png" alt="Logo">
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Contact Us</a></li>
      <li><a href="#">Income Dashboard</a></li>
      <li><a href="#">Hello,</a></li>
      <button class="dowload">Dowload
        <!-- <img class="dow-svg" src="Dowload.svg" alt="SVG"> -->
      </button>
    </ul>
  </nav>

  <div class="chart-container">
  <canvas id="pieChart" width="300" height="300"></canvas>
  </div>

    <script>
        var ctx = document.getElementById('pieChart').getContext('2d');

        var data = {
            labels: ["Food", "Clothing", "Medical",  "Transportation", "Loan Interest", "Rent", "Subscriptions", "Invested Amount", "Other Expenses"],
            datasets: [{
                data: [300, 50, 100],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(74, 148, 97)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(201, 123, 119)',
                    'rgb(242, 156, 80)',
                    'rgb(219, 206, 86)',
                    'rgb(73, 173, 148)',
                    'rgb(177, 134, 219)'
                ],
                hoverOffset: 4
            }]
        };

        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: data,
        });

        function updateChartData(newData) {
            myPieChart.data.datasets[0].data = newData;
            myPieChart.update();
        }

        updateChartData([200, 100, 150, 156, 223, 555, 444, 856, 166]);
    </script>
</body>
</html>