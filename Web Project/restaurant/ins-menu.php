<?php 
session_start();
require_once '../connection.php';
 // Check if staff name is empty

    if(isset($_POST["btn"])){
        if($_POST["catName"] != "" ){
            $id = $_POST["catName"];
            $n = $_POST["name"];
            $p = $_POST["price"];
            $sql = "INSERT INTO menuitem (catId, name, price) values ($id , '$n' ,$p)";
            if($conn->query($sql)){
                echo "hi";
                header("location: ../landing.php?select=menu");
                $conn->close();          
            }
        }
        else{
            header("location: ../landing.php?select=menu&err=itemMenu");
        }   
    }
?>