<?php
$localh= "127.0.0.1";
$username = "isproj2_reserveat";
$password = "22:gh.>CR<&/vcp*";
$dbName= "isproj2_reserveat";

//create connection
$conn = new mysqli($localh, $username, $password, $dbName);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>