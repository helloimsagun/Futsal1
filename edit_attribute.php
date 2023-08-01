<?php
include_once 'components/_dbconnect.php';

if (isset($_GET['id'])) {
    $futsalId = $_GET['id'];

    // Fetch the futsal details based on the provided futsal ID
    $sql = "SELECT * FROM futsals WHERE id = $futsalId";
    $result = mysqli_query($con, $sql);
    $futsal = mysqli_fetch_assoc($result);

    if (!$futsal) {
        // Futsal with the given ID not found, handle error or redirect to a different page
        die('Futsal not found.');
    }

    // Fetch the attributes for the futsal
    $sqlAttributes = "SELECT * FROM futsal_attributes WHERE futsalid = $futsalId";
    $resultAttributes = mysqli_query($con, $sqlAttributes);
    $attributes = array();
    while ($row = mysqli_fetch_assoc($resultAttributes)) {
        $attributes[$row['attribute']] = $row['value'];
    }
} else {
    // No futsal ID provided in the URL, handle error or redirect to a different page
    die('Futsal ID not provided.');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Attributes - <?php echo $futsal['name']; ?></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add your CSS stylesheets and other head elements here -->
</head>

<body>
    <!-- Add your navigation and header elements here -->

    <div class="container mt-5">
        <h1>Edit Attributes - <?php echo $futsal['name']; ?></h1>
        <form id="attributeForm" action="update_attributes.php" method="POST">
            <!-- Hidden input to pass the futsal ID to the update_attributes.php -->
            <input type="hidden" name="futsal_id" value="<?php echo $futsalId; ?>">

            <!-- Add a container for dynamically adding/deleting attributes -->
            <div id="attributesContainer">
                <?php foreach ($attributes as $attribute => $value) : ?>
                    <div class="form-group">
                        <label><?php echo $attribute; ?>:</label>
                        <input type="checkbox" name="attributes[]" value="<?php echo $attribute; ?>" <?php echo ($value ? 'checked' : ''); ?>>
                        <button type="button" class="btn btn-danger btn-sm deleteAttribute">Delete</button>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Add a button to add new attributes -->
            <button type="button" id="addAttributeBtn" class="btn btn-success btn-sm">Add Attribute</button>

            <!-- Add more checkboxes for other attributes as needed -->

            <button type="submit" class="btn btn-primary mt-3">Update Attributes</button>
        </form>

        <div class="mt-3">
            <a href="admin_futsal.php" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <!-- Add your footer and scripts here -->
    <script>
        // JavaScript to handle adding and deleting attributes dynamically
        document.addEventListener("DOMContentLoaded", function() {
            const attributesContainer = document.getElementById("attributesContainer");
            const addAttributeBtn = document.getElementById("addAttributeBtn");
            const attributeForm = document.getElementById("attributeForm");

            // Function to add a new attribute input field
            function addAttributeInput() {
                const newAttributeDiv = document.createElement("div");
                newAttributeDiv.className = "form-group";
                newAttributeDiv.innerHTML = `
                    <label>New Attribute:</label>
                    <input type="text" name="new_attributes[]" class="form-control">
                    <button type="button" class="btn btn-danger btn-sm deleteAttribute">Delete</button>
                `;
                attributesContainer.appendChild(newAttributeDiv);
            }

            // Function to delete an attribute input field
            function deleteAttributeInput(event) {
                const targetElement = event.target;
                if (targetElement.classList.contains("deleteAttribute")) {
                    const attributeDiv = targetElement.parentElement;
                    attributesContainer.removeChild(attributeDiv);
                }
            }

            // Event listener for adding an attribute
            addAttributeBtn.addEventListener("click", addAttributeInput);

            // Event listener for deleting an attribute
            attributesContainer.addEventListener("click", deleteAttributeInput);

            // Prevent form submission on pressing Enter key in attribute input fields
            attributeForm.addEventListener("keypress", function(event) {
                if (event.key === "Enter") {
                    event.preventDefault();
                }
            });
        });
    </script>
</body>

</html>
