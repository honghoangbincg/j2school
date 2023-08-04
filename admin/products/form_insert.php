<?php require_once '../check_admin_login.php'; ?>
<?php include '../header.php' ?>
<style>
option[disabled] {
    display: none;
}
</style>
<div class="mt-3">
    <?php
  if (isset($_GET['error'])) {
    echo "<div class='alert alert-danger fs-4 text-danger' role='alert'>" . $_GET['error'] . "</div>";
  }
  require "../../connect.php";
  $sql = "SELECT * FROM manufactures";
  $manufactures = mysqli_query($connect, $sql);
  ?>
    <form class="mt-4" method="post" action="process_insert.php" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="name">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" placeholder="description" name="description" rows="2"
                id="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Manufacturer</label>
            <select class="form-select" aria-label="Default select example" name="manufacture_id">
                <option selected disabled>Choose manufacturer</option>
                <?php foreach ($manufactures as $manufacture) : ?>
                <option value="<?php echo $manufacture['id'] ?>"><?php echo $manufacture['name'] ?></option>
                <?php endforeach; ?>

            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php include '../footer.php' ?>