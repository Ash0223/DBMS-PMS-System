<?php
session_start();
include 'partials/_dbconnect.php';
$username=$_SESSION['username'];
if($_SERVER["REQUEST_METHOD"]=="POST"){

  include 'partials/_dbconnect.php';
  $name = $_POST["name"];
  $phno = $_POST["contact"];
  $address = $_POST["address"];
  $sql = "UPDATE `users` SET `name`='$name',`phno`='$phno',`address`='$address' WHERE id='$username'";
  $result=mysqli_query($conn,$sql);
}


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
  <?php require 'partials/_nav.php'?>
 
     <div class="container">
        
        <h1 class="text-center">Update your details</h1>
        <form action="#" method="post">
        <div class="mb-3">
            <label for="name" class="form-label" >Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="contact" class="form-label" >Contact Number</label>
            <input type="text" class="form-control" id="contact" name="contact" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label" >Address</label>
            <input type="text" class="form-control" id="address" name="address" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  
</body>
</html>

