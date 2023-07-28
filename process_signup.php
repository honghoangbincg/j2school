<?php
session_start();
$email = $_POST['email'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$password = $_POST['password'];
if (empty($email) || empty($name) || empty($password)) {
    header('Location:signup.php?error=sign up fail');
    exit;
}
require_once 'connect.php';

$sql = "SELECT COUNT(*) FROM customers WHERE email = '$email'";
$result = mysqli_query($connect, $sql);
$count = mysqli_fetch_array($result)["COUNT(*)"];

if ($count == 1) {
    $_SESSION['error'] = 'email is exist';
    header('Location:signup.php');
    exit;
}
$sql_insert = "INSERT INTO customers(name, email, password, phone_number, address) VALUES('$name', '$email', '$password', '$phone', '$address')";
mysqli_query($connect, $sql_insert);
$sql_session = "SELECT id FROM customers WHERE email = '$email'";
$result_session = mysqli_query($connect, $sql_session);
$id = mysqli_fetch_array($result_session)['id'];
$_SESSION['id'] = $id;
$_SESSION['name'] = $name;
mysqli_close($connect);
header('Location:signin.php');