<?php
session_start();
$userid = $_SESSION['userid']; // Assuming you have stored the user ID in the session variable
include '_dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $fieldid = $_POST['fieldid'];
    $typeid = $_POST['typeid'];
    $date = $_POST['date'];
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

                <form class="form-detail" action="dobook.php" method="post">
                    <h2>Book Online</h2>
                    <input type="hidden" value='<?php echo $fieldid; ?>' name="fieldid">
                    <input type="hidden" value='<?php echo $typeid; ?>' name="typeid">
                    <input type="hidden" value='<?php echo $name; ?>' name="name">
                    <input type="hidden" value='<?php echo $email; ?>' name="email">
                    <input type="hidden" value='<?php echo $number; ?>' name="number">
                    <input type="hidden" value='<?php echo $date; ?>' name="date">
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
                        <p>Time</p>
                        <select name="time" id="#" required>
                            <?php
                            $startTime = strtotime('7AM');
                            $endTime = strtotime('7PM');

                            while ($startTime <= $endTime) {
                                $optionTime = date('gA', $startTime);
                                $nextTime = strtotime('+1 hour', $startTime);
                                $optionEndTime = date('gA', $nextTime);

                                // Check if the time slot is already in the database
                                $query = "SELECT * FROM booking WHERE time = '$optionTime-$optionEndTime' AND date='$date' AND fieldid=$fieldid AND (status='Accepted' OR status='Pending')";
                                $result = mysqli_query($con, $query);

                                if (mysqli_num_rows($result) == 0) {
                                    // Check if the date is today and time is one hour after the current time
                                    if ($date === date('Y-m-d') && $nextTime >= strtotime('+4 hour + 45 minutes')) {
                                        echo "<option value=\"$optionTime-$optionEndTime\">$optionTime - $optionEndTime</option>";
                                    } elseif ($date !== date('Y-m-d')) {
                                        echo "<option value=\"$optionTime-$optionEndTime\">$optionTime - $optionEndTime</option>";
                                    }
                                }

                                $startTime = $nextTime;
                            }
                            ?>



                        </select>
                    </div>
                    <button class="submit">Book Now</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>