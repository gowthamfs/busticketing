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
    include("includes/header.php");
    include("../functions/authcode.php");
    ?>

    <div class="row justify-content-center">
        <div class="col-md-5">
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

            <div class="card my-3">
                <div class="card-header d-flex justify-content-between">
                    <h3>Add List</h3>
                    <button class="border-0 bg-dark text-white rounded" id="add-new-btn">Add New</button>

                    <div id="add-new-form" style="width:450px;">
                        <form action="./code.php" method="POST" autocomplete="off">
                            <label for="full-name">Full Name</label>
                            <input type="text" id="full-name" name="full_name" required>
                            <label for="user-name">User Name</label>
                            <input type="text" id="user-name" name="user_name" required>
                            <div class="form-group mt-4">
                                <label for="user-type">Type:</label>
                                
                                <select id="user-type" name="type" class="w-100" required>
                                    <option value="admin">Admin</option>
                                    <option value="cashier">Cashier</option>
                                </select>


                                
                            </div>
                            <div class="form-group my-4">
                                <label for="location">Location:</label>
                                <select id="location" name="location" class="w-100" required>
                                    <option value="location1">Location 1</option>
                                    <option value="location2">Location 2</option>
                                    <option value="location3">Location 3</option>
                                    <option value="location4">Location 4</option>
                                    <option value="location5">Location 5</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" name="add-user" id="save-btn">Add User</button>
                                <button type="button" id="close-btn">Close</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Full Name</th>
                                <th>User name</th>
                                <th>Type</th>
                                <th>Location</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $query = "SELECT * FROM user_list";
                            $result = mysqli_query($con, $query);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $row['id']; ?>
                                        </td>
                                        <td>
                                            <?= $row['full_name']; ?>
                                        </td>
                                        <td>
                                            <?= $row['user_name']; ?>
                                        </td>
                                        <td>
                                            <?= $row['type']; ?>
                                        </td>
                                        <td>
                                            <?= $row['location']; ?>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="edit-users.php?id=<?=  $row['id']; ?>">Edit</a>
                                                    <form action="code.php" method="post">
                                                        <input type="hidden" name="data_id" value="<?=  $row['id']; ?>">
                                                        <button class="dropdown-item" name="delete-btn">Delete</button>
                                                    </form>
                                                </div>
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

            <div id="overlay"></div>



            <script src="./assets/js/users.js"></script>

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <!-- Popper.js CDN Link -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <!-- Bootstrap JS CDN Link -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>