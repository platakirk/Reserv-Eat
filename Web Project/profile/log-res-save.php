<?php
require "../connection.php";

  

if(isset($_POST['saveBtn'])){
    $id = $_POST['id'];
    $p = $_POST['pword'];
    $number = preg_match('@[0-9]@', $p);
    $uppercase = preg_match('@[A-Z]@', $p);
    $lowercase = preg_match('@[a-z]@', $p);
    $specialChars = preg_match('@[^\w]@', $p);
    
    $encP = password_hash($p, PASSWORD_DEFAULT);
    $sql = "UPDATE login SET password = '$encP' WHERE id = $id";
    if(strlen($p) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars){
        header("location: ../login-profile.php?acnt=view&upd=error");
    }
    else{
        if($conn->query($sql)){
            header("location: ../login-profile.php?acnt=view&upd=success");
        }
    }
}
else{
    header("location: landing.php");
}

?>