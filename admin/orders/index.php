<?php require_once '../check_admin_login.php'; ?>
<?php include '../header.php'?>
<?php 
    require_once '../../connect.php';
    $sql = "SELECT 
    orders.*,
    customers.name,
    customers.phone_number,
    customers.address
    FROM orders
    JOIN customers
    ON customers.id = orders.customer_id";
    $result = mysqli_query($connect, $sql);
?>
<table class="table mt-3 table-bordered">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Time Order</th>
            <th scope="col">Customer Received</th>
            <th scope="col">Customer Order</th>
            <th scope="col">Status</th>
            <th scope="col">Price</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($result as $item) : ?>
        <tr>
            <td><?= $item['id'] ?></td>
            <td><?= $item['created_at'] ?></td>
            <td>
                <?= $item['name_receiver'] ?>
                <br>
                <?= $item['phone_receiver'] ?>
                <br>
                <?= $item['address_receiver'] ?>
            </td>
            <td>
                <?= $item['name'] ?>
                <br>
                <?= $item['phone_number'] ?>
                <br>
                <?= $item['address'] ?>
            </td>
            <td>
                <?php 
                    $x = $item['status'];
                   switch ($x) {
                       case '0':
                           echo "Mới đặt";
                           break;
                       case '1':
                        echo "Đã duyệt";
                           break;
                        case '2':
                        echo "Đã hủy";
                            break;
                   }
                ?>
            </td>
            <td>
                <?= number_format($item['total_price']) ?>
            </td>
        </tr>
        <?php endforeach ?>

    </tbody>
</table>
<?php include '../footer.php'?>