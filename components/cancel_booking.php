<?php
include_once '_dbconnect.php';
$booking_id = $_GET['id'];


$sql = "UPDATE booking SET status = 'Cancelled' WHERE id = '$booking_id'";
// use mysqli

if ($con->query($sql) === TRUE) {
    header("Location: ../user_orders.php");
} else {
    echo "Error updating record: " . $con->error;
}
?>