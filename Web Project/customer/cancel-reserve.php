<?php 
require_once "../connection.php";

if(isset($_POST["canbtn"])){
    $sql = "UPDATE reservation SET status = 'cancelled' WHERE id = ?";
    $id = trim($_POST["rcid"]);
    echo $id;
    if($stmt = $conn->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("s", $paramid);

         // Set parameters
        $paramid = $id;
    
        if($stmt->execute()){
            header("location: ../reserve-list.php?cancel=yes");
            $stmt->close();
            $conn->close();
        }    
    }
}

?>