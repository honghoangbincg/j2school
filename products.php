<?php
require_once './connect.php';
$sql = "SELECT * FROM products";
$result = mysqli_query($connect, $sql);
mysqli_close($connect);
?>
<div class="container">
  <div class="row">
    <?php foreach ($result as $item) { ?>
      <div class="col-lg-4 col-6 my-3">
        <div class="card">
          <img src="<?php echo $item['image'] ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $item['name'] ?></h5>
            <p class="card-text"><?php echo $item['description'] ?></p>
          </div>
        </div>
      </div>
    <?php } ?>

  </div>
</div>