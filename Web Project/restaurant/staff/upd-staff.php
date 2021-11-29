<?php 
require_once '../../connection.php';

 // Check if staff profile is empty 
 if(empty(trim($_POST["euname"])) || empty(trim($_POST["epword"])) || empty(trim($_POST["efname"])) || empty(trim($_POST["elname"])) || empty(trim($_POST["ecnum"]))){
    header("location: ../../staff.php?error=upd");
 }
 else{
    $sql = "UPDATE staff SET username = ? , password = ? , firstName = ?, lastName = ? , contactNum = ? WHERE id = ?";
    $id = trim($_POST["eid"]);
    $uname = trim($_POST["euname"]);
    $pword = trim($_POST["epword"]);
    $fname = trim($_POST["efname"]);
    $lname = trim($_POST["elname"]);
    $cnum = trim($_POST["ecnum"]);

    if($stmt = $conn->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("ssssss", $paramUName, $paramPWord, $paramFName, $paramLName, $paramCNum, $paramId);

         // Set parameters
        $paramUName = $uname;
        $paramPWord = $pword;
        $paramFName = $fname;
        $paramLName = $lname;
        $paramCNum = $cnum;
        $paramId = $id;
    
        if($stmt->execute()){
            header("location: ../../staff.php?success=upd");
            $stmt->close();
            $conn->close();
        }      
        else{
            header("location: ../../staff.php?error=upd");
        }
    }
    else{
        echo "not prepare";
    }
}
?>