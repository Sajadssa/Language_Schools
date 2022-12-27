 <?php
    require_once "Server.php";

    if (isset($_SESSION['user_id']) != "") {
        header("Location: Main.php");
    }

    if (isset($_POST['signup'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
            $name_error = "Name must contain only alphabets and space";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = "Please Enter Valid Email ID";
        }
        if (strlen($password) < 6) {
            $password_error = "Password must be minimum of 6 characters";
        }

        if (!$error) {
            if (mysqli_query($conn, "INSERT INTO users(username, email, password) VALUES('" . $name . "', '" . $email . "', '" . md5($password) . "')")) {
                header("location: Login.php");
                exit();
            } else {
                echo "Error: " . $sql . "" . mysqli_error($conn);
            }
        }
        mysqli_close($conn);
    }


    include 'NavBar.php'; //افزودن کامپوننت navbar به registration
    include 'Server.php'; //افزودن کدهای مربوط به اتصال به دیتابیس


    ?>


 <!-- قرار دادن کدهای ثبت کاربران در صفحه ثبت کاربران -->
 <!DOCTYPE html>
 <html lang="en" dir="rtl">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Registration</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="style.css">

 </head>

 <body>




     <!-- Registration form-->


     <div class="reg_form_Container">
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

             <h1 class="reg_title">فرم عضویت در سایت</h1>

             <label for="user">نام کاربری

             </label>
             <input type="text" name="name" id="user" Placeholder="نام کاربری" required>
             <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>

             <label for="email">پست الکترونیکی

             </label>
             <input type="email" name="email" id="email" Placeholder="پست الکترونیکی" required>
             <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>

             <label for="password">رمز عبور

             </label>
             <input type="password" name="password" id="password" value="" maxlength="8" Placeholder=" رمز عبور" required>
             <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
             <div class="btns">
                 <button type="submit" name="signup" class="btn register">ثبت </button>
                 <p style="color:white; display:flex; align-items:center; " class="reg_form_desc">
                     کاربر وجود دارد؟
                     <a href="Login.php" style="color:aqua;margin-right:.5rem;margin-bottom:.4rem"><b>ورود</b></a>
                 </p>
             </div>

         </form>
     </div>

     <!-- hero -->
     <section class="hero">
         <div class="hero-inner">


         </div>
     </section>

 </body>

 </html>