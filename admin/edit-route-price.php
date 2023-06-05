<?php
session_start();
include('./includes/header.php');
include('../config/dbcon.php');
include('../functions/myfunctions.php');
include('./code.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <title>Edition Page</title>
</head>

<body>

    <?php

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $users = getById("routes_price_list", $id);
        if (mysqli_num_rows($users) > 0) {
            $data = mysqli_fetch_array($users);
            ?>
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-4">


                        <div class="card">
                            <div class="card-header">
                                <h3>Edit Routes Price</h3>
                            </div>
                            <div class="card-body">
                                <div id="add-new-form">
                                
                                    <form method="POST" action="./code.php" autocomplete="off">
                                    <input type="hidden" name="data_id" value="<?= $data['id']; ?>">
                                        <div class="form-group my-3">
                                            <label for="departLocation">Current Location:</label>
                                            <select name="departLocation" id="departLocation" class="w-100">
                                            <option value="location1" <?php echo ($data['departLocation'] == 'location1') ? 'selected' : ''; ?>>Location 1</option>
                                            <option value="location2" <?php echo ($data['departLocation'] == 'location2') ? 'selected' : ''; ?>>Location 2</option>
                                            <option value="location3" <?php echo ($data['departLocation'] == 'location3') ? 'selected' : ''; ?>>Location 3</option>
                                            <option value="location4" <?php echo ($data['departLocation'] == 'location4') ? 'selected' : ''; ?>>Location 4</option>
                                            <option value="location5" <?php echo ($data['departLocation'] == 'location5') ? 'selected' : ''; ?>>Location 5</option>                                                
                                            </select>
                                        </div>

                                        <div class="form-group my-3">
                                            <label for="destination">Destination</label>
                                            <select name="destination" class="w-100">
                                                <option value="location100" <?php echo ($data['destination'] == 'location100') ? 'selected' : ''; ?>>Location 100</option>
                                                <option value="location101" <?php echo ($data['destination'] == 'location101') ? 'selected' : ''; ?>>Location 101</option>
                                                <option value="location102" <?php echo ($data['destination'] == 'location102') ? 'selected' : ''; ?>>Location 102</option>
                                                <option value="location103" <?php echo ($data['destination'] == 'location103') ? 'selected' : ''; ?>>Location 103</option>
                                                <option value="location104" <?php echo ($data['destination'] == 'location104') ? 'selected' : ''; ?>>Location 104</option>
                                                <option value="location105" <?php echo ($data['destination'] == 'location105') ? 'selected' : ''; ?>>Location 105</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="normalPrice">Normal Price:</label>
                                            <input type="number" name="normalPrice" value="<?= $data['normalPrice']; ?>" class="w-100 mb-4">
                                        </div>

                                        <div class="form-group">
                                            <label for="studentPrice">Student Price:</label>
                                            <input type="number" name="studentPrice" value="<?= $data['studentPrice']; ?>" class="w-100 mb-4">
                                        </div>

                                        <div class="form-group">
                                            <label for="seniorPrice">Senior Price:</label>
                                            <input type="number" name="seniorPrice" value="<?= $data['seniorPrice']; ?>" class="w-100 mb-4">
                                        </div>

                                        <div class="form-group mb-4">
                                            <select name="status" class="w-100">
                                            <option value="0" <?= ($data['status'] == '0') ? 'selected' : ''; ?>>Active</option>
                                                <option value="1" <?= ($data['status'] == '1') ? 'selected' : ''; ?>>Inactive</option>                          
                                                </select>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <button type="submit" name="save-route-list" id="save-btn">Save changes</button>
                                            <button type="button" name="delete-route-list" onclick="goBack()" id="close-btn">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
        }
    }

    ?>
           </div>
        </div>
    </div> 
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>


<?php include("includes/footer.php"); ?>
