<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Expense Tracker</title>
    <link rel="stylesheet" href="{{ url_for('static', filename = 'signup.css') }}"> 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <form action="" method="post">
    <h1>Name : </h1>
    <input type="text" name="nm" placeholder="Enter Your Name" require>
    <h1>Email ID : </h1>
    <input type="email" name="email"  placeholder="Enter Your Email" require>
    <h1>Mobile Number : </h1>
    <input type="number" name="mobile" placeholder="Enter Your Mobile Number" require>
    <h1>Password : </h1>
    <input type="password" name="passwd" id="password1" placeholder="Enter Your Password" require>
    <h1>Confirm Password : </h1>
    <input type="password" name="passwd_confirm" id="password2" placeholder="Enter Your Password" require>
    <p id="message"></p>
    <br>
    <button type="submit">Submit</button>
</form>

</div>
<script>
        const password1 = document.getElementById('password1');
        const password2 = document.getElementById('password2');
        const message = document.getElementById('message');

        
        function checkPasswordMatch() {
            if (password1.value === password2.value) {
                message.textContent = 'Passwords match';
                message.style.color = 'green';
            } else {
                message.textContent = 'Passwords do not match';
                message.style.color = 'red';
            }
        }

      
        password1.addEventListener('input', checkPasswordMatch);
        password2.addEventListener('input', checkPasswordMatch);
    </script>
</body>
</html>
<?php

if($_SERVER['REQUEST_METHOD']=="POST")
{
    include 'dbconfig.php';
    $name=$_POST['nm'];
    $email=$_POST['email'];
    $password_user=$_POST['passwd'];
    $mobile=$_POST['mobile'];
    try {
    $sql=mysqli_query($conn,"INSERT INTO `users` (`email`, `password`, `name`, `mobile`) VALUES ('$email', '$password_user', '$name', '$email')");
    echo "<script>alert(\"User Created Successfully....\")</script>";
    header('Location: login.php');
    exit();
    }
    catch (\Throwable $th) {
        echo "<script>alert(\"Unable To Create New User....\")</script>";
    }
    
    
}


?>