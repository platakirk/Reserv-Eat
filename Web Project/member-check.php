<?php
session_start();
require 'connection.php';
$rid = $_SESSION['loginId']; 
    $sql = "select verified from login where id = $rid";

    $result = $conn->query($sql);
    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        $_SESSION['verified'] = $row['verified'];
        $conn->close();
        header("location: landing.php");
    }
?>