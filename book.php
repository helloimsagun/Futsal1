<section class="page-section section-bg" id="book" style="padding-top: 10em;">
    <div class="container">
        
        <?php
        // Execute the SQL query to fetch futsal fields data
        include 'components/_dbconnect.php';

        $sql = "SELECT * FROM futsals";
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
                ';

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
        ?>

    </div>
</section>