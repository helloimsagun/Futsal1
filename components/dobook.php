<?php
session_start();
$userid = $_SESSION['userid']; // Assuming you have stored the user ID in the session variable
include '_dbconnect.php';

$booked = false;
$alreadyBooked = false;

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $fieldid = $_POST['fieldid'];
    $typeid = $_POST['typeid'];
    // Extract start time from the selected option
    $startTime = explode('-', $time)[0];

    // Set the price based on the booking date and start time
    if (date('l', strtotime($date)) == 'Saturday') {
        if (strtotime($startTime) >= strtotime('7:00 AM') && strtotime($startTime) < strtotime('5:00 PM')) {
            if ($typeid == '5A') {
                $price = 1100;
            } elseif ($typeid == '7A') {
                $price = 1400;
            }
        } elseif (strtotime($startTime) >= strtotime('5:00 PM') && strtotime($startTime) <= strtotime('8:00 PM')) {
            if ($typeid == '5A') {
                $price = 1200;
            } elseif ($typeid == '7A') {
                $price = 1500;
            }
        }
    } else {
        if (strtotime($startTime) >= strtotime('7:00 AM') && strtotime($startTime) < strtotime('5:00 PM')) {
            if ($typeid == '5A') {
                $price = 1000;
            } elseif ($typeid == '7A') {
                $price = 1300;
            }
        } elseif (strtotime($startTime) >= strtotime('5:00 PM') && strtotime($startTime) <= strtotime('8:00 PM')) {
            if ($typeid == '5A') {
                $price = 1100;
            } elseif ($typeid == '7A') {
                $price = 1400;
            }
        }
    }

    $reg = "INSERT INTO booking (userid, name, email, phone, date, time, price,fieldid) VALUES ('$userid', '$name', '$email', '$number', '$date', '$time', '$price', '$fieldid') ";

    mysqli_query($con, $reg);
    header("Location: ../index.php?bookSuccess=true#book");
    exit();
}
