<!DOCTYPE html>
<html>

<head>
    <title>Users</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


</head>
</head>

<body>




    <?php
    // session_start();
    include('includes/header.php');
    include('../functions/myfunctions.php');
    include('./code.php');

    ?>




    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <?php
                if (isset($_SESSION['message'])) {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                    unset($_SESSION['message']);
                }
                ?>

                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3>Report</h3>
                    </div>




                    <div class="card-body">
                        <form action="./code.php" method="post" class="d-flex justify-content-between">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Ticket Number</th>
                                        <th>Route</th>
                                        <th>Passenger Type</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM ticketing";
                                    $result = mysqli_query($con, $query);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?= $row['id']; ?>
                                                </td>

                                                <td>
                                                    <?= $row['created_at']; ?>
                                                </td>

                                                <td>Ticket No</td>

                                                <td>
                                                    <?= $row['depart_location']; ?>
                                                    <?= $row['destination']; ?>
                                                </td>

                                                <?php

                                                $amounts = [
                                                    "New York-London" => 100,
                                                    "New York-Paris" => 120,
                                                    "New York-Tokyo" => 150,
                                                    "New York-Sydney" => 180,
                                                    "New York-Dubai" => 200,
                                                    "Los Angeles-London" => 120,
                                                    "Los Angeles-Paris" => 140,
                                                    "Los Angeles-Tokyo" => 170,
                                                    "Los Angeles-Sydney" => 200,
                                                    "Los Angeles-Dubai" => 220,
                                                    "Chicago-London" => 110,
                                                    "Chicago-Paris" => 130,
                                                    "Chicago-Tokyo" => 160,
                                                    "Chicago-Sydney" => 190,
                                                    "Chicago-Dubai" => 210,
                                                    "Houston-London" => 90,
                                                    "Houston-Paris" => 110,
                                                    "Houston-Tokyo" => 140,
                                                    "Houston-Sydney" => 170,
                                                    "Houston-Dubai" => 190,
                                                    "Miami-London" => 80,
                                                    "Miami-Paris" => 100,
                                                    "Miami-Tokyo" => 130,
                                                    "Miami-Sydney" => 160,
                                                    "Miami-Dubai" => 180
                                                ];

                                               

                                                // $location = NewYork-London;
                                                // $destination = London;
                                                $normal = $row['normal']; // replace with the actual number of normal tickets
                                                $student = $row['student']; // replace with the actual number of student tickets
                                                $senior = $row['senior']; // replace with the actual number of senior tickets
                                        
                                                $amount = intval($row['depart_location']) - intval($row['destination']);
                                                $total = $normal * $amount + $student * $amount * 0.8 + $senior * $amount * 0.6;
                                                $totalPrice = number_format($total);

                                                ?>

                                                <td>

                                                    <?= "Normal: " . $normal; ?> <br>
                                                    <?= "Student: " . $student; ?> <br>
                                                    <?= "Senior: " . $senior; ?>
                                                </td>

                                                <td>
                                                    <?= "$" . $totalPrice; ?>
                                                </td>

                                            </tr>

                                        </tbody>
                                        <?php
                                        }
                                    }
                                    ?>

                            </table>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>



<?php include('includes/footer.php'); ?>