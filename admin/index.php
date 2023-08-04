<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/form.css">
</head>

<body>
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
                        <h1 class="section-login-2-title">Sign In</h1>
                        <form class="section-login-2-form w-100" method="post" action="process_signin.php">
                            <div class="login-form-1">
                                <label for="input-email">Email</label>
                                <input type="text" id="input-email" name="email" placeholder="john@example.com"
                                    required>
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
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>