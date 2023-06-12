

<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html"><img src="assets/img/logo.png" alt=""></a>-->
      <a href="index.php" class="logo me-auto"><img src="images/logo.png"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php#book">Book</a></li>
          <li><a class="nav-link scrollto" href="index.php#about">About</a></li>
          <li><a class="nav-link scrollto" href="index.php#team">Team</a></li>
          <?php
          if (isset($_SESSION['userid'])) {
            if ($_SESSION['type'] == 'admin') {
              echo '<li><a class="nav-link scrollto" href="admin_dashboard.php">Admin</a></li>';
            }else{
              echo '<li><a class="nav-link scrollto" href="dashboard.php">Dashboard</a></li>';
            }
        }
        ?>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <?php

        if (!isset($_SESSION['userid']) || $_SESSION['userid'] != true) {
            echo '<div class="signin">
        <a href="components/login.php" class="get-started-btn scrollto">Sign In</a>
        </div>';
        } else {
            $username = $_SESSION['username'];
            echo "<a href='components/logout.php'><div class='logout text-center get-started-btn scrollto'> <p style='color:white'>Welcome $username(". $_SESSION['type'] .")</p>
       Log out
        </div></a>";
        }
        ?>
    </div>
  </header><!-- End Header -->