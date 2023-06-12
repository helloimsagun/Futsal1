<?php
session_start();
$userid = $_SESSION['userid']; // Assuming you have stored the user ID in the session variable
include '_dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $fieldid = $_POST['fieldid'];
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
                    $sql = "SELECT * FROM futsals where id='$fieldid'";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $typeid = $row['type'];
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
                    <!-- Similar Button -->
                    <button class="submit" type="button" onclick="window.location.href='../simarity.php?id=<?php echo $fieldid; ?>'">Similar Futsal</button>

                    <?php
                    // Execute the SQL query to fetch futsal fields data
                    $sql = "SELECT * FROM futsals where id='$fieldid'";
                    $result = mysqli_query($con, $sql);

                    // Loop through the results and generate HTML dynamically
                    $row = mysqli_fetch_assoc($result);
                    $name = $row['name'];
                    $type = $row['type'];
                    $fieldId = $row['id'];
                    $address = $row['address'];
                    $phone = $row['phone'];
                    $description = $row['description'];
                    echo '
                        <p><b>Futsal Name</b>: ' . $name . '</p>
                        <p><b>Futsal Type</b>: ' . $type . '</p>
                        <p><b>Phone</b>: ' . $phone . '</p>

                        <p>' . $address . '</p>
                ';
                    // Retrieve and display the attributes
                    $sqlAttributes = "SELECT attribute, value FROM futsal_attributes WHERE futsalid = $fieldid";
                    $resultAttributes = mysqli_query($con, $sqlAttributes);

                    if (mysqli_num_rows($resultAttributes) > 0) {
                        echo '<p><b>Attributes:</b></p>';

                        while ($rowAttribute = mysqli_fetch_assoc($resultAttributes)) {
                            $attribute = $rowAttribute['attribute'];
                            $value = $rowAttribute['value'];
                            if($value == 1){
                                echo  $attribute.'  ';
                            }
                            // echo  $attribute . ': ' . ($value ? 'Yes' : 'No');
                        }

                    } else {
                        echo '<p>No attributes found.</p>';
                    }
                    ?>

                    <div class="form-field">
                        <label for="date"><b>Date</b></label>
                        <input type="date" name="date" id="date" class="form-control" required min="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <button class="submit">Next</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>