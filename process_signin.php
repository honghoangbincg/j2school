<?php 
require_once 'connect.php';
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "SELECT * FROM customers WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($connect, $sql);
$count = mysqli_num_rows($result);
if($count == 1) {
    session_start();
    $each = mysqli_fetch_array($result);
    $_SESSION['id'] = $each['id'];
    $_SESSION['name'] = $each['name'];
    header("Location:user.php");
    exit;
}
header("Location:signin.php?error=sign in fail");