<?php 
if(empty($_GET['id'])) {
    header('Location:index.php?error=Require id');
    exit;
}
$id= $_GET['id'];
include '../connect.php';
$sql = "DELETE FROM products 
WHERE id='$id'";
try {
	mysqli_query($connect, $sql);
    mysqli_close($connect);
    header('Location:index.php?sucess=Delete Sucessful');
} catch (mysqli_sql_exception $e) {
    header("location:index.php?id=$id&error=Query failed");
}
