<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Expense Tracker</title>
</head>
<body>
    <form action='logout.php'>
        <button type="submit">Logout</button>
</form>
</body>
</html>

<?php
include 'dbconfig.php';
session_start();
if(isset($_SESSION["login"])){
    
    echo "hello world";
}
else{
    header('Location: login.php');
    exit();
    echo "hello";
}
?>