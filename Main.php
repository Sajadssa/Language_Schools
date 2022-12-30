 <?php
    session_start();
    $_SESSION;
    include 'NavBar.php';
    include 'Server.php'; //افزودن کدهای مربوط به اتصال به دیتابیس
    include 'functions.php';
    $user_data = check_login($con);

    ?>

 <!DOCTYPE html>
 <html lang="en">


 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Home</title>
 </head>

 <body>
     <!-- hero  -->
     <section class="hero">
         <div class="hero-inner">



         </div>
     </section>
     <!-- end of hero -->
     <?php if (isset($_GET['error'])) { ?>

         <p class="error"><?php echo $_GET['error']; ?>
         </p>
     <?php

        } ?>

 </body>

 </html>