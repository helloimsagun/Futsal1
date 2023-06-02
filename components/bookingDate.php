<?php
session_start();
$userid = $_SESSION['userid']; // Assuming you have stored the user ID in the session variable
include '_dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $fieldid = $_POST['fieldid'];
    $typeid = $_POST['typeid'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Book Online</title>
</head>

<body>
    <div class="booking">
        <div class="booking-card">
            <div class="booking-time">
                <div class="time-detail">
                    <a href="../index.php#book" class="close-btn3">Back</a>
                    <h2>TIME OPEN</h2>
                    <?php
                    if ($typeid == '5A') {
                        echo '<h3>Sunday - Friday</h3>
                        <p>Day (7am - 5pm) = Rs.1,000</p>
                        <p>Night (5pm - 8pm) = Rs.1,100</p>
                        <h3>Saturday</h3>
                        <p>Day (7am - 5pm) = Rs.1,100</p>
                        <p>Night (5pm - 8pm) = Rs.1,200</p>';
                    } elseif ($typeid == '7A') {
                        echo '<h3>Sunday - Friday</h3>
                        <p>Day (7am - 5pm) = Rs.1,300</p>
                        <p>Night (5pm - 8pm) = Rs.1,400</p>
                        <h3>Saturday</h3>
                        <p>Day (7am - 5pm) = Rs.1,400</p>
                        <p>Night (5pm - 8pm) = Rs.1,500</p>';
                    }
                    ?>
                    <hr>
                    <h4>Call Us: 01-5017320, 01-5017321</h4>
                </div>

            </div>
            <div class="booking-form">

                <form class="form-detail" action="bookingTime.php" method="post">
                    <h2>Book Online</h2>
                    <input type="hidden" value='<?php echo $fieldid; ?>' name="fieldid">
                    <input type="hidden" value='<?php echo $typeid; ?>' name="typeid">
                    <div class="form-field">
                        <p>Your Name</p>
                        <input type="text" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="form-field">
                        <p>Your Email</p>
                        <input type="email" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="form-field">
                        <p>Your Number</p>
                        <input type="text" name="number" placeholder="Your Number" required>
                    </div>
                    <div class="form-field">
                        <p>Date</p>
                        <input type="date" name="date" required min="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <button class="submit">Next</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>