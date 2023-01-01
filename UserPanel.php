<?php

session_start();
require_once 'functions.php';
require_once 'Server.php';
$user_data = check_login($con);
//GET DATA FROM TABLE COURSES
$query = "select * from Courses";
$results = mysqli_query($con, $query);





//update 
if (isset($_GET['update'])) {


    $id = $user_data['id'];
    echo $id;


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

    $insert = "INSERT INTO registration(id,id_Crs) VALUES ('$id','$id_crs')";
    if (mysqli_query($con, $insert)) {
        $message = "ثبت نام شما با موفقیت انجام شد";
    } else {
        $message = "خطا در ثبت اطلاعات $insert." . mysqli_error($con);
    }
    //update same time user

    $id = $user_data['id'];
    echo $id;


    $query = "UPDATE users set  date_of_birth= '$_POST[date_of_birth]', education='$_POST[education]', national_code='$_POST[ncode]' where id='$id'";

    $query_run = mysqli_query($con, $query);


     
}

// delete from table registration

if (isset($_GET['id'])) {
    // echo $_GET['id'];
    $id = $_GET['id'];
    $delete = mysqli_query($con, "DELETE FROM `registration` WHERE id_Reg='$id'");
    header("Location:UserPanel.php");
    die;
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

        .container-bcontent .table tbody tr.table-dark td a.update i {
            color: rgba(46, 25, 78, 0.5);
            text-decoration: none;
            color: var(--mainWhite);
            padding: 0.5rem;
            border-radius: 5px;
            text-align: center;
            font-size: 14px;
            transition: .4s ease-in-out;
        }

        .container-bcontent .table tbody tr.table-dark td a.update i:hover {
            color: rgba(2, 5, 255, 0.5);
        }

        /* style btn delete in table */
        .container-bcontent .table tbody tr.table-dark td a.delete i {
            color: rgba(255, 0, 0, 0.5);
            text-decoration: none;
            color: #fff;
            padding: 0.5rem;
            border-radius: 5px;
            text-align: center;
            font-size: 14px;
            transition: .4s ease-in-out;
        }

        .container-bcontent .table tbody tr.table-dark td a.delete i:hover {
            color: crimson;
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

                        <button class="btn" name="register"> ثبت نام </button>
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
<?php

    $id = $user_data['id'];
    $query = "select u.*, c.*,id_Reg from users u inner join registration r on r.id  = u.id inner join courses c on c.id_Crs = r.id_Crs where u.id ='$id'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $num = mysqli_num_rows($result);
if ($result->num_rows > 0) {

    echo '<table class="table">';

    echo '<thead>
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
                        <th>ویرایش </th>
                        <th>حذف </th>



                    </tr>
                </thead>';

echo ' <tbody>';
    //get data from db


    if ($num > 0) {
        while ($results = mysqli_fetch_assoc($result)) {

            echo "
<tr class='table-dark'>
<td>" . $results['id_Reg'] . "</td>
<td>" . $results['username'] . "</td>
<td>" . $results['national_code'] . "</td>
<td>" . $results['email'] . "</td>
<td>" . $results['date_of_birth'] . "</td>
<td>" . $results['education'] . "</td>
<td>" . $results['date'] . "</td>
<td>" . $results['Course_Name'] . "</td>
<td>" . $results['Day_of_Hold'] . "</td>
<td>" . $results['Cost'] . "</td>
<td>" . $results['Count_of_Week'] . "</td>
<td>" . $results['Course_of_Length'] . "</td>
<td>
<a href='Edit.php?id=" . $results['id_Reg'] . "' class='update' ><i class='fa fa-edit'></i></a>
</td>
<td>
<a href='UserPanel.php?id=" . $results['id_Reg'] . "' class='delete' ><i class='fa fa-trash'></i></a>
</td>

</tr>


";
        }
    }
echo '</tbody>';
    echo '</table>';



}



?>
            

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
document.location.href='UserPanel.php';


</script>

";
        } elseif ($imageSize > 1200000) {

            echo

            " 
<script>
alert('اندازه عکس خیلی بزرگ است');
document.location.href='UserPanel.php';


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
document.location.href='UserPanel.php';
</script>

";
        }
    }



    ?>


</body>

</html>