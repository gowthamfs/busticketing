<?php

include("includes/header.php");
include("../middleWare/middlewareAdmin.php");

?>


<style>
  h2{
    border-bottom: 2px solid #D6D6D6;
  }
</style>

<div class="container">
  <?php
  if (isset($_SESSION['message'])) {
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= $_SESSION['message']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    unset($_SESSION['message']);
  }
  ?>

  <h2 class="mt-3 py-3">Welcome to Bus Station Ticketing Booth System</h2>
</div>

<?php include('includes/footer.php') ?>