<?php
session_start();
require 'connection.php'; 

$title = 'Login Profile page';
require_once 'includes/header.php';
require_once 'includes/nav.php';

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: welcome.php");
    exit;
}

    if(isset($_SESSION["type"])){
        if($_SESSION["type"] == "restaurant"){
            require_once 'profile/log-restaurant.php';
        }
        else if($_SESSION["type"] == "customer"){
            require_once 'profile/log-customer.php';
        }
    }
require_once 'includes/footer.php'; ?>