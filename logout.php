<?php 
session_start();
include("includes/header.php");
include("./config/dbcon.php");

    if(isset($_SESSION['auth'])){
      unset($_SESSION['auth']);  
      unset($_SESSION['auth_user']);
      
      $_SESSION['message'] = "Logged Out Successfully";
      
    } 
    header('Location: login.php');
?>