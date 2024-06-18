<?php

$username = "id22138702_root"; 
$db_password = "ExpenseTracker@1232"; 
$servername = "localhost";
$database = "id22138702_budgetbuddy";

$conn = new mysqli($servername, $username, $db_password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>