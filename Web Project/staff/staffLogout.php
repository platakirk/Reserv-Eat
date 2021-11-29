<?php
session_start();
require "../connection.php";
$sql = "UPDATE staff SET status = ? WHERE id = ?";
$id = $_SESSION["staffLogId"];
$stat = "offline";


if($stmt = $conn->prepare($sql)){
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("ss", $paramStats, $paramId);

     // Set parameters
    $paramStats = $stat;
    $paramId = $id;

    if($stmt->execute()){
             
        header("location: ../logout.php");
        $stmt->close();
        $conn->close();
    }      
}
else{
    echo "not prepare";
}

?>