<?php include('Server.php') ?>
<!-- rقرار دادن کدهای ثبت کاربران در صفحه ثبت کاربران -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
</head>

<body>

<?php include'index.php'?>
    <!-- login form-->
    <section id="Registration">
        <!-- Registration form-->


        <div class="reg_form_Container">
            <form action="Registration.php" method="post">

                <?php include('errors.php') ?>


                <h1 class="reg_title">فرم عضویت در سایت</h1>

                <label for="user">نام کاربری

                </label>
                <input type="text" name="username" id="user" Placeholder="نام کاربری" required>

                <label for="email">پست الکترونیکی

                </label>
                <input type="email" name="email" id="email" Placeholder="پست الکترونیکی" required>

                <label for="password">رمز عبور

                </label>
                <input type="password" name="password" id="password" Placeholder=" رمز عبور" required>
                <div class="btns">
                    <button type="submit" class="btn register">ثبت </button>
                    <p style="color:white; display:flex; align-items:center; " class="reg_form_desc">
                        کاربر وجود دارد؟
                        <a href="Login.php" style="color:aqua;margin-right:.5rem"><b>Log in</b></a>
                    </p>
                </div>

            </form>
        </div>
        <section>
</body>

</html>