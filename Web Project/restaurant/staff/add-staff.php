<?php 
session_start();
require_once '../../connection.php';

$sql = "insert into staff (resId, username, password, firstName, lastName, contactNum) values (?,?,?,?,?,?)";
 // Check if staff name is empty

    if(empty(trim($_POST["uname"])) || empty(trim($_POST["pword"])) || empty(trim($_POST["fname"])) || empty(trim($_POST["lname"])) || empty(trim($_POST["cnum"]))){
        header("location: ../../staff.php?error=add");
    } else{
        $uname = trim($_POST["uname"]);
        $pword = trim($_POST["pword"]);
        $fname = trim($_POST["fname"]);
        $lname = trim($_POST["lname"]);
        $cnum = trim($_POST["cnum"]);
        $resid = $_SESSION["resId"];
        if($stmt = $conn->prepare($sql)){
            echo "prepare";
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssssss",$paramResId, $paramUName, $paramPWord, $paramFName, $paramLName, $paramCNum);

            // Set parameters
            $paramResId = $resid;
            $paramUName = $uname;
            $paramPWord = $pword;
            $paramFName = $fname;
            $paramLName = $lname;
            $paramCNum = $cnum;
        
        if($stmt->execute()){
            header("location: ../../staff.php?success=add");
            $stmt->close();
            $conn->close();
        }
        else{
            header("location: ../../staff.php?error=add");
        }      
    }
}
?>