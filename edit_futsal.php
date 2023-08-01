<?php
include_once 'components/_dbconnect.php';

if (isset($_GET['id'])) {
    $fieldId = $_GET['id'];

    // Fetch the futsal details based on the provided field ID
    $sql = "SELECT * FROM futsals WHERE id = $fieldId";
    $result = mysqli_query($con, $sql);
    $futsal = mysqli_fetch_assoc($result);

    if (!$futsal) {
        // Futsal with the given ID not found, handle error or redirect to a different page
        die('Futsal not found.');
    }
} else {
    // No field ID provided in the URL, handle error or redirect to a different page
    die('Field ID not provided.');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Futsal - <?php echo $futsal['name']; ?></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add your CSS stylesheets and other head elements here -->
</head>

<body>
    <!-- Add your navigation and header elements here -->

    <div class="container mt-5">
        <h1>Edit Futsal - <?php echo $futsal['name']; ?></h1>
        <form action="update_futsal.php" method="POST">
            <!-- Hidden input to pass the field ID to the update_futsal.php -->
            <input type="hidden" name="field_id" value="<?php echo $fieldId; ?>">

            <!-- Add input fields for editing futsal details -->
            <div class="form-group">
                <label for="name">Futsal Name:</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo $futsal['name']; ?>" required>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" name="address" id="address" rows="4" required><?php echo $futsal['address']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" class="form-control" name="phone" id="phone" value="<?php echo $futsal['phone']; ?>" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" id="description" rows="4" required><?php echo $futsal['description']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control-file" name="image" id="image">
                <p>Current Image: <img src="assets/img/futsals/<?php echo $futsal['image']; ?>" alt="<?php echo $futsal['name']; ?>" width="100"></p>
            </div>

            <!-- Add more input fields as needed -->

            <button type="submit" class="btn btn-primary">Update Futsal</button>
            <div class="mt-3">
            <a href="admin_futsal.php" class="btn btn-secondary">Back</a>
        </div>
        </form>
    </div>

    <!-- Add your footer and scripts here -->
</body>

</html>
