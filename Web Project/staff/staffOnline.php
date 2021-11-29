<?php
session_start();
require "../connection.php";
$sql = "UPDATE staff SET status = ? WHERE id = ?";
$id = $_SESSION["staffLogId"];
$stat = "online";


if($stmt = $conn->prepare($sql)){
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("ss", $paramStats, $paramId);

     // Set parameters
    $paramStats = $stat;
    $paramId = $id;

    if($stmt->execute()){
        $_SESSION["type"] = "staff";
        header("location: ../landing.php");
        $stmt->close();
        $conn->close();
    }      
}
else{
    echo "not prepare";
}

?>