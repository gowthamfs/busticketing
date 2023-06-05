<?php

session_start();
if(isset($_SESSION['auth'])){
    
    $_SESSION['message'] = "You are Already Login";
    header('Location: index.php');
    exit();
}

include("includes/header.php");
include("./config/dbcon.php");
?>
    

    <div class="py-5">
        <div class="container">
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

                    <div class="card">
                        <div class="card-header">
                            <h2>Login Form</h2>
                        </div>
                        <div class="card-body">
                            <form action="./functions/authcode.php" method="POST" autocomplete="off">
                                <div class="form-group mb-3">
                                    <label class="form-label">User Name</label>
                                    <input type="text" class="form-control" id="username" placeholder="Enter username"
                                        name="username" Required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password"
                                        placeholder="Enter password" name="password" Required>
                                </div>
                                <button type="submit" name="login-btn" class="btn btn-primary">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php include("includes/footer.php") ?>