<?php include '../header.php'?>
<?php include_once '../menu.php' ?>
<div class="container">
<form class="mt-4" method="post" action="process_insert.php">
<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="name">
  </div>
  <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <textarea class="form-control" placeholder="address" name="address" rows="2"></textarea>
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="text" class="form-control" id="phone" name="phone" placeholder="phone">
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="text" class="form-control" id="image" name="image" placeholder="image">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<?php include '../footer.php'?>