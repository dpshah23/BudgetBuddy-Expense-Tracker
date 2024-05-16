<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Budget Buddy</title>
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
  <button class="add_exp" name="add_expense"><a href="add_expense.php">Add Expense </a></button>
 
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

        <?php
            session_start();
            $email=$_SESSION['email'];
            $food=0;
            $clothing=0;
            $medical=0;
            $transport=0;
            $loanintrest=0;
            $rent=0;
            $subscription=0;
            $invested=0;
            $otherexpense=0;

            include 'dbconfig.php';

            $sqlfood="SELECT * FROM `expenses` WHERE `email` = '$email' AND `category` = 'Food';";
            $sqlcloth="SELECT * FROM `expenses` WHERE `email` = '$email' AND `category` = 'Clothing';";
            $sqlmedical="SELECT * FROM `expenses` WHERE `email` = '$email' AND `category` = 'Medical';";
            $sqltransport="SELECT * FROM `expenses` WHERE `email` = '$email' AND `category` = 'Transportation';";
            $sqlloan="SELECT * FROM `expenses` WHERE `email` = '$email' AND `category` = 'Loan Intrest';";
            $sqlrent="SELECT * FROM `expenses` WHERE `email` = '$email' AND `category` = 'Rent';";
            $sqlsubscription="SELECT * FROM `expenses` WHERE `email` = '$email' AND `category` = 'Social Media Susbscription';";
            $sqlinvested="SELECT * FROM `expenses` WHERE `email` = '$email' AND `category` = 'Invested Amount';";
            $sqlother="SELECT * FROM `expenses` WHERE `email` = '$email' AND `category` = 'other';";
            
            $execfood=mysqli_query($conn,$sqlfood);
            $rows=mysqli_fetch_all($execfood,MYSQLI_ASSOC);
            foreach ($rows as $i => $row)
            {
                $food+=$row['amount'];
            }

            
            $execcloth=mysqli_query($conn,$sqlcloth);
            $rows=mysqli_fetch_all($execcloth,MYSQLI_ASSOC);
            foreach ($rows as $i => $row)
            {
                $clothing+=$row['amount'];
            }

            $execmedical=mysqli_query($conn,$sqlmedical);
            $rows=mysqli_fetch_all($execmedical,MYSQLI_ASSOC);
            foreach ($rows as $i => $row)
            {
                $medical+=$row['amount'];
            }

            $exectransport=mysqli_query($conn,$sqltransport);
            $rows=mysqli_fetch_all($exectransport,MYSQLI_ASSOC);
            foreach ($rows as $i => $row)
            {
                $transport+=$row['amount'];
            }

            $execloan=mysqli_query($conn,$sqlloan);
            $rows=mysqli_fetch_all($execloan,MYSQLI_ASSOC);
            foreach ($rows as $i => $row)
            {
                $loanintrest+=$row['amount'];
            }

            $execrent=mysqli_query($conn,$sqlrent);
            $rows=mysqli_fetch_all($execrent,MYSQLI_ASSOC);
            foreach ($rows as $i => $row)
            {
                $rent+=$row['amount'];
            }

            $execsub=mysqli_query($conn,$sqlsubscription);
            $rows=mysqli_fetch_all($execsub,MYSQLI_ASSOC);
            foreach ($rows as $i => $row)
            {
                $subscription+=$row['amount'];
            }

            $execinvested=mysqli_query($conn,$sqlinvested);
            $rows=mysqli_fetch_all($execinvested,MYSQLI_ASSOC);
            foreach ($rows as $i => $row)
            {
                $invested+=$row['amount'];
            }

            $execother=mysqli_query($conn,$sqlother);
            $rows=mysqli_fetch_all($execother,MYSQLI_ASSOC);
            foreach ($rows as $i => $row)
            {
                $otherexpense+=$row['amount'];
            }

            $expense_arr = array("$food,$clothing,$medical,$transport,$loanintrest,$rent,$subscription,$invested,$otherexpense");


        ?>
        let food=<?php  echo $food ?>;
        let clothing=<?php  echo $clothing ?>;
        let medical=<?php  echo $medical ?>;
        let transport=<?php  echo $transport ?>;
        let loan=<?php  echo $loanintrest ?>;
        let rent=<?php  echo $rent ?>;
        let subscription=<?php  echo $subscription ?>;
        let invested=<?php  echo $invested ?>;
        let other=<?php  echo $otherexpense ?>;

        console.log(food);

    console.log([<?php echo "$food,$clothing,$medical,$transport,$loanintrest,$rent,$subscription,$invested,$otherexpense"?>]);

    updateChartData([food,clothing,medical,transport,loan,rent,subscription,invested,other]);

    </script>

    <?php
        include 'dbconfig.php';
        session_start();
        $email=$_SESSION['email'];
        $sqlq="SELECT amount FROM `expenses` WHERE `email` LIKE '$email';";
        $executedueryexpense=mysqli_query($conn,$sqlq);
        $rows=mysqli_fetch_all($executedueryexpense, MYSQLI_ASSOC);
        $expenseamount=0;
        foreach ($rows as $i => $row)
        {
            $expenseamount+=$row['amount'];
        }

        $sql="SELECT amount FROM `income` WHERE `email` LIKE '$email';";
        $executeduerysalary=mysqli_Query($conn,$sql);
        $rows=mysqli_fetch_all($executeduerysalary,MYSQLI_ASSOC);
        $salaryamount=0;
        foreach ($rows as $i => $row)
        {
            $salaryamount+=$row['amount'];
        }

        $value=$salaryamount-$expenseamount;
    ?>
<div class="balance">
    <h1>Remaining Balance: </h1>
    <div class="container">
    <?php  echo "₹".$value; ?>
    </div>
  </div>
<?php

session_start();
include 'dbconfig.php';

$email=$_SESSION['email'];
$sqlq="SELECT * FROM `expenses` WHERE `email` = '$email';";

$exec=mysqli_query($conn,$sqlq);

$rows=mysqli_fetch_all($exec, MYSQLI_ASSOC);


echo "
<table>
    <thead>

<thead>
<tr>
      <th scope=\"col\">#</th>
      <th scope=\"col\">Expense Name</th>
      <th scope=\"col\">Description</th>
      <th scope=\"col\">Category</th>
      <th scope=\"col\">Amount</th>
      <th scope=\"col\">Time</th>     
</tr>
</thead>
<tbody>";
foreach ($rows as $i => $row) {
    echo "<tr>
    <th scope=\"row\">" . ($i + 1) . "</th>
    <td>" . $row['name'] . "</td>
    <td>" . $row['description'] . "</td>
    <td>" . $row['category'] . "</td>
    <td>" . $row['amount'] . "</td>
    <td>" . $row['time'] . "</td>
    </tr>";
}
echo "</tbody>
</table>";


?>

</body>
</html>
