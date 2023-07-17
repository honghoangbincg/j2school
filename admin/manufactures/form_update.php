<?php include '../header.php' ?>
<?php include_once '../../connect.php' ?>
<div class="mt-3">
  <?php
  if (empty($_GET['id'])) {
    header('Location:index.php?error=Require id of article');
    exit;
  }
  if (isset($_GET['error'])) {
    echo "<div class='alert alert-danger fs-4 text-danger' role='alert'>" . $_GET['error'] . "</div>";
  }

  $id = $_GET['id'];
  $sql = "SELECT * FROM manufactures WHERE id = '$id'";
  $resultArr = mysqli_query($connect, $sql);
  $number_rows = mysqli_num_rows($resultArr);
  if ($number_rows === 1) {
    $result = mysqli_fetch_array($resultArr);
  ?>
    <form class="mt-4" method="post" action="process_update.php">
      <input type="hidden" name="id" value="<?php echo $result['id']; ?>" />
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="name" value="<?php echo $result['name']; ?>" />
      </div>

      <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="phone" value="<?php echo $result['phone']; ?>">
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="text" class="form-control" id="image" name="image" placeholder="image" value="<?php echo $result['image']; ?>">
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea class="form-control" placeholder="address" name="address" rows="2">
    <?php echo $result['address']; ?>
    </textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  <?php } else { ?>
    <h1>Cannot find id</h1>
  <?php } ?>
</div>
<?php
mysqli_close($connect);
include '../footer.php' ?>