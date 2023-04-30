<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Buy Train Ticket</title>
  <link rel="stylesheet" href="style.css">
  <!-- <style>
    /* Basic styling */
    * {
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }
    body {
      background-color: #f2f2f2;
    }
    h1 {
      text-align: center;
      margin-top: 50px;
    }
    form {
      max-width: 600px;
      margin: 0 auto;
      background-color: white;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    input[type=text], input[type=email], input[type=number] {
      width: 100%;
      padding: 12px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    input[type=submit] {
      background-color: #4CAF50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
    }
    input[type=submit]:hover {
      background-color: #45a049;
    }
  </style> -->
</head>
<body>
  <h1>Buy Train Ticket</h1>
  <form action="process_ticket.php" method="post">
    <label for="from">From:</label>
    <input type="text" id="from" name="from" required>

    <label for="to">To:</label>
    <input type="text" id="to" name="to" required>

    <label for="date">Date:</label>
    <input type="date" id="date" name="date" required>

    <label for="time">Time:</label>
    <input type="time" id="time" name="time" required>

    <label for="passengers">Number of passengers:</label>
    <input type="number" id="passengers" name="passengers" min="1" max="10" required>

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="phone">Phone:</label>
    <input type="tel" id="phone" name="phone" required>

    <input type="submit" value="Buy Ticket">
  </form>
</body>
</html>
<?php

session_start();
require_once 'functions.php';
require_once 'Server.php';
require_once 'navbar.php';

define('FPDF_FONTPATH','font/');
require('fpdf.php'); // Include the FPDF library

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get form data
  $from = $_POST['from'];
  $to = $_POST['to'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $passengers = $_POST['passengers'];
  $name = $_POST['name'];

  // Perform validation on form data (e.g. make sure all required fields are filled)
  $errors = [];
  if (empty($from)) {
    $errors[] = "From station is required.";
  }
  if (empty($to)) {
    $errors[] = "To station is required.";
  }
  if (empty($date)) {
    $errors[] = "Date is required.";
  }
  if (empty($time)) {
    $errors[] = "Time is required.";
  }
  if (empty($passengers)) {
    $errors[] = "Number of passengers is required.";
  }
  if (empty($name)) {
    $errors[] = "Name is required.";
  }

  // If there are any validation errors, display them to the user
  if (!empty($errors)) {
    echo "<div style='color: red;'>";
    echo "<ul>";
    foreach ($errors as $error) {
      echo "<li>$error</li>";
    }
    echo "</ul>";
    echo "</div>";
  } else {
    // If there are no errors, continue with processing the form data

    // TODO: Save the form data to the database, send an email confirmation to the user, etc.

    // Redirect the user to a thank-you page
    header("Location: thankyou.php");
    exit;
  }
}





















?>
