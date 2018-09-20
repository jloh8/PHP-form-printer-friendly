<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$product   = "";
$service = "";
$description = "";
$location = "";


$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'jjl21229_jeff', 'lobster8', 'jjl21229_database');



// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  // header('location: index.php');
        header('Location: database.php');

  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}


//database
if (isset($_POST['input_data'])){
  $product = mysqli_real_escape_string($db, $_POST['product']);
  $service = mysqli_real_escape_string($db, $_POST['service']);
  $description = mysqli_real_escape_string($db, $_POST['description']);
  $location = mysqli_real_escape_string($db, $_POST['location']);
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($product)) {
    array_push($errors, "product is required");
  }
  if (empty($service)) {
    array_push($errors, "service is required");
  }
  if (empty($description)) {
    array_push($errors, "description is required");
  }

  if (count($errors) == 0) {
    $query = "INSERT INTO time1 (product, service, description, day)
        VALUES('$product', '$service', '$description', NOW())"; //variables created targetting user input
        mysqli_query($db, $query);
        header('Location: print.php');

} else
  array_push($errors, "Wrong username/password combination");
  }

// database1



?>
