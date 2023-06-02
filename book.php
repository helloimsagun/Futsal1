<section class="page-section" id="book" style="padding-top: 10em;">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <img src="images/field-1.jpg" alt="rover" />
            </div>
            <div class="card-body">
                <div class="fieldname">
                    <h3>Field-1</h3>
                </div>
                <div class="dimension">
                    <h4>Details</h4>
                    <p>Type: 5A</p>
                </div>
                <?php
                if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
                    echo ' <a href="components/login.php" class="book">Book Now</a>';
                } else {
                    echo '
                    <form action="components/bookingDate.php" method="POST">
                        <input type="hidden" name="fieldid" value="1">
                        <input type="hidden" name="typeid" value="5A">
                        <button type="submit" class="book">Book Now</button>
                    </form>';
                } ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <img src="images/field-2.jpg" alt="rover" />
            </div>
            <div class="card-body">
                <div class="fieldname">
                    <h3>Field-2</h3>
                </div>
                <div class="dimension">
                    <h4>Details</h4>
                    <p>Type: 5A</p>
                </div>
                <?php
                if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
                    echo ' <a href="components/login.php" class="book">Book Now</a>';
                } else {
                    echo '
                    <form action="components/bookingDate.php" method="POST">
                        <input type="hidden" name="fieldid" value="2">
                        <input type="hidden" name="typeid" value="5A">
                        <button type="submit" class="book">Book Now</button>
                    </form>';
                } ?>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <img src="images/field-3.jpg" alt="rover" />
            </div>
            <div class="card-body">
                <div class="fieldname">
                    <h3>Field-3</h3>
                </div>
                <div class="dimension">
                    <h4>Details</h4>
                    <p>Type: 7A</p>
                </div>
                <?php
                if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
                    echo ' <a href="components/login.php" class="book">Book Now</a>';
                } else {
                    echo '
                    <form action="components/bookingDate.php" method="POST">
                        <input type="hidden" name="fieldid" value="3">
                        <input type="hidden" name="typeid" value="7A">
                        <button type="submit" class="book">Book Now</button>
                    </form>';
                } ?>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <img src="images/field-4.jpg" alt="rover" />
            </div>
            <div class="card-body">
                <div class="fieldname">
                    <h3>Field-4</h3>
                </div>
                <div class="dimension">
                    <h4>Details</h4>
                    <p>Type: 7A</p>
                </div>
                <?php
                if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
                    echo ' <a href="components/login.php" class="book">Book Now</a>';
                } else {
                    echo '
                    <form action="components/bookingDate.php" method="POST">
                        <input type="hidden" name="fieldid" value="4">
                        <input type="hidden" name="typeid" value="7A">
                        <button type="submit" class="book">Book Now</button>
                    </form>';
                } ?>
            </div>
        </div>
    </div>
</section>
