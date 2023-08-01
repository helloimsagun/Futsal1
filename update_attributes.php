<?php
include_once 'components/_dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['futsal_id'])) {
        $futsalId = $_POST['futsal_id'];

        // Delete previous attribute records associated with the futsal ID
        $sqlDeleteAttributes = "DELETE FROM futsal_attributes WHERE futsalid = $futsalId";
        mysqli_query($con, $sqlDeleteAttributes);

        // Handle updating existing attributes
        if (isset($_POST['attributes'])) {
            $selectedAttributes = $_POST['attributes'];
            $selectedAttributes = array_map('htmlspecialchars', $selectedAttributes);

            $allAttributes = array("Indoor", "Outdoor", "Parking", "Cafeteria"); // Add more attributes as needed
            
            foreach ($allAttributes as $attribute) {
                if (in_array($attribute, $selectedAttributes)) {
                    // The attribute is selected, set its value to 1
                    $sqlUpdateAttribute = "INSERT INTO futsal_attributes (futsalid, attribute, value) VALUES ($futsalId, '$attribute', 1)
                    ON DUPLICATE KEY UPDATE value = 1";
                    mysqli_query($con, $sqlUpdateAttribute);
                } else {
                    // The attribute is not selected, set its value to 0
                    $sqlUpdateAttribute = "INSERT INTO futsal_attributes (futsalid, attribute, value) VALUES ($futsalId, '$attribute', 0)
                    ON DUPLICATE KEY UPDATE value = 0";
                    mysqli_query($con, $sqlUpdateAttribute);
                }
            }
        }

        // Handle adding new attributes
        if (isset($_POST['new_attributes'])) {
            $newAttributes = $_POST['new_attributes'];
            $newAttributes = array_map('htmlspecialchars', $newAttributes);

            foreach ($newAttributes as $newAttribute) {
                if (!empty($newAttribute)) {
                    $sqlInsertNewAttribute = "INSERT INTO futsal_attributes (futsalid, attribute, value) VALUES ($futsalId, '$newAttribute', 1)";
                    mysqli_query($con, $sqlInsertNewAttribute);
                }
            }
        }

        // Redirect back to the edit_attribute.php page with the updated attributes
        header("Location: edit_attribute.php?id=$futsalId");
        exit();
    } else {
        die('Futsal ID not provided.');
    }
} else {
    // Handle cases where the form was accessed directly without a POST request
    die('Invalid request.');
}
?>
