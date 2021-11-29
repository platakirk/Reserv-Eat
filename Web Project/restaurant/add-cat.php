<?php 
session_start();
require_once '../connection.php';
 // Check if customer name is empty

    if(isset($_POST["submit"])){
        $id = $_SESSION["resId"];
        $n = $_POST["catName"];
        $sql = "INSERT INTO menucat (resId, category) VALUES ( $id ,'$n')";
        if($conn->query($sql)){
            header("location: ../landing.php?select=menu;add=success");
            $conn->close();          
    }
}
?>