<?php
if (empty($_POST['id'])) {
  header('Location:index.php?error=Require id of article');
  exit;
}
if (empty($_POST['name']) || empty($_POST['price']) || empty($_POST['manufacture_id'])) {
  header('Location:form_insert.php?error=Require fill out fully fields');
  exit;
}
$id = $_POST['id'];
$name = $_POST['name'];
$image_new = $_FILES['image_new'];
$image_old = $_POST['image_old'];
$price = $_POST['price'];
$description = $_POST['description'];
$manufacture_id = $_POST['manufacture_id'];
if ($image_new['size'] > 0) {
  $folder = "images/";
  $file_name = explode('.', $image_new['name'])[0];
  $file_extension = $folder . time() . '.' . strtolower(explode('.', $image_new['name'])[1]);
  $pathFile = '../../' . $file_extension;
  move_uploaded_file($_FILES["image_new"]["tmp_name"], $pathFile);
} else {
  $file_extension = $image_old;
}

include '../../connect.php';
$sql = "UPDATE products
SET name ='$name', image = '$file_extension',  price = '$price', description = '$description', manufacture_id ='$manufacture_id'
WHERE id = '$id'";
mysqli_query($connect, $sql);
mysqli_close($connect);
header('Location:index.php?sucess=Add Sucessful');
