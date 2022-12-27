<!-- دریافت اطلاعات ارسالی از سمت سرور در فرم اصلی -->

<?php

session_start();

if (isset($_SESSION['username'])) {
    $_SESSION['msg'] = "برای دیدن این صفحه شما باید وارد سایت شوید";

    header("location:Login.php");
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location:Login.php');
}
?>

<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Language Schools</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="style.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />

</head>

<body>
    <!-- header navigation -->
    <!-- header.header>nav.nav_container>ul.nav_link>li.nav_item*5>a -->

    <header>
        <nav class="nav_container">

            <div class=" toggler">
                <div class="bar bar-one"></div>
                <div class="bar bar-two"></div>
                <div class="bar bar-three"></div>
            </div>
            <div class="logo">


                <img src="./assets/images/logo.jpg" alt="logo" />
            </div>

            <ul class="nav_link">
                <li class="nav_item"><a href="Main.php">خانه</a>
                </li>
                <div class="subnav">
                    <button class="subnavbtn">دوره ها <i class="fa fa-caret-down"></i></button>
                    <div class="subnav-content">
                        <a href="English.php">زبان انگلیسی</a>
                        <a href="Germany.php">زبان آلمانی</a>
                        <a href="France.php">زبان فرانسه</a>
                    </div>
                </div>
                <li class="nav_item"><a href="About.php">درباره ما </a></li>
                <li class=" nav_item"><a href="Contact.php"> ارتباط با ما</a></li>


            </ul>


        </nav>
    </header>
    <!-- end of header navigation -->

    
    <?php
    if (isset($_SESSION['success'])) : ?>

    <div>
        <h3>
            <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>

        </h3>
    </div>

    <?php endif ?>

    <!-- اگر کاربر وارد سایت شد نام کاربری را در صفحه اصلی نشان می دهد -->

    <?php if (isset($_SESSION['username'])) :  ?>

    <h3>خوش آمدید <strong><?php echo $_SESSION['username']; ?></strong></h3>


    <button> <a href="index.php?logout='1'"></a></button>

    <?php endif ?>
</body>

</html>