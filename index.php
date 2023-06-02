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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Futsal Reservation</title>
</head>

<body>
    <?php include 'nav.php' ?>

    <section class="page-section index" id="top" style="padding-top: 10em;">
        <div class="container">
            <div class="des text-center">
                <h1>Here To Make Your Booking Easier!</h1>
                <h3>Book Courts to Play At!</h3>
                <h3>Booking and Enjoy!</h3>
                <a href="#book">Get Started</a>
            </div>
            <div class="play"></div>
        </div>
    </section>

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

    <script src="scripts/modal.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>