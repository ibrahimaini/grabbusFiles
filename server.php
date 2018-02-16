<?php
session_start();

// variable declaration
$fname = "";
$lname = "";
$email    = "";
$mobile = "";
$address = "";
$errors = array(); 
$_SESSION['success'] = "";

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'grab_bus');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled
  if (empty($fname)) { array_push($errors, "Fname is required"); }
  if (empty($lname)) { array_push($errors, "Lname is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($mobile)) { array_push($errors, "Mobile is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
  }

  // register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database
    $query = "INSERT INTO users (fname, lname, email, mobile,address, password) 
          VALUES('$fname', '$lname', '$email', '$mobile', '$address', '$password')";
    mysqli_query($db, $query);
    $_SESSION['email'] = $email;
    $_SESSION['success'] = "You are now logged in";
    header('location: profiles.php');
  }

}

// ... 

// LOGIN USER

if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['email'] = $email;
      // $_SESSION['success'] = "You are now logged in";
      header('location: profiles.php?user=');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

// Reservation details
if (isset($_POST['book'])) {
  // receive all input values from the form
  $from_station = mysqli_real_escape_string($db, $_POST['from-station']);
  $to_station = mysqli_real_escape_string($db, $_POST['to-station']);
  $travel_date = mysqli_real_escape_string($db, $_POST['travel-date']);
  $return_date = mysqli_real_escape_string($db, $_POST['return-date']);
  $seats_total = mysqli_real_escape_string($db, $_POST['seats-total']);

  // form validation: ensure that the form is correctly filled
  if (empty($from_station)) { array_push($errors, "Start point is required"); }
  if (empty($to_station)) { array_push($errors, "Destination is required"); }
  if (empty($travel_date)) { array_push($errors, "Travel date is required"); }
  if (empty($return_date)) { array_push($errors, "Return date is required"); }
  if (empty($seats_total)) { array_push($errors, "Number of total seats are required"); }

  // register user if there are no errors in the form
  if (count($errors) == 0) {
    $query = "INSERT INTO reservation (from_station, to_station, travel_date, seats_total,reserved_seats, return_date) 
          VALUES('$from_station', '$to_station', '$travel_date', '$seats_total', '$reserved_seats', '$return_date')";
    mysqli_query($db, $query);
    $_SESSION['success'] = "Booking details";
    header('location: bookingdetails.php');
  }

}

?>