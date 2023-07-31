<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <title>Futsal Reservation</title>
</head>

<body>
  <?php include 'nav.php' ?>
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
  function calculateCosineSimilarity($vector1, $vector2)
  {
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
  $targetFutsalId = $_GET['id'];
  $targetSimilarities = $similarityMatrix[$targetFutsalId];

  // Sort the similarities in descending order
  arsort($targetSimilarities);

  // Print the recommended futsals based on similarity
  foreach ($targetSimilarities as $futsalId => $similarity) {
    if ($futsalId != $targetFutsalId) {
      break;
    }
  }
  ?>
  <section class="page-section section-bg" id="book" style="padding-top: 10em;">
    <div class="container">

      <?php
      // Loop through the recommended futsals based on similarity
      foreach ($targetSimilarities as $futsalId => $similarity) {
        // Skip the target futsal itself
        if ($futsalId == $targetFutsalId) {
          continue;
        }

        // Execute the SQL query to fetch futsal fields data
        $sql = "SELECT * FROM futsals WHERE id = $futsalId";
        $result = mysqli_query($con, $sql);

        // Loop through the results and generate HTML dynamically
        while ($row = mysqli_fetch_assoc($result)) {
          $name = $row['name'];
          $type = $row['type'];
          $image = $row['image'];
          $fieldId = $row['id'];

          $dimension = ($type == '5A') ? 'Type: 5A' : 'Type: 7A';

          echo '
      <div class="card" data-aos="fade-left" data-aos-delay="500">
          <div class="card-header">
              <img src="assets/img/futsals/' . $image . '" alt="' . $name . '" />
          </div>
          <div class="card-body">
              <div class="fieldname">
                  <h3>' . $name . '</h3>
              </div>
              <div class="dimension">
                  <h4>Details</h4>
                  <p>' . $dimension . '</p>
              </div>
              <div class="similarity">
              <h4>Details</h4>
              <p>Similarity: ' . number_format($similarity, 2) . '</p>
              
          </div>
          
              ';
          // Retrieve and display the attributes
          $sqlAttributes = "SELECT attribute, value FROM futsal_attributes WHERE futsalid = $futsalId";
          $resultAttributes = mysqli_query($con, $sqlAttributes);

          if (mysqli_num_rows($resultAttributes) > 0) {
            echo '<p><b>Attributes:</b></p>';

            while ($rowAttribute = mysqli_fetch_assoc($resultAttributes)) {
              $attribute = $rowAttribute['attribute'];
              $value = $rowAttribute['value'];
              if ($value == 1) {
                echo  $attribute . '  ';
              }
              // echo  $attribute . ': ' . ($value ? 'Yes' : 'No');
            }
          } else {
            echo '<p>No attributes found.</p>';
          }
          if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
            echo '<a href="components/login.php" class="book">Book Now</a>';
          } else {
            echo '
              <form action="components/bookingDate.php" method="POST">
                  <input type="hidden" name="fieldid" value="' . $fieldId . '">
                  <button type="submit" class="book">Book Now</button>
              </form>';
          }

          echo '
          </div>
      </div>';
        }
      }
      ?>

    </div>
</section>



  <section class="page-section" style="padding-top: 10em;">

    <div class="contact" id="contact">
      <div class="contact-about">
        <h3>About US</h3>
        <p>We are the easiest way to find playing spaces around you. Find venues, invite players, challenge
          teams, participate in a list of events and find playing spaces around you.</p>

      </div>
      <div class="contact-contact">
        <h3>Contact US</h3>
        <div class="log">
          <i class="fa-solid fa-envelope" aria-hidden="true"></i>
          <p>bookfutsal@gmail.com</p>
        </div>
        <div class="log">
          <i class="fa-solid fa-phone"></i>
          <p>9810092754</p>
        </div>
      </div>
    </div>
  </section>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <div class="modal fade" id="bookSuccessModal" tabindex="-1" role="dialog" aria-labelledby="bookSuccessModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="bookSuccessModalLabel">Booking Successful</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="closebookSuccessModal()">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          Booking successful.
        </div>
      </div>
    </div>
  </div>

  <script>
    var navLinks = document.getElementById("navLinks");

    function showMenu() {
      navLinks.style.display = "block";
      navLinks.style.position = "fixed";
      navLinks.style.right = "0";
    }

    function hideMenu() {
      navLinks.style.display = "none";
      navLinks.style.right = "-200px";
    }
  </script>

  <script>
    var navLinks = document.getElementById("navLinks");

    function showMenu() {
      navLinks.style.display = "block";
      navLinks.style.position = "fixed";
      navLinks.style.right = "0";
    }

    function hideMenu() {
      navLinks.style.display = "none";
      navLinks.style.right = "-200px";
    }
  </script>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="scripts/modal.js"></script>
  </script>

</body>

</html>