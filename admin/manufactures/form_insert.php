<?php require_once '../check_super_admin_login.php'; ?>
<?php include '../header.php'?>
<div class="mt-3">
    <?php 
      if(isset($_GET['error'])) {
        echo "<div class='alert alert-danger fs-4 text-danger' role='alert'>". $_GET['error'] ."</div>";
      }
  ?>
    <form class="mt-4" method="post" action="process_insert.php" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="name">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="phone">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" placeholder="image">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" placeholder="address" name="address" rows="2"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php include '../footer.php'?>