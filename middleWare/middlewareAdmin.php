<?php

    if(isset($_SESSION['auth'])){

        if($_SESSION['role_as'] == 0 ){
        $_SESSION['message'] = "You are not authorized access to this page";
        header("Location: ../index.php");
        
        }

    } else {
        $_SESSION['message'] = "Login to continue";
        header("Location: ../login.php");
    }

?>