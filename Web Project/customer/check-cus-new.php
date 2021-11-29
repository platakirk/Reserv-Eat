<?php
session_start();
require_once '../connection.php';

$id = $_SESSION['loginId'];
$sql = "select * from customer where loginId = $id";

$result = $conn->query($sql);

if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    $_SESSION['cusId'] = $row['id'];
    $_SESSION['fName'] = $row['firstName'];
    $_SESSION['mName'] = $row['middleName'];
    $_SESSION['lName'] = $row['lastName'];
    $_SESSION['cNum'] = $row['contactNum'];
    $_SESSION['add1'] = $row['address1'];
    $_SESSION['bar'] = $row['barangay'];
    $_SESSION['city'] = $row['city'];
    $_SESSION['prov'] = $row['province'];
    header("location: ../member-check.php");
}
else {
    $_SESSION['member'] = "new";
    header("location: ../member-check.php");
}

?>