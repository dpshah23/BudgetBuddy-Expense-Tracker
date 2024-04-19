<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Income | Budget Buddy</title>
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
session_start();
$name=$_SESSION['name'];
include 'navbar.php';
?>
    <h4>Add Income form</h4>
    <form action="" method="post">
        <label for="title">Title: </label>
        <input type="text" name="title">
        <br>
        <label for="">Description: </label>
        <textarea name="description" cols="15" rows="5"></textarea><br>
        <label for="Category">Category</label>
        <select name="category" >
            <option value="Stocks">Stocks</option>
            <option value="salaries">Salary</option>
            <option value="rent">Rent</option>
            <option value="assets">Sell Asset</option>
            <option value="other">Other</option>
    </select><br>
    <label for="amount">Amount: </label>
    <input type="text" name="amount"><br>   

    <button type="submit" class="btn btn-success">Add Income</button>
    </form>

<?php
if($_SERVER['REQUEST_METHOD']=="POST")
{
    $time=date('Y-m-d');
    $email=$_SESSION['email'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    $cat=$_POST['category'];
    $amount=$_POST['amount'];
    include 'dbconfig.php';
    $sqlquery="INSERT INTO `income` (`name`, `description`, `category`, `email`, `time`, `amount`) VALUES ('$title', '$description', '$cat', '$email', '$time', '$amount');";

    $executequery=mysqli_query($conn,$sqlquery);
    if($executequery)
    {
        echo "<script>";
        echo "alert(\"income Added Successfully\");";
        echo "window.location.href = 'income.php';";
        echo "</script>";
        exit();
    }
    else{
        echo "<script>";
        echo "alert(\"Error Occurred While Adding Data\");";
        echo "</script>";
    }
    
}
?>
</body>
</html>