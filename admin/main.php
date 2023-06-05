<!DOCTYPE html>
<html>

<head>
    <title>Users</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/users.css">
</head>
</head>

<body>


    <?php
    session_start();
    include("../middleWare/middlewareAdmin.php");
    include('includes/header.php');
    include('../functions/myfunctions.php');
   

    ?>

    <style>
        .details {
            color: #6c757d;
        }

        .edit {
            color: #007bff;
        }

        button {
            background: transparent;
            border: none;
        }

        .delete {
            color: red;
        }
    </style>




    <div class="row justify-content-center my-3">
        <div class="col-md-4">
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
                <div class="card-header">
                    <h3>Maintenance</h3>
                    <div class="list d-flex align-items-center justify-content-between">
                        <h5>Location List</h5>
                        <i class="fa-solid fa-square-plus h3" id="add-new-btn"></i>

                        <div id="add-new-form" style="width:450px;">
                            <form action="./code.php" method="POST" autocomplete="off" id="form">
                                <input type="hidden" name="data_id" value="<?= $data['id']; ?>">
                                <label for="location" class="mb-1">Location</label>
                                <input type="text" id="location" name="location" required>
                                <label for="status" class="mb-1">Status</label>
                                <select id="status" name="status" class="w-100 mb-5">
                                    <option value="0">Active</option>
                                    <option value="1">Inactive</option>
                                </select>
                                <div class="button d-flex justify-content-between">
                                    <button type="submit" name="add-location" id="save-btn">Save</button>
                                    <button type="button" id="close-btn">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped" id="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Details</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $sql = "SELECT * FROM location_list";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($data = mysqli_fetch_array($result)) {
                                   
                                    ?>



                                    <tr>
                                        <td>
                                            <?= $data['id']; ?>
                                        </td>
                                        <td>
                                            <?= $data['location']; ?>
                                        </td>
                                        <td>
                                            <?= ($data['status'] == '0') ? 'Active' : 'Inactive'; ?>
                                        </td>
                                        <td>
                                            <a href="details.php?id=<?= $data['id']; ?>">
                                                <i class="fa-solid fa-circle-info details"></i>
                                            </a>
                                        </td>

                                        <td>
                                            <a href="edit-details.php?id=<?= $data['id']; ?>">
                                                <i class="fa-solid fa-pen-to-square edit"></i>
                                            </a>
                                        </td>

                                        <td>
                                            <a href="delete-details.php?id=<?= $data['id']; ?>">
                                                <i class="fa-solid fa-trash delete edit"></i>
                                            </a>
                                        </td>

                                    </tr>
                                    <?php
                                }
                            }
                            
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <div id="overlay"></div>

    <script src="./assets/js/users.js"></script>


</body>

</html>

<?php include('includes/footer.php'); ?>