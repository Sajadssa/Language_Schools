<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php include 'index.php' ?>
    <!-- login form-->
    <section id="loginForm">

        <div class="log_form_Container">
            <form action="Main.php" method="post">
                <h1 class="log_title">فرم ورود</h1>

                <label for="user">نام کاربری

                </label>
                <input type="text" name="username" id="user" Placeholder="نام کاربری" required>

                <label for="password">رمز عبور

                </label>
                <input type="password" name="password" id="password" Placeholder=" رمز عبور" required>
                <div class="btns">

                    <button type="submit" class="btn input">ورود</button>


                </div>
                <div class="log_footer">

                    <p> ایجاد حساب کاربری؟ </p>
                    <a href="Registration.php">عضویت</a>
                </div>

            </form>
        </div>
    </section>
    <!--end of login form  -->
    <section class="hero">
        <div class="hero-inner">


        </div>
    </section>

</body>
</body>

</html>