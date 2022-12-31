<?php

session_start();
require_once 'functions.php';
require_once 'Server.php';
$user_data = check_login($con);
//GET DATA FROM TABLE COURSES
$query = "select * from Courses";
$results = mysqli_query($con, $query);


//update 

if (isset($_POST['update'])) {

    $id = $user_data['id'];



    $query = "UPDATE users set  date_of_birth= '$_POST[date_of_birth]', education='$_POST[education]', national_code='$_POST[ncode]' where id='$id'";

    $query_run = mysqli_query($con, $query);


    if ($query_run) {

        echo '<script type="text/javascript">alert("ویرایش اطلاعات با موفقیت انجام شد") </script>';
    } else {
        echo '<script type="text/javascript">alert(" اطلاعات ویرایش نشد   ") </script>';
    }
}
// load data in select option
$select = "select * from courses ";

$result = mysqli_query($con, $select);
// insert date to table register

if (isset($_POST['register'])) {
    $id = $user_data['id'];

    $id_crs = $_POST['id_crs'];

    // insert into database and table register

    $insert = "INSERT INTO registration(user_id,id_Crs) VALUES ('$id','$id_crs')";
    if (mysqli_query($con, $insert)) {
        $message = "Registration";
    } else {
        $message = "Error: registering failed $insert." . mysqli_error($con);
    }
}






?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserPanel</title>
    <!-- css link -->
    <link rel="stylesheet" href="style.css">
    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .upload {
            width: 125px;
            position: relative;
            margin: auto;


        }

        .upload img {

            border: 8px solid #dcdcdc;
            border-radius: 50%;

        }

        .upload .round {
            position: absolute;
            background-color: whitesmoke;

            bottom: .2rem;

            right: .1rem;
            width: 32px;
            height: 32px;
            line-height: 33px;
            text-align: center;
            border-radius: 50%;
            overflow: hidden;




        }


        .upload .round input[type="file"] {
            position: absolute;

            transform: scale(3);
            opacity: 1;
            cursor: pointer;
        }

        .fa-camera {
            width: 50px;
            position: absolute;
            top: 0;
            transform: translate(50%, 50%);
            z-index: 1;
            cursor: pointer;

        }
    </style>
</head>

<body>
    <?php include 'NavBar.php' ?>
    <section id="userpanel">

        <div class="user_profile">

            <div class="div">

                <form action="UserPanel.php" class="userinfo" method="post">
                    <input type="text" value="<?php echo $user_data['username'] ?>" name="name" placeholder="نام کاربری">

                    <input type="email" value="<?php echo $user_data['email'] ?>" name="email" placeholder="پست الکترونیکی">
                    <input type="text" value="<?php echo $user_data['national_code'] ?>" name="ncode" placeholder="کد ملی ">


                    <input type="text" value="<?php echo $user_data['date_of_birth'] ?>" name="date_of_birth" placeholder="تاریخ تولد">

                    <input type="text" value="<?php echo $user_data['education'] ?>" name="education" placeholder=" تحصیلات">
                    <span>عنوان دوره آموزشی </span>
                    <select name="id_crs" id="course" style="width:220px;color:white;font-size:14px">
                        <option value="">دوره خود را انتخاب کنید</option>
                        <?php foreach ($result as $key => $value) { ?>

                            <option value="<?= $value['id_Crs']; ?>"><?= $value['Course_Name']; ?></option>


                        <?php } ?>
                    </select>

                    <div class="btns">

                        <button class="btn" name="update">ویرایش اطلاعات </button>
                        <button class="btn">حذف </button>
                        <button class="btn" name="register"> ثبت نهایی </button>
                    </div>



                </form>
               

            </div>


            <div class="image_profile">
                <form action="" id="form" enctype="multipart/form-data" method="post">
                    <div class="upload">
                        <?php
                        $id = $user_data['id'];
                        $name = $user_data['username'];
                        $image = $user_data['image'];
                        ?>
                        <img src="./assets/images/<?php echo $image; ?>" style=" width: 125px; height: 125px" ;title="<?php echo $image; ?>" alt="عکس موچود نیست">
                        <div class="round">
                            <input type="text" name="id" value="<?php echo $id; ?>">
                            <input type="hidden" name="name" value="<?php echo $name; ?>">
                            <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png">
                            <i class="fa fa-camera" style="color:#fff"></i>
                        </div>
                    </div>


                </form>



            </div>


        </div>
        <!-- table -->
        <div class="container-bcontent">

            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>نام کاربری</th>
                        <th>کدملی</th>
                        <th>پست الکترونیکی</th>
                        <th>تاریخ تولد</th>
                        <th>تحصیلات</th>
                        <th>تاریخ ثبت نام</th>
                        <th>نام دوره</th>
                        <th>روز وساعت تشکیل کلاس</th>
                        <th>قیمت دوره</th>
                        <th>تعداد جلسه در هفته</th>
                        <th>کل دوره</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id = $user_data['id'];
                    $query = "select u.*, c.*,id_Reg from users u inner join registration r on r.id  = u.id inner join courses c on c.id_Crs = r.id_Crs where u.id ='$id'";
                    $result = mysqli_query($con, $query) or die(mysqli_error($con));
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    ?>
                        <tr class="table-dark">
                            <td><?php echo $row['id_Reg']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['national_code']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['date_of_birth']; ?></td>
                            <td><?php echo $row['education']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['Course_Name']; ?></td>
                            <td><?php echo $row['Day_of_Hold']; ?></td>
                            <td><?php echo $row['Cost']; ?></td>
                            <td><?php echo $row['Count_of_Week']; ?></td>
                            <td><?php echo $row['Course_of_Length']; ?></td>

                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

        </div>

    </section>

    <script>
        document.getElementById('image').onchange = function() {

            document.getElementById('form').submit();
        }
    </script>
    <!-- php code after select photo -->

    <?php
    if (isset($_FILES['image']['name'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];

        $imageName = $_FILES['image']['name'];

        // تعیین مشخصات عکس
        $imageName = $_FILES['image']['name'];
        $imageSize = $_FILES['image']['size'];
        $tmpName = $_FILES['image']['tmp_name'];

        // ارزیابی عکس

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $imageName);
        $imageExtension = strtolower(end($imageExtension));

        if (!in_array($imageExtension, $validImageExtension)) {
            echo

            " 
<script>
alert('فایل انتخاب شده یک عکس نیست');
document.location.href='../Language%20Schools/UserPanel.php';


</script>

";
        } elseif ($imageSize > 1200000) {

            echo

            " 
<script>
alert('اندازه عکس خیلی بزرگ است');
document.location.href='../Language%20Schools/UserPanel.php';


</script>

";
        } else {
            $newImageName = $name . "-" . date("Y-m-d") . "-" . date("h.i.sa"); //generate new image name

            $newImageName .= "." . $imageExtension;
            $query = "UPDATE users SET image='$newImageName' WHERE id=$id";
            mysqli_query($con, $query);

            move_uploaded_file($tmpName, './assets/images/' . $newImageName);
            echo

            " 
<script>
document.location.href='../Language%20Schools/UserPanel.php';
</script>

";
        }
    }



    ?>


</body>

</html>