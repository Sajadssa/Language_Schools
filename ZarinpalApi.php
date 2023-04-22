<?php

session_start();
require_once 'functions.php';
require_once 'Server.php';
require_once 'navbar.php';

$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Payment Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form method="POST" action="" dir="rtl">
        <input type="hidden" name="merchant_id" value="your_merchant_id">
        <label for="amount">

            مبلغ:</label>
        <input type="number" name="amount" id="amount">
        <br>
        <label for="description">توضیحات:</label>
        <input type="text" name="description" id="description">
        <br>
        <label for="mobile">شماره تلفن همراه:</label>
        <input type="text" name="mobile" id="mobile">
        <br>
        <input type="submit" name="submit" value="پرداخت">
        <script>
        function redirectToZarinuserPanel(event) {
            event.preventDefault();
            window.location.href = "UserPanel.php";
        }
        </script>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $merchant_id = $_POST['merchant_id'];
        $amount = $_POST['amount'];
        $description = $_POST['description'];
        $callback_url = "https://example.com/callback.php";
        $mobile = $_POST['mobile'];

        $parameters = array(
            "merchant_id" => $merchant_id,
            "amount" => $amount,
            "description" => $description,
            "callback_url" => $callback_url,
            "mobile" => $mobile
        );

        $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

        $result = $client->PaymentRequest($parameters);

        if ($result->Status == 100) {
            $authority = $result->Authority;
            $payment_url = 'https://sandbox.zarinpal.com/pg/StartPay/' . $authority;
            header('Location: ' . $payment_url);
        } else {
            echo "Error code: " . $result->Status;
        }
    }
    ?>
</body>

</html>