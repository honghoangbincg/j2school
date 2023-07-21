<?php
session_start();
require_once 'connect.php';
$email = $_POST['email'];
$password = $_POST['password'];
if (isset($_POST['remember'])) {
    $remember = true;
} else {
    $remember = false;
}
$sql = "SELECT * FROM customers WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($connect, $sql);
$count = mysqli_num_rows($result);
if ($count == 1) {
    $each = mysqli_fetch_array($result);
    $id = $each['id'];
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $each['name'];

    if ($remember) {
        $token = uniqid('user_', true);
        $sql = "UPDATE customers SET token ='$token' WHERE id = '$id'";
        mysqli_query($connect, $sql);
        setcookie('remember', $token, time() + 60 * 60 * 24 * 30);
    }
    header("Location:user.php");
    exit;
}
$_SESSION['error'] = 'sign in fail';
header("Location:signin.php");
