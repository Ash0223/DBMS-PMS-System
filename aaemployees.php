<?php

session_start();
$showAlert = false;
$showError = false;
include 'partials/_dbconnect.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){

    include 'partials/_dbconnect.php';
    $username=$_SESSION['ausername'];
    $name=$_POST['name'];
    $phno=$_POST['phno'];
    $address=$_POST['address'];
    $designation=$_POST['designation'];
    $sql = "INSERT INTO `employees`(`name`, `phno`, `address`, `designation`) VALUES ('$name','$phno','$address','$designation')";
    $result=mysqli_query($conn,$sql);
    if ($result){
      $showAlert =true;
    }

  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee</title>
    <style>
      table{
        border-collapse: collapse;
        width:100%;
        color: #588c7e;
        font-family: monospace;
        font-size: 25px;
        text-align: left;
      }
      th{
        background-color: #588c7e;
        color: white;
      }
      tr:nth-child(even) {background-color: #f2f2f2}
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
  <?php require 'partials/_anav.php'?>
  <?php
  if($showAlert){
    echo'
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!!!</strong>  Employee Details Added
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  
  ?>

  <h3>Employees Working....</h3>
  <table>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Phone Number</th>
      <th>Address</th>
      <th>Designation</th>
    </tr>
    <?php
        $sql = "SELECT `id`, `name`, `phno`, `address`, `designation` FROM `employees`";
        $result = $conn->query($sql);
        if ($result-> num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["id"] ."</td><td>". $row["name"]."</td><td>". $row["phno"] . "</td><td>". $row["address"] . "</td>
        <td>". $row["designation"] . "</td></tr>";
        }
        echo "</table>";
        }
        else {
        echo "0 result";
        }
  ?>

<div class="container">
        <h1 class="text-center">Add Employees</h1>
        <form action="#" method="post">
        <div class="mb-3">
            <label for="name" class="form-label" >Employee Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="phno" class="form-label" >Phone Number</label>
            <input type="text" class="form-control" id="phno" name="phno" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label" >Address</label>
            <input type="text" class="form-control" id="address" name="address" aria-describedby="emailHelp">
        </div>
        
        <div class="mb-3">
            <label for="designation" class="form-label" >Designation</label>
            <input type="text" class="form-control" id="designation" name="designation" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>

