<?php
if(!($_SESSION['email'])){
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Expense</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="./static/Income_Dashboard.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="./static/add_expense.css">
</head>



<body>
    <div class="parent">
    <h1>Add Expense</h1>
    <div class="child">
    <form method="POST" action="">
        <label for="name">Expense Name:</label>
        <input type="text" id="name" name="name" required><br>      
        
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea><br>
        
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" required><br>

        
        
        <label for="field">Filter by Field:</label>
        <select name="field" id="field">
            <option value="">All Fields</option>
            <option value="Food">Food</option>
            <option value="Clothing">Clothing</option>
            <option value="Medical">Medical</option>
            <option value="Transportation">Transportation</option>
            <option value="Loan Intreat">Loan Intreat</option>
            <option value="Rent">Rent</option>
            <option value="Social Media Susbscription">Social Media Susbscription</option>
            <option value="Invested Amount">Invested Amount</option>
            <option value="Other">Other</option>
        </select>
        <br>
        <div class="button">
            <input type="submit" value="Submit">
        </div>
        </div>
    </div>
    </form>
</body>
</html>



<?php
error_reporting(0);
if($_SERVER['REQUEST_METHOD']=='GET')
{ 
    $email=$_SESSION['email'];
    $name=$_GET['name'];
    $cat=$_GET['category'];
    $desc=$_GET['description'];
    $time=date('%D-%M-%Y');
    $amount-$_GET['amount'];

    include 'dbconfig.php';
    
    $sqlq="INSERT INTO `expenses` (`name`, `email`, `description`, `category`, `time`, `amount`) VALUES ('$name', '$email', '$desc', '$cat', '$time, '$amoubt');";

    $execquery=mysqli_query($conn,$sqlq);

    if($execquery){
        echo "<script>";
        echo "alert(\"Expense Added Successfully\");";
        echo "</script>";
        header('location: home.php');
        exit();
    }
    else{
        echo "<script>";
        echo "alert(\"Error Occured While Adding Data\");";
        echo "</script>";

    }
    
}
?>