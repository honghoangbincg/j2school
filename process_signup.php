<?php
$email = $_POST['email'];
$name = $_POST['name'];
$password = $_POST['password'];
if(empty($email) ||empty($name) || empty($password)) {
    header('Location:signup.php?error=sign up fail');
    exit;
}
require_once 'connect.php';
$sql = "SELECT COUNT(*) FROM customers WHERE email = '$email'";
$result = mysqli_query($connect, $sql);
$count = mysqli_fetch_array($result);
if($count["COUNT(*)"] == 1) {
    header('Location:signup.php?error=email is exist');
    exit;
}
$sql = "INSERT INTO customers(name, email, password) VALUES('$name', '$email', '$password')";
mysqli_query($connect, $sql);
mysqli_close($connect);