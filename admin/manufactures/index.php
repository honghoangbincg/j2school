<?php include '../header.php' ?>
<div class="">
   <h1>Đây là giao diện quản lý nhà sản xuất</h1>
   <a class="btn btn-primary btn-lg mb-3" href="form_insert.php" style=" --bs-btn-padding-x: 2.5rem;">Add</a>

   <?php
   if (isset($_GET['sucess'])) {
      echo "<div class='alert alert-success fs-4 text-success' role='alert'>" . $_GET['sucess'] . "</div>";
   }
   include '../../connect.php';
   $sql =  "SELECT * FROM manufactures";
   $result = mysqli_query($connect, $sql);
   mysqli_close($connect);
   ?>
   <table class="table mt-3 table-bordered">
      <thead>
         <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Phone</th>
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
               <td><?= $item['address'] ?></td>
               <td><?= $item['phone'] ?></td>
               <td><img height="100" src="<?= $item['image'] ?>"></td>
               <td><a href="form_update.php?id=<?= $item['id'] ?>">Update</a></td>
               <td><a href="delete.php?id=<?= $item['id'] ?>">Delete</a></td>
            </tr>
         <?php endforeach ?>

      </tbody>
   </table>
</div>
<?php include '../footer.php' ?>