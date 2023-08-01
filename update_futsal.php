<?php
include_once 'components/_dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fieldId = $_POST['field_id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $description = $_POST['description'];

    // Handle image upload
    $image = "";
    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
        $file = $_FILES['image'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowedExt = array('jpg', 'jpeg', 'png', 'gif');

        if (in_array($fileActualExt, $allowedExt)) {
            if ($fileError === 0) {
                if ($fileSize < 5000000) { // Maximum file size of 5MB
                    $image = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = 'assets/img/futsals/' . $image;
                    move_uploaded_file($fileTmpName, $fileDestination);
                } else {
                    die('Your file is too large. Maximum allowed size is 5MB.');
                }
            } else {
                die('There was an error uploading your file.');
            }
        } else {
            die('You cannot upload files of this type.');
        }
    }

    // Perform the update query based on the edited fields
    $sql = "UPDATE futsals SET name = '$name', address = '$address', phone = '$phone', description = '$description', image = '$image' WHERE id = $fieldId";
    $result = mysqli_query($con, $sql);

    if ($result) {
        // Futsal details updated successfully, redirect to the futsal list page or show a success message
        header('Location: admin_futsal.php');
        exit();
    } else {
        // Error occurred during update, handle error or redirect to an error page
        die('Error updating futsal details.');
    }
}
?>

<!-- Rest of the HTML code remains the same -->
