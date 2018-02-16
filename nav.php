<head>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script type="text/javascript" src="themes/js/grabbus.js"></script>

</head>

<body id="home-page">
</body>
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

            <ul class="navbar-nav mr-auto">
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

            <!-- Button trigger modal -->
            <a class="btn btn-sign customer-login" href="login-user.php">
            Customer Login
          </a>
            <br>
            <div class="">
                <form action="login.php" method="post">
                    <span class="login" id="login">Username: <input class="username-password" type="text" name="username" required="required" /></span>
                    <span class="login" id="login1">Password: <input class="username-password" type="password" name="password" required="required" /></span>
                    <input type="submit" id="admin-login" class="admin-login" value="Admin Login" />

                    <div>
                        <!--                           medium gray button
 -->
                    </div>
                </form>
            </div>

        </div>

    </nav>
</div>