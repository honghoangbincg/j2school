<?php
if (empty($_POST['name']) || empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['image'])) {
    header('Location:form_insert.php?error=Require fill out fully fields');
    exit();
}
$name = addslashes($_POST['name']);
$address = addslashes($_POST['address']);
$phone = addslashes($_POST['phone']);
$image = $_POST['image'];
include '../../connect.php';
$sql = "INSERT INTO manufactures(name, address, phone, image) 
VALUES('$name', '$address', '$phone', '$image')";
mysqli_query($connect, $sql);
mysqli_close($connect);
header('Location:index.php?sucess=Add Sucessful');
