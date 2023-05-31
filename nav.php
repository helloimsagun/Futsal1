<nav class="fixed-top navbar">
    <div class="container">
        <a href="index.php"><img src="images/logo.png"></a>
        <div class="nav-links" id="navLinks">
            <ul>

                <li><a href="index.php#top">HOME</a></li>
                <li><a href="index.php#book">BOOK</a></li>
                <li><a href="index.php#about">ABOUT</a></li>

                <?php
                if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {

                    echo ' <li><a href="components/login.php">MY BOOKING</a></li>';
                } else {
                    echo ' <li><a href="mybooking.php">MY BOOKING</a></li>';
                } ?>


            </ul>
        </div>

        <?php

        if (!isset($_SESSION['userid']) || $_SESSION['userid'] != true) {
            echo '<div class="signin">
        <a href="components/login.php">Sign In</a>
        </div>';
        } else {
            $userid = $_SESSION['userid'];
            echo "<div class='logout text-center'> <p style='color:white'>Welcome $userid</p>
        <a href='components/logout.php'>Log out</a>
        </div>";
        }
        ?>
    </div>
</nav>