<?php
$username = $_POST['username'];
$password = $_POST['password'];

if ($username == "admin" && $password == "admin"){
    header("Location: admin_home.php");die();
}
else{
    header("Location: ");die();
}
?>