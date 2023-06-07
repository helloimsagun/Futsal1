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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

    <title>My Bookings</title>
    <style>
        .table-centered {
            margin: 0 auto;
            border-collapse: collapse;
        }

        .table-bordered,
        td,
        th {
            border: 1px solid #ddd;
            padding: 2em;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>
    <?php include 'nav.php' ?>


    <div style="padding-top: 10em;" class="container">
        <h1 class="head" id="book">My Booking Details</h1>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        require_once "components/_dbconnect.php";
                        $userid = $_SESSION['userid'];
                        $sql = "SELECT id, name, email , number, date, time,fieldid,price,status FROM booking WHERE userid = '$userid'";
                        if ($result = mysqli_query($con, $sql)) {
                            if (mysqli_num_rows($result) > 0) {
                                echo '<table id="myTable" class="table table-bordered table-striped table-centered">';
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th>ID</th>";
                                echo "<th>Customer Name</th>";
                                echo "<th>Email</th>";
                                echo "<th>Phone</th>";
                                echo "<th>Date</th>";
                                echo "<th>Time</th>";
                                echo "<th>Field</th>";
                                echo "<th>Price</th>";
                                echo "<th>Status</th>";
                                echo "<th>Action</th>";
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
                                    echo "<td>Field-" . $row['fieldid'] . "</td>";
                                    echo "<td>" . $row['price'] . "</td>";
                                    echo "<td>" . $row['status'] . "</td>";
                                    echo "<td>";
                                    echo '<a href="components/delete.php?id=' . $row['id'] . '" title="Delete" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
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
    <div class="modal fade" id="successDeleteModal" tabindex="-1" role="dialog"
        aria-labelledby="successDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successDeleteModalLabel">Deletion Successful</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"
                        onclick="closesuccessDeleteModal()">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Record deleted successfully
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
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
        </script>
    <script src="scripts/modal.js"></script>
</body>

</html>