<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/form.css">
    <style>
    .main-wrapper {
        height: 79vh;
        padding-top: 70px;
        background: #ddd;
    }

    .card {
        margin: auto;
        width: 90%;
        box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border-radius: 1rem;
        border: transparent;
    }
    </style>
</head>

<body>
    <header class="mb-5">
        <nav class="navbar navbar-expand-lg bg-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="/j2school/">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/j2school/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <?php if(empty($_SESSION['id'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/j2school/signin.php">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/j2school/signup.php">Sign Up</a>
                        </li>
                        <?php } else{ ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/j2school/view_cart.php">Go to Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/j2school/signout.php">Sign Out</a>
                        </li>

                        <?php }?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>