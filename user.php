<?php 
session_start();
if(empty($_SESSION['id'])) {
    header("location:signin.php");
    exit;
}
?>
<?php include_once './header.php' ?>
<div class="container pt-3">
    <h1>Hello, <?php echo $_SESSION['name']; ?> </h1>

    <a href="signout.php">Sign Out</a>
</div>

<?php include_once './footer.php' ?>