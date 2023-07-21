<?php
session_start();
if (isset($_COOKIE['remember'])) {
    require 'connect.php';
    $token = $_COOKIE['remember'];
    $sql = "SELECT * FROM customers WHERE token = '$token' LIMIT 1";
    $result = mysqli_query($connect, $sql);
    $numb_row = mysqli_num_rows($result);
    if ($numb_row == 1) {
        $each = mysqli_fetch_array($result);
        $_SESSION['id'] = $each['id'];
        $_SESSION['name'] = $each['name'];
    }
}
if (isset($_SESSION['id'])) {
    header("Location:user.php");
    exit;
}

include_once './header.php' ?>
<main>

    <section class="section-login">

        <div class="section-main">
            <div class="section-login-1">
                <div class="section-login-1-main">

                    <h1 class="section-login-1-title">Gradie</h1>
                    <p class="section-login-1-text">Beautiful gradients in seconds.</p>
                    <div class="section-login-1-img">
                        <img src="https://rvs-gradie-signup-page.vercel.app/Assets/iPhone-Mockup.png" alt="">
                    </div>

                </div>
            </div>
            <div class="section-login-2">
                <div class="section-login-2-main">
                    <?php if (isset($_SESSION['error'])) { ?>
                        <div class="alert alert-danger w-100 text-danger" role="alert">
                            <?php echo $_SESSION['error'];
                            unset($_SESSION['error']);
                            ?>
                        </div>
                    <?php } ?>
                    <h1 class="section-login-2-title">Sign In</h1>
                    <form class="section-login-2-form w-100" method="post" action="process_signin.php">
                        <div class="login-form-1">
                            <label for="input-email">Email</label>
                            <input type="text" id="input-email" name="email" placeholder="john@example.com" required>
                        </div>
                        <div class="login-form-3">
                            <label for="input-password">Password</label>
                            <input type="password" id="input-password" name="password" placeholder="password">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Remember Sign In</label>
                        </div>
                        <div class="login-form-submit-btn">
                            <button type="submit">Sign In</button>
                        </div>
                        <div class="login-form-5">
                            <p>Are you haven't an account? <a href="/j2school/signup.php">Sign Up</a></p>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </section>
</main>
<?php include_once './footer.php' ?>