<?php include_once('server.php') ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Registration</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <div class="header">
            <h2>Grab Bus Registration</h2>
        </div>

        <form method="post" action="register.php">
            <?php include('errors.php'); ?>
                <div class="input-group">
                    <label>First Name</label>
                    <input type="text" name="fname" value="<?php echo $fname; ?>">
                </div>
                <div class="input-group">
                    <label>Last Name</label>
                    <input type="text" name="lname" value="<?php echo $lname; ?>">
                </div>

                <div class="input-group">
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo $email; ?>">
                </div>
                <div class="input-group">
                    <label>Mobile No</label>
                    <input type="text" name="mobile" value="<?php echo $mobile; ?>">
                </div>
                <div class="input-group">
                    <label>Address</label>
                    <input type="text" name="address" value="<?php echo $address; ?>">
                </div>

                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="password_1">
                </div>
                <div class="input-group">
                    <label>Confirm password</label>
                    <input type="password" name="password_2">
                </div>
                <div class="input-group">
                    <button type="submit" class="btn" name="reg_user">Register</button>
                </div>
                <p>
                    Already a member? <a href="login-user.php">Sign in</a>
                </p>
        </form>
    </body>

    </html>