<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact US | Expense Tracker</title>
    <link rel="stylesheet" href="static/contact-us.css">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
</head>
<body>
<center><div class="container">
        <h2>Team members</h2>
        <div class="employee-grid">
            <div class="employee-card">
                <h3>Deep Shah</h3>
                <p>Enrollment number : 226170307181</p>
                <p>Phone: +91 63529 72571</p>
                <p>Email: dpshah2307@gmail.com</p>
            </div>
            <div class="employee-card">
                <h3>Mishty Vadera</h3>
                <p>Enrollment number : 226170307218</p>
                <p>Phone: +91 81419 08045</p>
                <p>Email: vaderamishty@gmail.com</p>
            </div>
            <div class="employee-card">
                <h3>Vedant Tuvar</h3>
                <p>Enrollment number : 226170307217</p>
                <p>Phone: +91 93136 02304</p>
                <p>Email: vedanttuvar27@gmail.com</p>
            </div>
            
        </div>
    </div>
<div class="container-form">
    <div class="employee-card">
    <h1 class="text-center">Contact Us</h1>
  


    <form method="post" action="">

    <div class="mb-3">
        <label for="mail" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name">
  </div>
    <div class="mb-3">
        <label for="phoneno" class="form-label">Phone No.</label>
        <input type="number" class="form-control" id="phoneno" placeholder="Enter Your Phone Number" name="phone">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Subject</label>
        <textarea class="form-control" id="subject" rows="1" name="subject"></textarea>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
    </div>
    <button type="submit" class="btn" style="background-color:white;">Submit</button>
    </form>
    </div></center>

<?php
if($_SERVER['REQUEST_METHOD']=="POST")
{
    include 'dbconfig.php';
    $email=$_POST['email'];
    $name=$_POST['name'];
    $mobile=$_POST['phone'];
    $subject=$_POST['subject'];
    $description=$_POST['description'];

    $sqlq="INSERT INTO `contact` (`email`, `name`, `mobile`, `subject`, `description`) VALUES ('$email', '$name', '$mobile', '$subject', '$description');";

    $execquery=mysqli_query($conn,$sqlq);

    if($execquery){
        echo "
        <script>
        alert(\"Your Message Has Been Sent To Admin\")
        </script>
        ";
    }
    else{
        echo "
        <script>
        alert(\"Error While Sending To Admin\")
        </script>
        ";
    }
}
?>
</body>
</html>