 <?php

    session_start();
    require_once 'functions.php';
    require_once 'Server.php';
    $user_data = check_login($con);
    //GET DATA FROM TABLE COURSES
    $query = "select * from Courses";
    $results = mysqli_query($con, $query);


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
    }

    // update data---code for update data
    if (!isset($_GET['id'])) {

        $id = $user_data['id'];
        $id_crs = $_POST['id_crs'];
        


        $query = "UPDATE users set username='$_POST[name]', pass='$_POST[pass]' ,email='$_POST[email]' , date_of_birth= '$_POST[date_of_birth]', education='$_POST[education]', national_code='$_POST[ncode]' where id='$id'";
        $query1="UPDATE registration set id_Crs='$id_crs'";
         $query_run = mysqli_query($con, $query);
        $query_run1 = mysqli_query($con, $query1);
       


        if ($query_run && $query_run1) {

            
            header("location:UserPanel.php");
            echo '<script type="text/javascript">alert("ویرایش اطلاعات با موفقیت انجام شد") </script>';
            
        } else {
            echo '<script type="text/javascript">alert(" اطلاعات ویرایش نشد   ") </script>';
        }
        if (isset($_GET['id'])) {
            // echo $_GET['id'];
            $id = $_GET['id'];
            $update = mysqli_query($con, "UPDATE registration set id_Crs='$id_crs' where id_Reg='$id'");
            header("Location:UserPanel.php");
            die;
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
     <?php include 'NavBar.php';
        ?>
     <section id="userpanel">

         <div class="user_profile">

             <div class="div">

                 <form action="Edit.php" class="userinfo" method="post">



                     <input type="hidden" value="<?php echo $id ?>" name="id">



                     <input type="text" value="<?php echo $user_data['username'] ?>" name="name" placeholder="نام کاربری">
                     <input type="text" value="<?php echo $user_data['pass'] ?>" name="pass" placeholder=" رمزعبور">

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

                         <button type="submit" class="btn" name="update">ویرایش اطلاعات </button>
                         <a href="UserPanel.php" class="btn" name="cancel">انصراف</a>

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