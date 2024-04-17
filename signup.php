<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Budget Buddy</title>
    <link rel="stylesheet" href="./static/signup.css"> 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
        <div class="log-in form">
            <header class="heading">Sign-Up</header>
            <form action="" method="post">
                <input class="name" type="name" type="text" name="nm" placeholder="Enter your Name" required style="border:white;"/>
                <input class="email" type="email" name="email" placeholder="Enter Email" required style="border:white;"/>
                <input class="email" type="number" name="number" placeholder="Enter Mobile Number" required style="border:white;"/>
                <input class="password" type="password" id="password1" name="passwd" placeholder="Enter Password" required style="border:white;" />
                <input class="password" type="password" id="password2" placeholder="Confirm Password" required style="border:white;"/>
               
                <button type="submit" class="sign-up" style="border:white;" >Sign Up</button>
                <span class="do-this">Already have an Account?
                    <a class="sign" href="login.php">Log-In</a>
                </span>
            </form>
            </div>
        </div>
    </div>
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