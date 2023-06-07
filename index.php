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

    <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <div class="row">
                <div class="col-xl-6">
                    <h1>Here To Make Your Booking Easier!</h1>
                    <h2>Book Courts to Play At!</h2>
                    <h2>Booking and Enjoy!</h2>
                    <a href="#book" class="btn-get-started scrollto">Get Started</a>
                </div>
            </div>
        </div>

    </section><!-- End Hero -->
    <?php include 'book.php' ?>
    <?php include 'about.php' ?>
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