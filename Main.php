<?php include 'NavBar.php' ?>

<?php

session_start();

if (empty($_SESSION['id_user'])) {
    header("Location: Login.php");
}

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
    

</body>

</html>