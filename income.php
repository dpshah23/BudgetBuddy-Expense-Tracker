<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Income Dashboard | Budget Buddy</title>
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
        include 'dbconfig.php';
        session_start(); 
        if(isset($_SESSION["login"])){
            $name = $_SESSION['name'];
    
        } 
        else{
            header('Location: login.php');
            exit();
        }
        include 'navbar.php';
        $email=$_SESSION['email'];
        $sqlq="SELECT amount FROM `income` WHERE `email` LIKE '$email'";
        $exec=mysqli_query($conn,$sqlq);
        $income=0;
    
        $rows=mysqli_fetch_all($exec,MYSQLI_ASSOC);
        foreach ($rows as $i => $row)
        {
                $income+=$row['amount'];
        }


    ?>
    <h4>Total Income : <?php echo $income; ?></h4>
    <a href="add_income.php">Add Income</a>
    <form action="" method="get">
        <select name="category" >
            <option value="Stocks">Stocks</option>
            <option value="salaries">Salary</option>
            <option value="rent">Rent</option>
            <option value="assets">Sell Asset</option>
            <option value="other">Other</option>
    </select>
        <button type="submit" class="btn btn-success">Search</button>
    </form>
    <?php

        if(isset($_GET['category'])){
            $value=$_GET['category'];
            $email=$_SESSION['email'];

            $sqlquery="SELECT * FROM `income` WHERE `category` LIKE '$value' AND `email` LIKE '$email'";
            $exec1=mysqli_query($conn,$sqlquery);
            $rows=mysqli_fetch_all($exec1,MYSQLI_ASSOC);
            
        }
        else {
            $sqlquery="SELECT * FROM `income` WHERE `email` LIKE '$email'";
            $exec1=mysqli_query($conn,$sqlquery);
            $rows=mysqli_fetch_all($exec1,MYSQLI_ASSOC);
        }
        echo "<div class=\"container\">
        <table class=\"table\">

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
</table>
</div>";

?>

</body>
</html>