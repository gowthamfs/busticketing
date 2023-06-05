<?php

include('../config/dbcon.php')

    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Edition Page</title>
</head>

<body>


    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "SELECT * FROM location_list WHERE id = $id";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_array($result);
            ?>
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3>Location Details</h3>
                            </div>
                            <div class="card-body">
                                <?= "Location: " . $data['location']; ?> <br>
                                <?= "Status: " . ($data['status'] == 0 ? 'Active' : 'Inactive'); ?> <br>
                                <button class="btn btn-primary mt-3" onclick="goBack()">Go Back</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }

    ?>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</body>

</html>


<?php
include("includes/footer.php");
?>