<nav
  class="navbar d-flex align-items-center justify-content-between navbar-expand-lg navbar-dark text-white bg-dark px-5">
  <div class="logo">
    <a class="navbar-brand" href="index.php">Ticketing</a>
  </div>
  <div class="menu">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="display.php">Users</a>
        </li> -->

        <?php
        if (isset($_SESSION['auth'])) {
          ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <?= $_SESSION['auth_user']['name']; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">View Profile</a>
              <a class="dropdown-item" href="#">Edit Profile</a>
              <a class="dropdown-item" href="logout.php">Log Out</a>
            </div>
          </li>
          <?php
        } else {
          ?>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <?php
        }
        ?>
      </ul>
    </div>
  </div>
</nav>