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
    <title>Edition Page</title>
</head>

<body>

    <?php  

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $users = getById("user_list", $id);
        if (mysqli_num_rows($users) > 0) {
            $data = mysqli_fetch_array($users);
            ?>
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3>Edit Users</h3>
                            </div>
                            <div class="card-body">
                                <div id="add-new-form">
                                    <form method="POST" action="./code.php" autocomplete="off">
                                        <input type="hidden" name="data_id" value="<?= $data['id']; ?>">
                                        <label for="full-name">Full Name</label>
                                        <input type="text" id="full-name" value="<?= $data['full_name']; ?>" class="w-100 mb-4"
                                            name="full_name" required>
                                        <label for="user-name">User Name</label>
                                        <input type="text" id="user-name" value="<?= $data['user_name']; ?>" class="w-100"
                                            name="user_name" required>
                                        <div class="form-group mt-4">
                                            <label for="type">Type:</label>
                                            <select name="type" class="w-100">
                                                <option value="admin" <?php echo ($data['type'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                                                <option value="cashier" <?php echo ($data['type'] == 'cashier') ? 'selected' : ''; ?>>Cashier</option>
                                            </select>

                                        </div>

                                        <div class="form-group my-4">
                                            <label for="location">Current Location:</label>

                                            <select name="location" class="w-100">
                                                <option value="location1" <?php echo ($data['location'] == 'location1') ? 'selected' : ''; ?>>Location 1</option>
                                                <option value="location2" <?php echo ($data['location'] == 'location2') ? 'selected' : ''; ?>>Location 2</option>
                                                <option value="location3" <?php echo ($data['location'] == 'location3') ? 'selected' : ''; ?>>Location 3</option>
                                                <option value="location4" <?php echo ($data['location'] == 'location4') ? 'selected' : ''; ?>>Location 4</option>
                                                <option value="location5" <?php echo ($data['location'] == 'location5') ? 'selected' : ''; ?>>Location 5</option>
                                            </select>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <button type="submit" name="save-changes" id="save-btn">Save changes</button>
                                            <button type="button" name="close-btn" onclick="goBack()" id="close-btn">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        } else {
            echo "users not found";
        }

    } else {
        echo "ID missing from url";
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