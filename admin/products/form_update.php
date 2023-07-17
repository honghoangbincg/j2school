<?php include '../header.php' ?>
<style>
  option[disabled] {
    display: none;
  }
</style>
<div class="mt-3">
  <?php
  if (empty($_GET['id'])) {
    header('Location:index.php?error=Require id of article');
    exit;
  }
  if (isset($_GET['error'])) {
    echo "<div class='alert alert-danger fs-4 text-danger' role='alert'>" . $_GET['error'] . "</div>";
  }
  require "../../connect.php";
  $id = $_GET['id'];
  $sql = "SELECT * FROM products WHERE id = '$id'";
  $resultArr = mysqli_query($connect, $sql);
  $number_rows = mysqli_num_rows($resultArr);
  $sqlManufactures = "SELECT * FROM manufactures";
  $manufactures = mysqli_query($connect, $sqlManufactures);
  if ($number_rows === 1) {
    $result = mysqli_fetch_array($resultArr);
  ?>
    <form class="mt-4" method="post" action="process_update.php" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $id ?>">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $result['name']; ?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Old Image</label>
        <br>
        <img width="150" src=".<?php echo $result['image']; ?>" alt="" title="" loading="lazy">
        <input type="hidden" class="form-control" name="image_old" value="<?php echo $result['image']; ?>">
        <br>
        <label for="image" class="form-label mt-2">Change new image</label>
        <input type="file" class="form-control" id="image" name="image_new">
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" id="price" name="price" value="<?php echo $result['price']; ?>">
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" placeholder="description" name="description" rows="2" id="description"><?php echo $result['description']; ?></textarea>
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Manufacturer</label>
        <select class="form-select" aria-label="Default select example" name="manufacture_id">
          <?php foreach ($manufactures as $manufacture) : ?>
            <option value="<?php echo $manufacture['id'] ?>" <?php echo ($manufacture['id'] == $result['manufacture_id']) ? 'selected' : '' ?>><?php echo $manufacture['name'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  <?php } else { ?>
    <h1>Cannot find product id</h1>
  <?php } ?>
</div>
<?php
mysqli_close($connect);
include '../footer.php' ?>