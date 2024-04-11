<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Expense Tracker</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="./static/Income_Dashboard.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
  
<?php
error_reporting(0);
session_start(); 
if(isset($_SESSION["login"])){
    $name = $_SESSION['name'];
    
} 
else{
    header('Location: login.php');
    exit();
    
}

include 'navbar.php';

include 'dbconfig.php';


?>
<div class="chart-container">
  <canvas id="pieChart" width="300" height="300"></canvas>
  <button name="add_expense" ><a href="add_expense.php">Add Expense </a></button>
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

