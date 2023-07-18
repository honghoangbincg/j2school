<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
}else {
    header('Location:index.php?error=Not found id');
    exit;
}
require_once './connect.php';
$sql = "SELECT * FROM products WHERE id = '$id'";
$result = mysqli_fetch_array(mysqli_query($connect, $sql));
mysqli_close($connect);
?>
<div class="container" style="min-height:700px">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto text-center mt-3">
            <h1><?php echo $result['name'] ?></h1>
            <img height="200" src="<?php echo $result['image'] ?>">
            <p><?php echo $result['description'] ?></p>
        </div>
    </div>
</div>