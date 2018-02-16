<!DOCTYPE html>
<html>
<head>
	<title> Home </title>

<link rel="stylesheet" type="text/css" href="themes/css/style.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
       
      

       <link rel="stylesheet" type="text/css" href="css/style.css">
       <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
       <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
       <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
       <script type="text/javascript" src="themes/js/saslideshow.js"></script>
<script type="text/javascript" src="themes/js/slideshow.js"></script>
<script src="js/jquery-1.5.min.js" type="text/javascript" charset="utf-8"></script>
<script src="vallenato/vallenato.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="vallenato/vallenato.css" type="text/css" media="screen" charset="utf-8">

        <script type="text/javascript">
        $("#slideshow > div:gt(0)").hide();

        setInterval(function() { 
          $('#slideshow > div:first')
            .fadeOut(1000)
            .next()
            .fadeIn(1000)
            .end()
            .appendTo('#slideshow');
        },  3000);

        //<![CDATA[

        /*
                A "Reservation Date" example using two datePickers
                --------------------------------------------------

                * Functionality

                1. When the page loads:
                        - We clear the value of the two inputs (to clear any values cached by the browser)
                        - We set an "onchange" event handler on the startDate input to call the setReservationDates function
                2. When a start date is selected
                        - We set the low range of the endDate datePicker to be the start date the user has just selected
                        - If the endDate input already has a date stipulated and the date falls before the new start date then we clear the input's value

                * Caveats (aren't there always)

                - This demo has been written for dates that have NOT been split across three inputs

        */

        function makeTwoChars(inp) {
                return String(inp).length < 2 ? "0" + inp : inp;
        }

        function initialiseInputs() {
                // Clear any old values from the inputs (that might be cached by the browser after a page reload)
                document.getElementById("sd").value = "";
                document.getElementById("ed").value = "";

                // Add the onchange event handler to the start date input
                datePickerController.addEvent(document.getElementById("sd"), "change", setReservationDates);
        }

        var initAttempts = 0;

        function setReservationDates(e) {
                // Internet Explorer will not have created the datePickers yet so we poll the datePickerController Object using a setTimeout
                // until they become available (a maximum of ten times in case something has gone horribly wrong)

                try {
                        var sd = datePickerController.getDatePicker("sd");
                        var ed = datePickerController.getDatePicker("ed");
                } catch (err) {
                        if(initAttempts++ < 10) setTimeout("setReservationDates()", 50);
                        return;
                }

                // Check the value of the input is a date of the correct format
                var dt = datePickerController.dateFormat(this.value, sd.format.charAt(0) == "m");

                // If the input's value cannot be parsed as a valid date then return
                if(dt == 0) return;

                // At this stage we have a valid YYYYMMDD date

                // Grab the value set within the endDate input and parse it using the dateFormat method
                // N.B: The second parameter to the dateFormat function, if TRUE, tells the function to favour the m-d-y date format
                var edv = datePickerController.dateFormat(document.getElementById("ed").value, ed.format.charAt(0) == "m");

                // Set the low range of the second datePicker to be the date parsed from the first
                ed.setRangeLow( dt );
                
                // If theres a value already present within the end date input and it's smaller than the start date
                // then clear the end date value
                if(edv < dt) {
                        document.getElementById("ed").value = "";
                }
        }

        function removeInputEvents() {
                // Remove the onchange event handler set within the function initialiseInputs
                datePickerController.removeEvent(document.getElementById("sd"), "change", setReservationDates);
        }

        datePickerController.addEvent(window, 'load', initialiseInputs);
        datePickerController.addEvent(window, 'unload', removeInputEvents);

        //]]>
        </script> 
</head>
<body>

    <div id="wrapper">
       <?php include 'nav.php'; ?>

    <div id="content">
        <div id="rotator">
            <div class="col-sm-12">
                <div class="col-sm-5"></div>
                <div class="col-sm-7">
                    <ul>
                    <li class="slideshow"><img src="themes/images/img-slide/01.jpg"/></li>
                    <li class="slideshow"><img src="themes/images/img-slide/02.jpg"/></li>
                    <li class="slideshow"><img src="themes/images/img-slide/03.png"/></li>
              </ul>
                </div>
                
            </div>
            <div class="col-sm-12">
                <div class="col-sm-3"></div>
                <div id="logo" style="left: 600px; height: auto; top: 23px; width: 260px; position: absolute; z-index:4;">
                    
                    <h2 class="accordion-header" style="height: 18px; margin-bottom: 15px; color: rgb(255, 255, 255); background: none repeat scroll 0px 0px rgb(53, 48, 48);">Ticket Booking</h2>
                    <div class="accordion-content" style="margin-bottom: 15px;">
                        <form action="selectset.php" method="post" style="margin-bottom:none;">
                        <span style="margin-right: 11px;">Select Route: 
                        <select name="route" style="width: 191px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;"/>
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
                        </span><br>
                        <span style="margin-right: 11px;">Date: 
                        <input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" name="date" id="sd" value="" maxlength="10" readonly="readonly" style="width: 165px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;"/>
                        </span><br>
                        <span style="margin-right: 11px;">No. of Passenger: 
                        <select name="qty" style="width: 191px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;">
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
                        </span><br><br>
                        <input type="submit" id="submit" value="Next" style="height: 34px; margin-left: 15px; width: 191px; padding: 5px; border: 3px double rgb(204, 204, 204);" />
                        </form>
                    </div>
                    <h2 class="accordion-header" style="height: 18px; margin-bottom: 15px; color: rgb(255, 255, 255); background: none repeat scroll 0px 0px rgb(53, 48, 48);">Admin Login</h2>
                    <div class="accordion-content" style="margin-bottom: 15px;">
                        <form action="login.php" method="post" style="margin-bottom:none;">
                        <span style="margin-right: 11px;">Username: <input type="text" name="username" style="width: 165px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;"/></span><br>
                        <span style="margin-right: 11px;">Password: <input type="password" name="password" style="width: 165px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;"/></span><br><br>
                        <input type="submit" id="submit" class="medium gray button" value="Login" style="height: 34px; margin-left: 15px; width: 191px; padding: 5px; border: 3px double rgb(204, 204, 204);" />
                        </form>
                    </div>
                </div>
        </div>
        <div class="col-sm-2"></div>>
            </div>
              
              
        
    </div>

    <div class="col-sm-12">
    <div class="col-sm-3">Hello</div>
    <div class="col-sm-5"> hi jhddkjsjf sdk</div>
    <div class="col-sm-3">test test</div>
    </div>
    <div id="footer">
    <h4>+63(2)3525393 &bull; <a href="contact-us.php">Barangay West Kamias, Cubao, Quezon City, Metro Manila  </a></h4>
    <p>Hours of Operation&nbsp;&nbsp;&bull;&nbsp;&nbsp;Mon - Sun: 10:00 am - 12:00 am</p>
    <p>&copy; Copyright 2013 Florida Bus | All Rights Reserved <br /></p>
</div>
</div>

	   <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
       <script type="text/javascript" src="js/tether.min.js"></script>
       <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-datetimepicker.js"></script>




</body>
</html>