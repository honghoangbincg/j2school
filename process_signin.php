<?php 
session_start();
require_once 'connect.php';
$email = $_POST['email'];
$password = $_POST['password'];
if(isset($_POST['remember'])) {
    $remember = true;
}else {
    $remember = false;
}
$sql = "SELECT * FROM customers WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($connect, $sql);
$count = mysqli_num_rows($result);
if($count == 1) {
    $each = mysqli_fetch_array($result);
    $_SESSION['id'] = $each['id'];
    $_SESSION['name'] = $each['name'];
    if($remember) {
        setcookie('remember', $each['id'], time() + 60 * 60 * 24 * 30);
    }
    header("Location:user.php");
    exit;
}
header("Location:signin.php?error=sign in fail");