<?php
session_start();
include("includes/header.php") ?>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <?php
      if (isset($_SESSION['message'])) {
        ?>
              <div class="col-md-8 d-flex justify-content-between alert alert-success alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        <?php
        unset($_SESSION['message']);
      }
      ?>
    </div>
  </div>
</div>



<div class="container">
  <h1>Bus Booking Ticketing</h1>
  <button class="btn btn-primary mt-5">Testing</button>
</div>

<?php include("includes/footer.php") ?>