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
    include('includes/header.php');
    include("../middleWare/middlewareAdmin.php");
    include('../functions/myfunctions.php');

    ?>


<style>
    .green{
        background: green;
        color:#fff;
        border:none;
        border-radius: 10px;
        padding: 5px 10px;
        margin: 10px 0 0 25px;
        font-size: 12px;
    }
    .red{
        background: red;
        color:#fff;
        border:none;
        border-radius: 10px;
        padding: 5px 10px;
        margin: 10px 0 0 25px;
        font-size: 12px;
    }
</style>



    <div class="row justify-content-center my-5">
        <div class="col-md-6">
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
                    <div class="list d-flex align-items-center justify-content-between">
                        <h5>Routes Price List</h5>
                        <button class="btn btn-dark" id="add-new-btn">Add New</button>
                        <div id="add-new-form" style="width:650px;">
                            <form action="./code.php" method="POST" autocomplete="off" id="form">
                                <input type="hidden" name="data_id" value="<?= $data['id']; ?>">
                                <div class="form-group">
                                    <label for="departLocation">Current Location</label>
                                    <select class="form-control" name="departLocation" required>
                                        <option value="location1">Location 1</option>
                                        <option value="location2">Location 2</option>
                                        <option value="location3">Location 3</option>
                                        <option value="location4">Location 4</option>
                                        <option value="location5">Location 5</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="destination">Destination </label>
                                    <select class="form-control" name="destination" required>
                                        <option value="location100">Location 100</option>
                                        <option value="location101">Location 101</option>
                                        <option value="location102">Location 102</option>
                                        <option value="location103">Location 103</option>
                                        <option value="location104">Location 104</option>
                                        <option value="location105">Location 105</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="normalPrice">Normal Price:</label>
                                    <input type="number" class="form-control" id="normalPrice" name="normalPrice"
                                        placeholder="Enter normal price">
                                </div>

                                <div class="form-group">
                                    <label for="studentPrice">Student Price:</label>
                                    <input type="number" class="form-control" id="studentPrice" name="studentPrice"
                                        placeholder="Enter student price">
                                </div>

                                <div class="form-group">
                                    <label for="seniorPrice">Senior Price:</label>
                                    <input type="number" class="form-control" id="seniorPrice" name="seniorPrice"
                                        placeholder="Enter senior price">
                                </div>

                                <div class="form-group">
                                    <label for="status">Status:</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                                <div class="save-close d-flex justify-content-between">
                                    <button type="submit" name="add-route-list"
                                        class="btn btn-success px-4">Save</button>
                                    <button class="btn btn-danger" type="button" id="close-btn">Close</button>
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
                                <th>Location From</th>
                                <th>Location To</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $sql = "SELECT * FROM routes_price_list";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($data = mysqli_fetch_array($result)) {

                                    ?>
                                    <tr>
                                        <td>
                                            <?= $data['id']; ?>
                                        </td>
                                        <td>
                                            <?= $data['departLocation']; ?>
                                        </td>
                                        <td>
                                            <?= $data['destination']; ?>
                                        </td>
                                        <td>
                                            <?= "Normal:" . $data['normalPrice']; ?> <br>
                                            <?= "Student:" . $data['studentPrice']; ?> <br>
                                            <?= "Senior:" . $data['seniorPrice']; ?>
                                        </td>

                                        <td class="justify-content-center">

                                            <?php
                                            if ($data['status'] == "0") {
                                                ?>
                                                <button class="green">
                                                    Active
                                                </button>

                                                <?php
                                            } else {
                                                ?>
                                                <button class="red">
                                                    Inactive
                                                </button>
                                                <?php
                                            }

                                            ?>
                                        </td>

                                        <td>

                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item"
                                                            href="edit-route-price.php?id=<?= $data['id']; ?>">Edit</a></li>
                                                    <li><a class="dropdown-item"
                                                            href="delete-route-price.php?id=<?= $data['id']; ?>">Delete</a></li>
                                                </ul>
                                            </div>
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