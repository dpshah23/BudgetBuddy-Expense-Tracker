<?php

if (isset($_SESSION["login"])) {
    header('location: home.php');
    exit();
}else {
    header('location: login.php');
    exit();
}
?>