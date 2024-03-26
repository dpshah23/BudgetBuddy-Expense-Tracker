<?php
if(!$_SESSION['email']){
    header("location:login.php");
    echo "hello world";
}
?>