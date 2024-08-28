<?php
session_start();

if(!isset($_SESSION['aloggedin']) || $_SESSION['aloggedin']!=true){
    
    header("location: login.php");
    exit;
}else{
   $username=$_SESSION['ausername'];
  // $sql="select name from users where id='$username'";
  // $result=mysqli_query($conn,$sql);
  // echo $result;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome -<?php echo $_SESSION['ausername']?></title>
    <link rel="stylesheet" href="main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
  <?php require 'partials/_anav.php'?>
  <h1><center>ProPlates!!!</center></h1>
  <h3><center>Welcome -<?php echo $_SESSION['ausername']?></center></h3><br>
  <div>
      <center>
          <button type="button" class="button1">
            <span class="button__text1">Delete Plate</span>
                <span class="button__icon1"><a href="/Plate_Management/adplate.php">
                    <ion-icon name="person-circle-outline"></ion-icon>
            </span>
            </a>
          </button>
          <br>
          <button type="button" class="button">
            <span class="button__text">Add Plate</span>
                  <span class="button__icon"><a href="/Plate_Management/aaplate.php">
                  <ion-icon name="cloud-download-outline"></ion-icon>
              </span>
            </a>
          </button>
      </center>
  </div>
  <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>