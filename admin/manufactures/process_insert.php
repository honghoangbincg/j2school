<?php 
if (empty($_POST['name']) || empty($_POST['address']) || empty($_POST['phone'])|| empty($_POST['image'])){
    header('Location:form_insert.php?error=Require fill out fully fields');
    exit();
}
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$image = $_POST['image'];
include '../connect.php';
$sql = "INSERT INTO manufactures(name, address, phone, image) 
VALUES('$name', '$address', '$phone', '$image')";
mysqli_query($connect, $sql);
mysqli_close($connect);
header('Location:index.php?sucess=Add Sucessful');