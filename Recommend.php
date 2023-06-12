<?php
include_once 'components/_dbconnect.php';
// Retrieve the attribute-value data from the futsal_attributes table
$query = "SELECT * FROM futsal_attributes";
$result = mysqli_query($con, $query);

// Create an associative array to store the attribute values for each futsal
$attributeData = array();

while ($row = mysqli_fetch_assoc($result)) {
    $futsalId = $row['futsalid'];
    $attribute = $row['attribute'];
    $value = $row['value'];

    // Store the attribute value for the corresponding futsal
    $attributeData[$futsalId][$attribute] = $value;
}

// Calculate cosine similarity between two futsals
function calculateCosineSimilarity($vector1, $vector2) {
    $dotProduct = 0;
    $magnitude1 = 0;
    $magnitude2 = 0;

    foreach ($vector1 as $attribute => $value) {
        if (isset($vector2[$attribute])) {
            $dotProduct += $value * $vector2[$attribute];
        }
        $magnitude1 += $value * $value;
    }

    foreach ($vector2 as $value) {
        $magnitude2 += $value * $value;
    }

    if ($magnitude1 == 0 || $magnitude2 == 0) {
        return 0; // Handle zero magnitude case to avoid division by zero
    }

    $magnitude1 = sqrt($magnitude1);
    $magnitude2 = sqrt($magnitude2);

    return $dotProduct / ($magnitude1 * $magnitude2);
}

// Calculate cosine similarity between all pairs of futsals
$similarityMatrix = array();

foreach ($attributeData as $futsalId1 => $vector1) {
    foreach ($attributeData as $futsalId2 => $vector2) {
        $similarity = calculateCosineSimilarity($vector1, $vector2);
        $similarityMatrix[$futsalId1][$futsalId2] = $similarity;
    }
}

// Example: Calculate similarity of a target futsal (futsalId = 1) with all other futsals
$targetFutsalId = 1;
$targetSimilarities = $similarityMatrix[$targetFutsalId];

// Sort the similarities in descending order
arsort($targetSimilarities);

// Print the recommended futsals based on similarity
foreach ($targetSimilarities as $futsalId => $similarity) {
    if ($futsalId != $targetFutsalId) {
        echo "Futsal ID: $futsalId, Similarity: $similarity <br>";
    }
}
?>