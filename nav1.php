<!-- <?php 
  session_start(); 

  if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("location: login.php");
  }
?> -->
<div class="col-lg-12 nav-container">
    <!-- *******  THE NAV BAR    ****** -->
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded my-nav">
        <button class="navbar-toggler navbar-toggler-right menu-icon" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars" aria-hidden="true"></i></button>

        <a class="navbar-brand" href="index.php">
            <img src="pics/grabbus.png" width="80" class="d-inline-block align-top" alt="" href="index.php">

            <!--  Text beside logo -->
        </a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

            <ul class="navbar-nav col-sm-8">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="promotion.php">Promotion</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="about.php">About </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0">
                <div class="content">
                    <!-- notification message -->
                    <?php if (isset($_SESSION['success'])) : ?>
                        <div class="error success">
                            <h3>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </h3>
                        </div>
                        <?php endif ?>

                            <!-- logged in user information -->
                            <?php  if (isset($_SESSION['email'])) : ?>
                                <p>Welcome <strong><?php echo $_SESSION['email']; ?></strong></p>
                </div>
                <div class="col-sm-1"></div>
                <div class="dropdown">
                    <i class="fa fa-user-circle-o dropdown-toggle" aria-hidden="true" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                    <div class="dropdown-menu user-info" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="profile.php">Profile</a>
                        <a class="dropdown-item" href="index.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
                        <?php endif ?>
                    </div>
                </div>

            </form>
        </div>
    </nav>
</div>