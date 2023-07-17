<?php include '../header.php' ?>
<h1>Đây là giao diện products</h1>
<a class="btn btn-primary btn-lg mb-3" href="form_insert.php" style=" --bs-btn-padding-x: 2.5rem;">Add</a>

<?php
if (isset($_GET['sucess'])) {
   echo "<div class='alert alert-success fs-4 text-success' role='alert'>" . $_GET['sucess'] . "</div>";
}
include '../../connect.php';
$sql =  "SELECT products.*, 
      manufactures.name as manufacture_name
      FROM products
      JOIN manufactures 
      ON products.manufacture_id = manufactures.id";
$result = mysqli_query($connect, $sql);
?>
<table class="table mt-3 table-bordered">
   <thead>
      <tr>
         <th scope="col">id</th>
         <th scope="col">Name</th>
         <th scope="col">Price</th>
         <th scope="col">Manufacturer</th>
         <th scope="col">Image</th>
         <th scope="col">Update</th>
         <th scope="col">Delete</th>
      </tr>
   </thead>
   <tbody>
      <?php foreach ($result as $item) : ?>
         <tr>
            <td><?= $item['id'] ?></td>
            <td><?= $item['name'] ?></td>
            <td><?= $item['price'] ?></td>
            <td><?php echo $item['manufacture_name']; ?></td>
            <td><img height="100" src="<?= $item['image'] ?>"></td>
            <td><a href="form_update.php?id=<?= $item['id'] ?>">Update</a></td>
            <td><a href="delete.php?id=<?= $item['id'] ?>">Delete</a></td>
         </tr>
      <?php endforeach ?>

   </tbody>
</table>
<?php
mysqli_close($connect);
include '../footer.php' ?>