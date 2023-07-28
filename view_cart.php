<?php include_once 'header.php'; ?>

<?php 
    $cart = [];
    if(isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
    }
   
?>
<style>
.title {
    margin-bottom: 5vh;
}


media(max-width:767px) {
    .card {
        margin: 3vh auto;
    }
}

.cart {
    background-color: #fff;
    padding: 4vh 5vh;
    border-bottom-left-radius: 1rem;
    border-top-left-radius: 1rem;
}

@media(max-width:767px) {
    .cart {
        padding: 4vh;
        border-bottom-left-radius: unset;
        border-top-right-radius: 1rem;
    }
}

.summary {
    background-color: #ddd;
    border-top-right-radius: 1rem;
    border-bottom-right-radius: 1rem;
    padding: 2vh;
    color: rgb(65, 65, 65);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.summary .btn {
    width: fit-content;
    margin: 0 auto;
}

@media(max-width:767px) {
    .summary {
        border-top-right-radius: unset;
        border-bottom-left-radius: 1rem;
    }
}

.summary .col-2 {
    padding: 0;
}

.summary .col-10 {
    padding: 0;
}

.row {
    margin: 0;
}

.title b {
    font-size: 1.5rem;
}

.main {
    margin: 0;
    padding: 2vh 0;
    width: 100%;
}

.col-2,
.col {
    padding: 0 1vh;
}

a {
    padding: 0 1vh;
}

.close {
    margin-left: auto;
    font-size: 0.7rem;
}

img {
    width: 3.5rem;
}

.back-to-shop {
    margin-top: 4.5rem;
}

h5 {
    margin-top: 4vh;
}

hr {
    margin-top: 1.25rem;
}

form {
    padding: 2vh 0;
}

select {
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1.5vh 1vh;
    margin-bottom: 4vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247);
}

input {
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1vh;
    margin-bottom: 4vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247);
}

input:focus::-webkit-input-placeholder {
    color: transparent;
}


a {
    color: black;
    text-decoration: none;
}

a:hover {
    color: black;
    text-decoration: none;
}

#code {
    background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253), rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
    background-repeat: no-repeat;
    background-position-x: 95%;
    background-position-y: center;
}

body {
    background: #ddd;
}

.remove {
    cursor: pointer;
}
</style>
<?php 
$numItems = count($cart);
if($numItems > 0) {
    // var_dump('1');die;
    ?>
<div class="container py-5">
    <div class="card">
        <div class="row">
            <div class="col-md-8 cart">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>Shopping Cart</b></h4>
                        </div>
                        <div class="col align-self-center text-right text-muted">

                            <?php  
                           echo $numItems;
                            ?>
                            Items
                        </div>
                    </div>
                </div>
                <?php 
                
                $i = 1;
                $sum_price =0;
                foreach ($cart as $id => $each) { ?>
                <div class="row border-top <?php echo ($i === $numItems) ? 'border-bottom' : ''?>">
                    <div class="row main align-items-center">
                        <div class="col-1"><img class="img-fluid" src="<?php echo $each['image']?>"></div>
                        <div class="col">
                            <div class="row text-muted"><?php echo $each['name'] ?></div>
                            <div class="row"><?php echo $each['description']?></div>
                        </div>
                        <div class="col">
                            <a href="update_quantity.php?id=<?php echo $id;?>&type=decrease">-</a><span
                                class="border d-inline-block px-2"><?php echo $each['quantity']; ?></span>
                            <a href="update_quantity.php?id=<?php echo $id;?>&type=increase">+</a>
                        </div>
                        <div class="col">
                            <?php 
                        $result = $each['price'] * $each['quantity'] ;
                        $sum_price += $result;
                        echo number_format($result);?> VND</div>
                        <div class="col-1 remove">
                            <a href="delete_cart.php?id=<?php echo $id;?>">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php $i++; }?>
                <div class="back-to-shop"><a href="/j2school/">&leftarrow; <span class="text-muted">Back to
                            shop</span></a></div>

            </div>
            <div class="col-md-4 summary">
                <div>
                    <div>
                        <h5><b>Summary</b></h5>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col" style="padding-left:0;">ITEMS <?php echo $numItems = count($cart);?></div>
                        <div class="col text-right"><?php echo number_format($sum_price);?> VND</div>
                    </div>
                    <!-- <form>
                    <p>SHIPPING</p>
                    <select>
                        <option class="text-muted">Standard-Delivery- &euro;5.00</option>
                    </select>
                    <p>GIVE CODE</p>
                    <input id="code" placeholder="Enter your code">
                </form>
                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <div class="col">TOTAL PRICE</div>
                    <div class="col text-right">&euro; 137.00</div>
                </div> -->
                </div>
                <a href="checkout.php" class="btn btn-info">CHECKOUT</a>
            </div>
        </div>

    </div>
</div>
<?php }else{
    ?>
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card overflow-hidden">
                <div class="card-header">
                    <h5><b>Shopping Cart</b></h5>
                </div>
                <div class="card-body cart">
                    <div class="col-sm-12 empty-cart-cls text-center">
                        <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                        <h3><strong>Your Cart is Empty</strong></h3>
                        <h4>Add something to make me happy :)</h4>
                        <a href="/j2school/" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue
                            shopping</a>
                    </div>
                </div>
            </div>


        </div>

    </div>

</div>
<?php }?>

<?php include_once 'footer.php'; ?>