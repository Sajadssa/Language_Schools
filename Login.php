<?php
session_start();

require_once "Server.php";
if (isset($_SESSION['user_id']) != "") {
    header("Location: Main.php");
}


if (isset($_POST['login'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));


    if (strlen($password) < 6) {
        $password_error = "رمز عبور نباید از 6 حرف کمترباشد";
    }

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '" . $name . "' and password = '" . md5($password) . "'");
    if (!empty($result)) {
        if ($row = mysqli_fetch_array($result)) {
            $_SESSION['id_user'] = $row['uid'];
            $_SESSION['username'] = $row['name'];
            $_SESSION['password'] = $row['password'];

            header("Location: Main.php");
        }
    } else {
        $error_message = 'Incorrect Email or Password!!!';
    }
}
?>



<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php include 'NavBar.php' ?>
    <!-- login form-->
    <section id="loginForm">

        <div class="log_form_Container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <h1 class="log_title">فرم ورود</h1>

                <label for="user">نام کاربری

                </label>
                <input type="text" name="name" id="user" Placeholder="نام کاربری" required>
                <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>

                <label for="password">رمز عبور

                </label>
                <input type="password" name="password" id="password" Placeholder=" رمز عبور" required>
                <div class="btns">
                    <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                    <button type="submit" name="login" class="btn input">ورود</button>


                </div>
                <div class="log_footer">

                    <p> حساب کاربری ندارید؟ </p>
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

</html>