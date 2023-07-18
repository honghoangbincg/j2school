<?php include '../header.php' ?>
<div style="min-height:500px">
    <?php
   if (isset($_GET['sucess'])) {
      echo "<div class='alert alert-success fs-4 text-success mt-3' role='alert'>" . $_GET['sucess'] . "</div>";
   }
   include '../../connect.php';
   $search = '';
   if(isset($_GET['search'])) {
      $search = $_GET['search'];
   }
   // paginations
   $sql_count = "SELECT COUNT(*) FROM manufactures WHERE name LIKE '%$search%'";
   $count = mysqli_fetch_array(mysqli_query($connect, $sql_count))["COUNT(*)"];
   $item_on_page = 3;
   $page = ceil($count / $item_on_page);
   $page_url = 1;
   if(isset($_GET['page'])) {
      $page_url = $_GET['page'];
   }
   $skip  = $item_on_page * ($page_url - 1);
   $sql =  "SELECT * FROM manufactures
   WHERE name LIKE '%$search%'
   LIMIT $item_on_page OFFSET $skip";
   $result = mysqli_query($connect, $sql);
   mysqli_close($connect);
   ?>
    <div class="d-flex mt-3">
        <form class="d-flex flex-grow-1 me-2" role="search">
            <input class="form-control me-2" type="search" placeholder="Search Name" aria-label="Search" name="search"
                value="<?= $search ?>">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <a class="btn btn-primary btn-lg" href="form_insert.php" style=" --bs-btn-padding-x: 2.5rem;">Add New</a>
    </div>
    <table class="table mt-3 table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center">id</th>
                <th scope="col" class="text-center">Name</th>
                <th scope="col" class="text-center">Address</th>
                <th scope="col" class="text-center">Phone</th>
                <th scope="col" class="text-center">Image</th>
                <th scope="col" class="text-center">Update</th>
                <th scope="col" class="text-center">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $item) : ?>
            <tr>
                <td><?= $item['id'] ?></td>
                <td><?= $item['name'] ?></td>
                <td><?= $item['address'] ?></td>
                <td><?= $item['phone'] ?></td>
                <td><img height="100" width="100" src="../../<?= $item['image'] ?>" style="object-fit:cover"></td>
                <td class="text-center"><a href="form_update.php?id=<?= $item['id'] ?>"
                        class="btn btn-outline-warning">Update</a></td>
                <td class="text-center"><a href="delete.php?id=<?= $item['id'] ?>"
                        class="btn btn-outline-danger">Delete</a></td>
            </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</div>
<div class="d-flex justify-content-center">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php for ($i=1; $i <= $page ; $i++) { ?>
            <li class="page-item"><a class="page-link"
                    href="?page=<?php echo $i?><?php echo empty($search) ? '' : '&search=' . $search ?>"><?php echo $i; ?></a>
            </li>
            <?php }?>
        </ul>
    </nav>
</div>
<?php include '../footer.php' ?>