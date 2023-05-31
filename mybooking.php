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

    <title>My Bookings</title>
    <style>
        .table-centered {
            margin: 0 auto;
            border-collapse: collapse;
        }

        .table-bordered,td,th {
            border: 1px solid #ddd;
            padding: 2em;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>
<?php include 'nav.php'?>


    <div style="padding-top: 10em;" class="container">
        <h1 class="head" id="book">My Booking Details</h1>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        require_once "components/_dbconnect.php";

                        $sql = "SELECT id, name, email , number, date, time FROM booking WHERE userid = '$userid'";
                        if ($result = mysqli_query($con, $sql)) {
                            if (mysqli_num_rows($result) > 0) {
                                echo '<table class="table table-bordered table-striped table-centered">';
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th>ID</th>";
                                echo "<th>Customer Name</th>";
                                echo "<th>Email</th>";
                                echo "<th>Phone</th>";
                                echo "<th>Date</th>";
                                echo "<th>Time</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['number'] . "</td>";
                                    echo "<td>" . $row['date'] . "</td>";
                                    echo "<td>" . $row['time'] . "</td>";
                                    echo "<td>";
                                    echo '<a href="delete.php?id=' . $row['id'] . '" title="Delete" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                                echo "</table>";
                                mysqli_free_result($result);
                            } else {
                                echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                            }
                        } else {
                            echo "Oops! Something went wrong. Please try again later.";
                        }
                        mysqli_close($con);
                        ?>
                    </div>
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