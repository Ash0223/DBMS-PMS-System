<?php

session_start();
$showAlert = false;
$showError = false;
include 'partials/_dbconnect.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){

    include 'partials/_dbconnect.php';
    $username=$_SESSION['username'];
    $quantity=$_POST['quantity'];
    $ptype = $_POST['plate'];
    $trans_no=$_POST['trans_no'];
    $amt=$_POST['amt'];
 
    $sql = "INSERT INTO `orders`(`uid`, `ptype`, `quantity`,`trans_no`, `amount`) VALUES ('$username','$ptype','$quantity','$trans_no','$amt')";
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
  <?php
  if($showAlert){
    echo'
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!!!</strong>  Order Placed
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  
  ?>

  <h3>The available plates and its price is mentiond below in the given table</h3>
  <table>
    <tr>
      <th>Id</th>
      <th>Plate</th>
      <th>Cost</th>
    </tr>
    <?php
        $sql = "SELECT id,type,price from plates";
        $result = $conn->query($sql);
        if ($result-> num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["id"] ."</td><td>". $row["type"]."</td><td>". $row["price"] . "</td></tr>";
        }
        echo "</table>";
        }
        else {
        echo "0 result";
        }
  ?>

  <div class="container">
        <h1 class="text-center">Order</h1>
        <form action="#" method="post">
        <div class="mb-3">
            <label for="username" class="form-label" >Username</label>
            <input type="text" readonly class="form-control-plaintext" id="username" value=<?php echo $_SESSION['username']?>>
        </div>
        <div class="mb-3">
            <label for="plate" class="form-label" >Select Plate Type</label>
            <input type="text" class="form-control" id="plate" name="plate">
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label" >Quantity Required</label>
            <input type="text" class="form-control" id="quantity" name="quantity">
        </div>
        <div class="mb-3">
            <label for="trans_no" class="form-label" >Trans_No</label>
            <input type="text" class="form-control" id="trans_no" name="trans_no">
        </div>
        <div class="mb-3">
            <label for="amt" class="form-label" >Amount</label>
            <input type="text" class="form-control" id="amt" name="amt">
        </div>
        <div class="mb-3">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>

