<?php
    require "../connection.php";

    if(isset($_POST['delbtn'])){
        $id= $_POST['id'];
        $cat = $_POST['name'];
        $sql="UPDATE menucat SET category = '$cat' WHERE id = $id";
        if($conn->query($sql)){
            header("location: ../landing.php?select=updateCat&update=success");
        }
        else{
            echo "SQL ERROR";
        }
    }

?>