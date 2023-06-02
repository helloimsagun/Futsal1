<?php
// Assuming you have established the database connection
include '_dbconnect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Perform the deletion query
    $query = "DELETE FROM booking WHERE id = '$id'";
    $result = mysqli_query($con, $query);
    
    if ($result) {
        // Deletion successful
        header("Location: ../mybooking.php?successDelete=true");
        exit();
    } else {
        // Error in deletion
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
