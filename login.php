<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Expense Tracker </title>
    <link rel="stylesheet" href="{{ url_for('static', filename = 'login.css') }}"> 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
    <form action="" method="post">
    <h1>Email : </h1>
    <input type="email" name="email" placeholder="Enter Your Email">
    <h1>Password : </h1>
    <input type="password" name="password"  placeholder="Enter Your Password">
    
    <br><br><br>
    <button type="submit">Submit</button>
</form>

</div>

<?php
session_start();
if (isset($_SESSION["login"])) {
    header('location: dashboard.php');
    exit();
}
if($_SERVER['REQUEST_METHOD'] == "POST") {
    include 'dbconfig.php';
    $email = $_POST['email'];
    $user_password = $_POST['password']; 

    
    // echo "Connected successfully";

    $sql = mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND password='$user_password'");
    $row = mysqli_fetch_array($sql);

    
    
    if ($row) {
        
        echo "Name: " . $row['name']; 
        $_SESSION['login'] = true;
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $email;
        $_SESSION['password']=$user_password;
        $_SESSION['mobile_no']=$row['mobile'];
        header('Location: dashboard.php');
        exit();
    } else {
        echo '<script>';
            echo 'alert("Invalid Details!");';
            echo '</script>';
    }

    $conn->close();
}
?>


</body>
</html>