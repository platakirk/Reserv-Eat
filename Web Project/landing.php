<?php
session_start();
$title = 'Main page';
require_once 'includes/header.php';
require_once 'includes/nav.php';

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: welcome.php");
    exit;
} 
$stat= "";

if(isset($_SESSION["type"])){
    if($_SESSION["type"] == "restaurant"){
        require "restaurant/res-landing.php";
    }
    else if($_SESSION["type"] == "customer"){
        require "customer/cus-landing.php";
    }
    else if ($_SESSION["type"] == "staff"){
        require "staff/staff-landing.php";
    }
    else if ($_SESSION["type"] == "admin"){
        require "admin/adm-landing.php";
    }
}
?>


<?php require_once 'includes/footer.php'; ?>
