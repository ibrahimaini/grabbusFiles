<?php
    //Start session
    session_start();

    //Unset the variables stored in session
    unset($_SESSION['SESS_MEMBER_ID']);
?>
    <!DOCTYPE html PUBLIC>

    <head>
        <title>Grab Bus</title>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="themes/css/style.css" />

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <!--         <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
        <link href="css/demo.css" rel="stylesheet" type="text/css" />
        <link href="css/datepicker.css" rel="stylesheet" type="text/css" />

        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/tether.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script type="text/javascript" src="js/datepicker.js"></script>
        <script type="text/javascript" src="themes/js/saslideshow.js"></script>
        <script type="text/javascript" src="themes/js/slideshow.js"></script>
        <script type="text/javascript" src="themes/js/grabbus.js"></script>

    </head>

    <body>
        <div id="wrapper">
            <?php include 'nav.php'; ?>

                <div id="content">
                    <div id="rotator">
                        <div class="col-sm-12" style="margin-bottom: 37%;">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                                <ul>
                                    <li class="slideshow"><img src="themes/images/img-slide/01.jpg" / class="slide-img"></li>
                                    <li class="slideshow"><img src="themes/images/img-slide/02.jpg" / class="slide-img"></li>
                                    <li class="slideshow"><img src="themes/images/img-slide/03.jpg" / class="slide-img"></li>
                                </ul>
                            </div>

                        </div>

                        <div class="book">
                            <h2 class="book-title">Book Your Ticket Now</h2>
                        </div>
                        <form action="selectset.php" method="post" name="next" id="next">
                            <div style="text-align: center;">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2" checked="checked"> One Way </label>
                                <label class="form-check-label pr-2">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1"> Return </label>

                            </div>
                            <div style="text-align: center;">
                                <div class="book-padding">
                                    <span>Select Route: 
                        <select name="route" class="book-details" />
                        <?php
                        include('db.php');
                        $result = mysql_query("SELECT * FROM route");
                        while($row = mysql_fetch_array($result))
                            {
                                echo '<option value="'.$row['id'].'">';
                                echo $row['route'].'  :'.$row['type'].'  :'.$row['time'];
                                echo '</option>';
                            }
                        ?>
                        </select>
                        </span>
                                </div>
                                <div class="book-padding">
                                    <span>No. of Passenger: 
                        <select name="qty" class="book-details">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        </select>
                        </span>
                                </div>
                                <span>Departure Date: 
                        <input type="text" class="format-d-m-y highlight-days-67 range-low-today book-details" name="departure_date" id="departure-date" value="" maxlength="10" placeholder="Departure Date" required="required" />
                        </span>
                            </div>
                            <div id="return-date" class="return-date" style="text-align: center;">

                                <span>Return Date: 
                        <input type="text" class="format-d-m-y highlight-days-67 range-low-today book-details" name="return_date" id="return-dates" value="" maxlength="10" placeholder="Return Date" required="required" />
                        </span>
                            </div>

                            <div style="text-align: center;">
                                <input type="submit" id="submit" class="proceed-button" value="Next" />
                            </div>

                        </form>
                    </div>
                </div>
        </div>

        </div>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <div id="footer" style="text-align: center;">
            <br>
            <br>
            <p class="footer">&copy; Copyright........ All Rights Reserved for Grabbus Sdn Bhd
                <br />
            </p>
        </div>
        </div>

    </body>

    </html>