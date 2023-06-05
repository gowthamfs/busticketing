<?php

session_start();
if (isset($_SESSION['auth'])) {

    $_SESSION['message'] = "You are Already Register";
    header('Location: index.php');
    exit();
}
include("includes/header.php");
include("./config/dbcon.php");
?>

<!DOCTYPE html>
<html lang="en">

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<title>sample Operation</title>
</head>

<body>

    <div class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">

                    <?php
                    if (isset($_SESSION['message'])) {
                        ?>
                        <div class="toast align-items-center text-bg-primary border-0" role="alert" aria-live="assertive"
                            aria-atomic="true">
                            <div class="d-flex">
                                <div class="toast-body">
                                    Hello, world! This is a toast message.
                                </div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                        <?php
                    }
                    ?>





                    <div class="card">
                        <div class="card-header">
                            <h2>Registration Form</h2>
                        </div>
                        <div class="card-body">
                            <form action="./functions/authcode.php" method="POST" autocomplete="off">
                                <div class="form-group mb-3">
                                    <label class="form-label">User name</label>
                                    <input type="text" class="form-control" id="username" placeholder="Enter username"
                                        name="username" Required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="username"
                                        placeholder="Enter phone number" name="phone" Required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter email"
                                        name="email" Required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password"
                                        placeholder="Enter password" name="password" Required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Confirm password</label>
                                    <input type="password" class="form-control" id="confirm_password"
                                        placeholder="Confirm password" name="cpassword" Required>
                                </div>
                                <button type="submit" name="submit-btn" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNSBp0w"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

</body>

</html>


<?php include("includes/footer.php") ?>