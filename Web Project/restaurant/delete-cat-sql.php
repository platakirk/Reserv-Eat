<?php
    require "../connection.php";

    if(isset($_POST['delbtn'])){
        $id= $_POST['id'];
        $reason = $_POST['reason'];
        $sql = "SELECT category FROM menucat where id = $id";
        if($result = $conn->query($sql)){
            $row = $result->fetch_assoc();
            $name = $row['category'];
            $sql = "INSERT INTO deleteitem (itemId, name, category, reason) VALUES ($id , '$name' , 'category', '$reason' )";
            if($conn->query($sql)){
                $sql="DELETE FROM menucat WHERE id=$id";
                if($conn->query($sql)){
                    header("location: ../landing.php?select=deleteCat&delete=success");
                }
            }
        }
    }

?>