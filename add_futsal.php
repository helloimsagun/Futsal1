<?php
include_once 'components/_dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if all required fields are provided
    if (isset($_POST['name']) && isset($_POST['address']) && isset($_POST['phone']) && isset($_POST['description']) && isset($_POST['type'])) {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $description = $_POST['description'];
        $type = $_POST['type'];

        // Handle image upload
        $image = "";
        if (isset($_FILES['image'])) {
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

        // Add the new futsal to the database
        $sqlInsertFutsal = "INSERT INTO futsals (name, address, phone, description, type, image) VALUES ('$name', '$address', '$phone', '$description', '$type', '$image')";
        mysqli_query($con, $sqlInsertFutsal);

        // Redirect back to the admin_futsal.php page after adding the futsal
        header("Location: admin_futsal.php");
        exit();
    } else {
        die('Please provide all required fields.');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Futsal</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add your CSS stylesheets and other head elements here -->
</head>

<body>
    <!-- Add your navigation and header elements here -->

    <div class="container mt-5">
        <h1>Add Futsal</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Futsal Name:</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" name="address" id="address" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="phone">Contact:</label>
                <input type="tel" class="form-control" name="phone" id="phone" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" id="description" rows="4" required></textarea>
            </div>

            <!-- Type (Field Type) -->
            <div class="form-group">
                <label for="type">Type:</label>
                <select class="form-control" name="type" id="type" required>
                    <option value="indoor">A5</option>
                    <option value="outdoor">A7</option>
                </select>
            </div>

            <!-- Image -->
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control-file" name="image" id="image">
            </div>

            <!-- Add more input fields as needed -->

            <button type="submit" class="btn btn-primary">Add Futsal</button>
        </form>

        <div class="mt-3">
            <a href="admin_futsal.php" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <!-- Add your footer and scripts here -->
</body>

</html>
