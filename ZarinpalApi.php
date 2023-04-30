<?php
// Start the session to retrieve the logged-in user's ID
session_start();
require_once 'functions.php';
require_once 'Server.php';
require_once 'navbar.php';

$user_data = check_login($con);

if (isset($_POST['submit'])) {
    // Retrieve the logged-in user's ID from the session
    $user_id = $user_data['id'];

    // Check if the form data is valid
    if (!empty($_POST['amount']) && !empty($_POST['mobile']) && !empty($_POST['remark']) && is_numeric($_POST['amount'])) {

        // check if user already has a wallet
        $query = "SELECT * FROM wallet WHERE id='$user_id'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) == 1) {
            // Update the data in the wallet table
            $amount = $_POST['amount'];
            $query = "UPDATE wallet SET amount='$amount' WHERE id='$user_id'";
            if (mysqli_query($con, $query)) {
                $message = "تراکنش با موفقیت انجام شد.";
header('Location: userpanel.php');
                exit;

            } else {
                $message = "خطا در انجام تراکنش. " . mysqli_error($con);
            }
        } else {
            // Insert the data into the wallet table
            $amount = $_POST['amount'];
            $mobile = $_POST['mobile'];
            $remark = $_POST['remark'];
            $query = "INSERT INTO wallet (id, amount, mobile, remark) VALUES ('$user_id', '$amount', '$mobile', '$remark')";
             $queryRemain = "INSERT INTO remain (id, Remain) VALUES ('$user_id', '$amount')";
             mysqli_query($con, $queryRemain);
            if (mysqli_query($con, $query)) {
                $message = "تراکنش با موفقیت انجام شد.";
                header('Location: userpanel.php');
                exit;
            } else {
                $message = "خطا در انجام تراکنش. " . mysqli_error($con);
            }


            
        }
    } else {
        $message = "لطفا تمامی فیلدها را با دقت پر کنید.";
    }


   
}
    


$id = $user_data['id'];
$query = "SELECT amount, mobile, remark FROM wallet WHERE id = $id";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$wallet_amount = $row['amount'] ?? 0;
$wallet_mobile = $row['mobile'] ?? '';
$wallet_remark = $row['remark'] ?? '';
$new_amount = isset($_POST['amount']) ? $_POST['amount'] : $wallet_amount;
?>

<form method="POST" action="">
    <label for="amount">مبلغ (تومان):</label>
    <input type="number" name="amount" id="amount" value="<?php echo $new_amount; ?>" required>

    <label for="mobile">شماره تماس:</label>
    <input type="text" name="mobile" id="mobile" value="<?php echo $wallet_mobile; ?>" required>

    <label for="remark">توضیحات:</label>
    <input name="remark" id="remark" value="<?php echo $wallet_remark; ?>" required>

    <input type="submit" name="submit" value="<?php echo $wallet_amount > 0 ? 'بروزرسانی' : 'پرداخت'; ?>">
</form>

<p><?php echo $message ?? ''; ?></p>