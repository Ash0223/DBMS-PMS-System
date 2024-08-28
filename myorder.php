<?php

session_start();
$showAlert = false;
$showError = false;
include 'partials/_dbconnect.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){

    include 'partials/_dbconnect.php';
    $username=$_SESSION['username'];
    $oid=$_POST['oid'];
    $sql = "DELETE FROM `orders` WHERE id='$oid'";
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
    <title>Order</title>
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
  <?php require 'partials/_nav.php'?>
  <?php $username=$_SESSION['username']?>
  <?php
  if($showAlert){
    echo'
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!!!</strong>  Order Placed
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  
  ?>

  <center><h3>Your Orders</h3></center>
  <table>
    <tr>
      <th>Id</th>
      <th>Plate</th>
      <th>Quantity</th>
      <th>Trans_no</th>
      <th>Amount</th>
    </tr>
    <?php
        $sql = "SELECT `id`, `ptype`, `quantity`, `trans_no`, `amount` FROM `orders` WHERE uid='$username'";
        $result = $conn->query($sql);
        if ($result-> num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr><td>". $row["id"] ."</td><td>". $row["ptype"]."</td><td>". $row["quantity"] . "</td><td>". $row["trans_no"] . "</td><td>". $row["amount"] . "</td></tr>";
          }
          echo "</table>";
        }
        else {
          echo "0 result";
        }
  ?>
<div class="container">
        <h1 class="text-center">Cancel Order</h1>
        <form action="#" method="post">
        <div class="mb-3">
            <label for="oid" class="form-label" >Select Order ID</label>
            <input type="text" class="form-control" id="oid" name="oid" aria-describedby="emailHelp">
        </div>
       
        <div class="mb-3">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>

