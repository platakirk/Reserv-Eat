<?php 
require_once '../../connection.php';

$sql = "DELETE FROM staff WHERE id=?";
 // Check if category name is empty
 
    if(empty(trim($_POST["eid"]))){
        header("location: ../../staff.php?error=del");
    } 
    else{     
        $id = $_POST["eid"];
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $paramId);
            // Set parameters
            $paramId = $id;
        }
        if($stmt->execute()){
            header("location: ../../staff.php?success=del");
            $stmt->close();
            $conn->close();
        }      
        else{
            header("location: ../../staff.php?error=del");
        }
    }
?>