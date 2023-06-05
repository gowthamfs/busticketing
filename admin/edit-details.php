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
        $users = getById("location_list", $id);
        if (mysqli_num_rows($users) > 0) {
            $data = mysqli_fetch_array($users);
            ?>
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3>Edit List</h3>
                            </div>
                            <div class="card-body">
                                <div id="add-new-form">
                                    <form method="POST" action="./code.php" autocomplete="off">
                                        <input type="hidden" name="data_id" value="<?= $data['id']; ?>">
                                        <label for="full-name">Full Name</label>
                                        <input type="text" name="location" value="<?= $data['location']; ?>" class="w-100 mb-4"
                                            name="full_name" required>
                                        <div class="form-group">
                                            <label for="status">Status:</label>
                                            <select name="status" class="w-100">
                                                <option value="0" <?= ($data['status'] == '0') ? 'selected' : ''; ?>>Active</option>
                                                <option value="1" <?= ($data['status'] == '1') ? 'selected' : ''; ?>>Inactive</option>
                                            </select>

                                        </div>
                                        <div class="d-flex justify-content-between mt-5">
                                            <button type="submit" name="save-details" id="save-btn">Save changes</button>
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