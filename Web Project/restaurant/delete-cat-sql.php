<?php
    require "../connection.php";

    if(isset($_POST['delbtn'])){
        $id= $_POST['id'];
        $sql="DELETE FROM menucat WHERE id=$id";
        if($conn->query($sql)){
            header("location: ../landing.php?select=deleteCat&delete=success");
        }
    }

?>