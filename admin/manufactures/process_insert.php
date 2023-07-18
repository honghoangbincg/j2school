<?php
if (empty($_POST['name']) || empty($_POST['address']) || empty($_POST['phone'])) {
    header('Location:form_insert.php?error=Require fill out fully fields');
    exit();
}
$name = addslashes($_POST['name']);
$address = addslashes($_POST['address']);
$phone = addslashes($_POST['phone']);
$image = $_FILES['image'];
$file_name = 'images/'. time() . '.' . explode('.', $image['name'])[1];
$path_file = '../../' . $file_name;
move_uploaded_file($image["tmp_name"], $path_file);
require "../../connect.php";
$sql = "INSERT INTO manufactures(name, address, phone, image) 
VALUES('$name', '$address', '$phone', '$file_name')";
mysqli_query($connect, $sql);
mysqli_close($connect);
header('Location:index.php?sucess=Add Sucessful');
