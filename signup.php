<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"]=="POST"){

  include 'partials/_dbconnect.php';
  $username = $_POST["username"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];
  $name = $_POST["name"];
  $phno = $_POST["contact"];
  $address = $_POST["address"];

  $exists=false;
  if(($password == $cpassword) && $exists==false) {
    //$sql = "INSERT INTO `admins`(`id`, `password`, `name`, `phno`, `address`) VALUES ('$username','$password','$name','$phno','$address')";
    $sql="CALL `SP_insertAtSignup`('$username','$password','$name','$phno','$address')";
    $result=mysqli_query($conn,$sql);
    if ($result){
      $showAlert =true;
    }
  }else{
    $showError="Passwords do not match";
  }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
  <?php require 'partials/_nav.php'?>
  <?php
  if($showAlert){
    echo'
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!!!</strong> You can now login to main page 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  if($showError){
    echo'
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!!!</strong>'.$showError.'  
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  ?>
    <div class="container">
        <h1 class="text-center">Sign Up to our Website</h1>
        <form action="/Plate_Management/signup.php" method="post">
        <div class="mb-3">
            <label for="username" class="form-label" >Username</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="pswd" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-1">
            <label for="cpswd" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="cpasswod" name="cpassword">
        </div>
            <div class="mb-1" id="emailHelp" class="form-text">Make sure you enter the same password.
        </div>
        <div class="mb-3">
            <label for="username" class="form-label" >Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label" >Contact Number</label>
            <input type="number" class="form-control" id="contact" name="contact" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label" >Address</label>
            <input type="text" class="form-control" id="address" name="address" aria-describedby="emailHelp">
        </div>
        

        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  </body>
</html>


