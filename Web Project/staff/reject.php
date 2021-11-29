<?php
require "../connection.php";

$sql = "UPDATE reservation SET status = 'rejected' WHERE id = ?";
 // Check if staff name is empty
        $id = trim($_GET["id"]);
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s",$paramResId);

            // Set parameters
            $paramResId = $id;
        
        if($stmt->execute()){
           header("location: ../landing.php?reject=yes");
            $stmt->close();
            $conn->close();
        }    
    }

?>