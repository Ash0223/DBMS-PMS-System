<?php
$server = "localhost";
$susername ="root";
$spassword = "";
$database = "pmsdb";
$conn = mysqli_connect($server, $susername, $spassword, $database);
if (!$conn) {
    die("Error".mysqli_connect_error());
}
?>