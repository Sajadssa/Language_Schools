<?php 
session_start();

//مقدار دهی اولیه متغیرها

$username="";
$email="";


$errors=array();

//اتصال به بانک اطلاعاتی

$db=mysqli_connect('localhost','root','','language_schools') or die('اتصال پایگاه داده برقرار نمی باشد');

//ثبت کاربران در بانک اطلاعاتی
//ارسال مقادیر متغییرها به سرور  هنگامی که کاربر در فرم ثبت نام مشخصات خود را ثبت می کند

$username=mysqli_real_escape_string($db,$_POST['username']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['password']);

//ارزیابی اطلاعات ارسال شده توسط کاربر به سرور

if(empty($username)) {array_push($errors,"وارد کردن نام کاربری الزامی است");}
if (empty($email)) {
    array_push($errors, "وارد کردن ایمیل الزامی است");
}
if (empty($password)) {
    array_push($errors, "وارد کردن رمز عبور الزامی است");
}

//بررسی کاربری که در پایگاه داده ذخیره شده است و  همنام اطلاعات ارسالی است

$user_check_query="SELECT * FROM users WHERE username='$username' or email='$email' LIMIT 1";

$results=mysqli_query($db,$user_check_query);
$user=mysqli_fetch_assoc($results);

if($user){

    if($user['username']===$username){array_push($errors,'نام کاربری موجود وجود دارد');}

    if ($user['email'] === $email) {
        array_push($errors, 'ایمیل با این نام کاربری وجود دارد');
    }
}

//ثبت کاربر جدید در صورت نبود خطا

if(count($errors)==0){
    $password=md5($password);
    //ثبت کاربر جدید
    $query="INSERT INTO users ( username,email,password) VALUES('$username','$email','$password' )";

    mysqli_query($db,$query);//اجرای کوئری

    $_SESSION['username']=$username;
    $_SESSION['success'] = "شما اکنون وارد شده اید ";
    //ورود به فرم اصلی
    header('location:Main.php');
}














?>