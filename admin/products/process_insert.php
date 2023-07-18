<?php
if (empty($_POST['name']) || empty($_POST['price']) || empty($_POST['manufacture_id'])) {
    header('Location:form_insert.php?error=Require fill out fully fields');
    exit;
}
$name = $_POST['name'];
$image = $_FILES['image'];
$price = $_POST['price'];
$description = $_POST['description'];
$manufacture_id = $_POST['manufacture_id'];
$folder = "images/";
$file_name = explode('.', $image['name'])[0];
$file_extension = $folder . time() . '.' . strtolower(explode('.', $image['name'])[1]);
$pathFile = '../../' . $file_extension;
move_uploaded_file($image["tmp_name"], $pathFile);
include '../../connect.php';
$sql = "INSERT INTO products(name, image, price, description, manufacture_id) 
VALUES('$name', '$file_extension', '$price', '$description', '$manufacture_id')";
mysqli_query($connect, $sql);
mysqli_close($connect);
header('Location:index.php?sucess=Add Sucessful');
