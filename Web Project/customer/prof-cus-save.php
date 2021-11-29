<?php
session_start();
require_once '../connection.php';

if(isset($_SESSION['cusId'])){
    $sql = "UPDATE customer SET firstName =?, middleName=?, lastName=?, contactNum=?, address1=?, barangay=?, city=?, province=? WHERE id=?";
    $fname= $_POST['fname'];
    $mname= $_POST['mname'];
    $lname= $_POST['lname'];
    $cnum= $_POST['contactnum'];
    $add= $_POST['add1'];
    $bar= $_POST['bar'];
    $cit= $_POST['city'];
    $prov= $_POST['province'];
    $id= $_SESSION['cusId'];
    if($stmt = $conn->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("sssssssss", $paramFName,$paramMName,$paramLName,$paramCNum,$paramAdd,$paramBar,$paramCit,$paramProv,$paramId);
        // Set parameters
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
            header("location: check-cus-new.php");
            $stmt->close();
            $conn->close();
        }
    }
}
else{
    $cusLogId= $_SESSION['loginId'];
    $fname= $_POST['fname'];
    $mname= $_POST['mname'];
    $lname= $_POST['lname'];
    $cnum= $_POST['contactnum'];
    $add= $_POST['add1'];
    $bar= $_POST['bar'];
    $cit= $_POST['city'];
    $prov= $_POST['province'];
    $sql = "insert into customer (loginId, firstName, middleName, lastName, contactNum, address1, barangay, city, province) values (?,?,?,?,?,?,?,?,?)";
    if($stmt = $conn->prepare($sql)){
         // Bind variables to the prepared statement as parameters 
         $stmt->bind_param("sssssssss",$paramLogId,$paramFName,$paramMName,$paramLName,$paramCNum,$paramAdd,$paramBar,$paramCit,$paramProv);
         $paramLogId = $cusLogId;
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
             $stmt->close();
            $conn->close();
            header("location: check-cus-new.php");
        }
    }
}
?>