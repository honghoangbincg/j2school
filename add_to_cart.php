<?php
session_start();
// unset($_SESSION['cart']);
$id = $_GET['id'];

if(empty($_SESSION['cart'][$id])) {
    require_once 'connect.php';
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);
    $_SESSION['cart'][$id]['name'] = $each['name'];
    $_SESSION['cart'][$id]['price'] = $each['price'];
    $_SESSION['cart'][$id]['image'] = $each['image'];
    $_SESSION['cart'][$id]['description'] = $each['description'];
    $_SESSION['cart'][$id]['quantity'] = 1;
}else {
    $_SESSION['cart'][$id]['quantity']++;
}
header("location:view_cart.php");