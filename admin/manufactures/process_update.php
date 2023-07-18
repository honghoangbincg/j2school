<?php
if (empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['address'])) {
    header('Location:form_update.php?error=Require fill out fully fields');
    exit;
}
$id = $_POST['id'];
$name = addslashes($_POST['name']);
$new_image = $_FILES['new_image'];
$old_image = $_POST['old_image'];
$phone = $_POST['phone'];
$address = addslashes($_POST['address']);
$folder = 'images/';
if($new_image["size"] > 0) {
    $file_name = explode('.', $new_image['name'])[0];
    $file_extension = $folder . time() .'.' . strtolower(explode('.', $new_image['name'])[1]);
    $pathFile = '../../' . $file_extension;
    move_uploaded_file($new_image["tmp_name"], $pathFile);
}else {
    $file_extension = $old_image;
}
include '../../connect.php';
$sql = "UPDATE manufactures 
SET 
name = '$name', 
image = '$file_extension', 
phone = '$phone', 
address = '$address'
WHERE id = '$id'";
mysqli_query($connect, $sql);
mysqli_close($connect);
header('Location:index.php?sucess=Add Sucessful');
