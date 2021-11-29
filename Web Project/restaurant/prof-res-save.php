<?php
session_start();
require_once '../connection.php';

if(isset($_SESSION['resId'])){
    $sql = "UPDATE restaurant SET restaurantName=?, firstName =?, middleName=?, lastName=?, contactNum=?, address1=?, barangay=?, city=?, province=? WHERE id=?";
    $rname= $_POST['restname'];
    $fname= $_POST['fname'];
    $mname= $_POST['mname'];
    $lname= $_POST['lname'];
    $cnum= $_POST['contactnum'];
    $add= $_POST['add1'];
    $bar= $_POST['bar'];
    $cit= $_POST['city'];
    $prov= $_POST['province'];
    $id= $_SESSION['resId'];
    if($stmt = $conn->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("ssssssssss",  $paramResName,$paramFName,$paramMName,$paramLName,$paramCNum,$paramAdd,$paramBar,$paramCit,$paramProv,$paramId);
        // Set parameters
        $paramResName = $rname;
        $paramFName = $fname;
        $paramMName = $mname;
        $paramLName = $lname;
        $paramCNum = $cnum;
        $paramAdd = $add;
        $paramBar = $bar;
        $paramCit = $cit;
        $paramProv = $prov;
        $paramId = $id;
        if($stmt->execute()){
            $_SESSION["updresprof"] = "success";
            $_SESSION['member'] = "old";
            header("location: check-res-new.php");
            $stmt->close();
            $conn->close();
        }
    }
}
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
    $sql = "insert into restaurant (restLoginId, restaurantName, firstName, middleName, lastName, contactNum, address1, barangay, city, province) values (?,?,?,?,?,?,?,?,?,?)";
    if($stmt = $conn->prepare($sql)){
         // Bind variables to the prepared statement as parameters 
         $stmt->bind_param("ssssssssss",$paramResLogId,  $paramResName,$paramFName,$paramMName,$paramLName,$paramCNum,$paramAdd,$paramBar,$paramCit,$paramProv);
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
         if($stmt->execute()){
             $_SESSION['member'] = "old";
             $_SESSION["addresprof"] = "success";
            header("location: check-res-new.php");
            $stmt->close();
            $conn->close();
        }
    }
}
?>