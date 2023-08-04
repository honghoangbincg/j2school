<?php
session_start();
require_once '../connect.php';
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) == 1) {
    $each = mysqli_fetch_array($result);
    $_SESSION['id'] = $each['id'];
    $_SESSION['name'] = $each['name'];
    $_SESSION['level'] = $each['level'];
    header('location:root/index.php');
    exit;
}
header('location:index.php?error=sign in fail');