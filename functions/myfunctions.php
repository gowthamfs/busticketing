<?php
    include('../config/dbcon.php');


    function getById($table, $id){
        global $con;
        $query = "SELECT * FROM $table WHERE id= '$id' ";
        return $query_run = mysqli_query($con, $query);
    }

?>