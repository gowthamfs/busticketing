<?php
  
  $con = mysqli_connect("localhost", "root", " ", "busticket");
  if(!$con){
    die ("connection failed: ". mysqli_connect_error());
  }

?>