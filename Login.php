<?php
session_start();
include 'Server.php'; //افزودن کدهای مربوط به اتصال به دیتابیس
include 'functions.php';
include 'NavBar.php';
$msg = "";
$msgsuc = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $name = $_POST['name'];
   
    $password = $_POST['password'];


    if (!empty($name) && !empty($password) && !is_numeric($name)) {


        //read from  database
       

        
            $query = "select * from users where username='$name' limit 1 ";


            $result=mysqli_query($con, $query);
            if($result){

                if ($result && mysqli_num_rows($result) > 0) {

                    $user_data = mysqli_fetch_assoc($result);

                    if ($user_data['pass']===$password) {
                        
                        $_SESSION['user_id'] =$user_data['user_id'];
                        
                        header("Location:index.php");
                        die;
                    }
                }

            }
         
       

             
            $msg = "<div class='danger' style='display:block;color:red;margin:6rem auto 0;text-align:center;'>  نام کاربری یا رمز عبور اشتباه است</div>";
            echo $msg;
        
    } else {

        $msg = "<div class='danger' style='display:block;color:red;margin:5rem auto 0;text-align:center;'>  نام کاربری یا رمز عبور اشتباه است</div>";
        echo $msg;
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
    <link rel="stylesheet" href="style.css">
</head>

<body>

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
    


</body>

</html>