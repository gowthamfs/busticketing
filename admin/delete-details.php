<?php

include("includes/header.php");
include('../config/dbcon.php');
include('../functions/myfunctions.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <title>Delete Details Page</title>
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
                                <h3 class="text-center">Are you sure to delete?</h3>
                            </div>
                            <div class="card-body m-auto">
                                <?= "Location: " . $data['location']; ?> <br>
                                <?= "Status: " . ($data['status'] == 0 ? 'Active' : 'Inactive'); ?> <br>

                                <div class="d-flex justify-content-between mt-5">
                                    <button type="button" name="close-btn" class="btn btn-success" onclick="goBack()">Cancel</button>
                                    <form action="code.php" method="post">
                                        <input type="hidden" name="data_id" value="<?=  $data['id']; ?>">
                                        <button type="submit" class="btn btn-danger" name="delete-detail">Delete</button>
                                    </form>
                                </div>


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