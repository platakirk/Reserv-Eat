<?php 
require_once '../../connection.php';


 // Check if category name is empty
if(isset($_POST["submit"])){    
    if(empty(trim($_POST["id"]))){
        header("location: ../../staff.php?error=del");
    } 
    else{     
        $id = $_POST["id"];
        $un = $_POST["username"];
        $reason = $_POST["reason"];
        $sql = "INSERT INTO deleteitem (itemId, name, category, reason) VALUES($id, '$un', 'staff','$reason' )";
        if($conn->query($sql)){
            $sql = "DELETE FROM staff WHERE id=?";
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
    }  
}  
?>