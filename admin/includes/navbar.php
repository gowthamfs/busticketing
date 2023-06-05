<?php
// session_start();

include("../config/dbcon.php");
include("../functions/authcode.php");


?>


<style>
  .active{
    border-bottom: 2px solid #000;
  }
</style>

<?php


// Get current page name from URL
$pageName = basename($_SERVER['PHP_SELF'], ".php");
 // Create an array of page names and their respective CSS classes
$navClasses = array(
  "index" => "",
  "routes-price-list" => "",
  "ticketing" => "",
  "report" => "",
  "users" => "",
  "main" => ""

);
 // Check if current page exists in the array
if (array_key_exists($pageName, $navClasses)) {
  // Set active class to current page link
  $navClasses[$pageName] = "active";
}

?>

<div class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse d-flex justify-content-between mx-5" id="navbarNav">
 
    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?php echo $navClasses["index"]; ?>" href="./index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $navClasses["routes-price-list"]; ?>" href="./routes-price-list.php">Routes Price List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $navClasses["ticketing"]; ?>" href="./ticketing.php">Ticketing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $navClasses["report"]; ?>" href="./report.php">Report</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $navClasses["users"]; ?>" href="./users.php">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $navClasses["main"]; ?>" href="./main.php">Maintenance</a>
        </li>
      </ul>

    <?php
    if (isset($_SESSION['auth'])) {
      if ($_SESSION['role_as'] == 1) {
        ?>
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" id="adminDropdown" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <?= $_SESSION['auth_user']['name'] ?>
          </button>
          <div class="dropdown-menu" aria-labelledby="adminDropdown">
            <a class="dropdown-item" href="#">View Profile</a>
            <a class="dropdown-item" href="#">Edit Profile</a>
            <a class="dropdown-item" href="../logout.php">Logout</a>
          </div>
        </div>
        <?php
      }
    }
    ?>

  </div>
</div>

