<?php
session_start();
$id = $_SESSION["resId"];
require_once '../connection.php';

if(isset($_POST['hidden-status'])){
    $statusnow= $_POST["hidden-status"];
    $sql = "update restaurant set status = '$statusnow' where id='$id'";
        if($conn->query($sql)){
            $_SESSION["status"] = $statusnow;
            header("location: ../landing.php");
            // Close connection
            $conn->close();
        }        
        else{
            echo "Oops! Something went wrong. Please try again later.";
        }    
}
?>