<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Welcome <b><?php echo htmlspecialchars($_SESSION["username"]); ?> </b>to e-store</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="welcome.php">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="shopping-cart.php">Shopping cart</a>
      </li>
     
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </form>
  </div>
</nav>