<?php 
session_start();
require_once 'connect.php';
$name_receiver    = $_POST['name_receiver'];
$phone_receiver   = $_POST['phone_receiver'];
$address_receiver = $_POST['address_receiver'];
$cart = $_SESSION['cart'];
$total_price = 0;
foreach ($cart as $each) 
{
    $total_price += $each['quantity'] * $each['price'];
}

$customer_id = $_SESSION['id'];
$status = 0; // moi dat

$sql = "INSERT INTO orders(customer_id, name_receiver, phone_receiver, address_receiver, status, total_price)
VALUES('$customer_id', '$name_receiver', '$phone_receiver', '$address_receiver', '$status', '$total_price')";
$sql = "SELECT max(id) FROM orders WHERE customer_id='$customer_id'";