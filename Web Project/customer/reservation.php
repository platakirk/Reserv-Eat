<?php
require "connection.php";

$sql = "INSERT INTO reservation (restaurantId, customerId, date, time, seats) values (?,?,?,?,?)";
 // Check if staff name is empty

    if(empty(trim($_POST["date"])) || empty(trim($_POST["time"])) || empty(trim($_POST["seat"]))){
        $error = "Please fill up the blanks.";
    } else{
        $date = trim($_POST["date"]);
        $time = trim($_POST["time"]);
        $seats = trim($_POST["seat"]);
        $rid = trim($_POST["rid"]);
        $cid = trim($_SESSION["cusId"]);
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssss",$paramResId, $paramCusId, $paramDate, $paramTime, $paramSeats);

            // Set parameters
            $paramResId = $rid;
            $paramCusId = $cid;
            $paramDate = $date;
            $paramTime = $time;
            $paramSeats = $seats;
        
        if($stmt->execute()){
            echo "<div class='alert alert-success' role='alert'>
                Reserved successful. Please wait for the Restaurant Staff to accept your reservation.</a> 
                </div>";
            
            $stmt->close();
        }
        else{
            echo "<div class='alert alert-danger' role='alert'>
                Error occured. Try again later.</a> 
                </div>";
        }      
    }
}
?>