<?php
session_start();
require 'connection.php'; 

$title = 'Profile page';
require_once 'includes/header.php';
require_once 'includes/nav.php';

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: welcome.php");
    exit;
}

if(isset($_GET['acnt'])){
    if(isset($_SESSION["type"])){
        if($_SESSION["type"] == "restaurant"){
            require_once 'profile/restaurant.php';
        }
        else if($_SESSION["type"] == "customer"){
            require_once 'profile/customer.php';
        }
    }
}
require_once 'includes/footer.php'; ?>