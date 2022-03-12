<?php
session_start();
require_once '../connection.php';

if(isset($_SESSION['resId'])){
    $rname= $_POST['restname'];
    $fname= $_POST['fname'];
    $mname= $_POST['mname'];
    $lname= $_POST['lname'];
    $cnum= $_POST['contactnum'];
    $add= $_POST['add1'];
    $bar= $_POST['bar'];
    $cit= $_POST['city'];
    $prov= $_POST['province'];
    $open= $_POST['open'];
    $close= $_POST['close'];
    $id= $_SESSION['resId'];
    $sql = "UPDATE restaurant SET restaurantName='$rname', firstName ='$fname', middleName='$mname', lastName='$lname', contactNum='$cnum', 
        address1='$add', barangay='$bar', city='$cit', province='$prov', open='$open', close='$close' WHERE id=$id";

    if($conn->query($sql)){
        $_SESSION['member'] = "old";
        $_SESSION["addresprof"] = "success";
        header("location: check-res-new.php");
    }
    else{
        echo "error";
    }
    
    
}
else{

    echo "no res id";
}/*
else{
    $resLogId= $_SESSION['loginId'];
    $rname= $_POST['restname'];
    $fname= $_POST['fname'];
    $mname= $_POST['mname'];
    $lname= $_POST['lname'];
    $cnum= $_POST['contactnum'];
    $add= $_POST['add1'];
    $bar= $_POST['bar'];
    $cit= $_POST['city'];
    $prov= $_POST['province'];
    $open= $_POST['open'];
    $close= $_POST['close'];
    $sql = "insert into restaurant (restLoginId, restaurantName, firstName, middleName, lastName, contactNum, address1, barangay, city, province, open, close) values (?,?,?,?,?,?,?,?,?,?,?,?)";
    if($stmt = $conn->prepare($sql)){
         // Bind variables to the prepared statement as parameters 
         $stmt->bind_param("ssssssssssss",$paramResLogId,  $paramResName,$paramFName,$paramMName,$paramLName,$paramCNum,$paramAdd,$paramBar,$paramCit,$paramProv,$paramOpen,$paramClose);
         $paramResLogId = $resLogId;
         $paramResName = $rname;
         $paramFName = $fname;
         $paramMName = $mname;
         $paramLName = $lname;
         $paramCNum = $cnum;
         $paramAdd = $add;
         $paramBar = $bar;
         $paramCit = $cit;
         $paramProv = $prov;
         $paramOpen = $open;
         $paramClose = $close;
         if($stmt->execute()){
             $_SESSION['member'] = "old";
             $_SESSION["addresprof"] = "success";
            header("location: check-res-new.php");
            $stmt->close();
            $conn->close();
        }
    }
}*/
?>