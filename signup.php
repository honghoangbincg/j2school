<?php session_start(); ?>
<?php include_once './header.php' ?>

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
                    <h1 class="section-login-2-title">Sign Up</h1>
                    <form class="section-login-2-form w-100" method="post" action="process_signup.php">
                        <div class="login-form-2">
                            <label for="input-name">Full Name</label>
                            <input type="text" id="input-name" name="name" placeholder="John Doe" required>
                        </div>
                        <div class="login-form-1">
                            <label for="input-email">Email</label>
                            <input type="text" id="input-email" name="email" placeholder="john@example.com" required>
                        </div>
                        <div class="login-form-3">
                            <label for="input-password">Password</label>
                            <input type="password" id="input-password" name="password" placeholder="password" required>
                        </div>
                        <div class="login-form-3">
                            <label for="input-phone">Phone Number</label>
                            <input type="text" id="input-phone" name="phone" placeholder="Phone Number">
                        </div>
                        <div class="login-form-3">
                            <label for="input-address">Address</label>
                            <input type="text" id="input-address" name="address" placeholder="Address">
                        </div>
                        <div class="login-form-submit-btn">
                            <button type="submit">Create an Account</button>
                        </div>
                        <div class="login-form-5">
                            <p>Already have an account? <a href="/j2school/signin.php">Sign In</a></p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
</main>
<?php include_once './footer.php' ?>