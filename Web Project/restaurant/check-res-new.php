<?php
session_start();
require_once '../connection.php';

if(isset($_POST['submit']) && isset($_SESSION['loginId'])){
    $logid = $_SESSION['loginId'];
    $id = $_POST['id'];
    $sql = "select * from restaurant where restLoginId = $logid and id = $id";

    $result = $conn->query($sql);

    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        $_SESSION['resId'] = $row['id'];
        $_SESSION['resName'] = $row['restaurantName'];
        $_SESSION['fName'] = $row['firstName'];
        $_SESSION['mName'] = $row['middleName'];
        $_SESSION['lName'] = $row['lastName'];
        $_SESSION['cNum'] = $row['contactNum'];
        $_SESSION['add1'] = $row['address1'];
        $_SESSION['bar'] = $row['barangay'];
        $_SESSION['city'] = $row['city'];
        $_SESSION['prov'] = $row['province'];
        $_SESSION['status'] = $row['status'];
        $_SESSION['application'] = $row['application'];
        $_SESSION['open'] = $row['open'];
        $_SESSION['close'] = $row['close'];
        header("location: ../member-check.php");
    }
    else {
        header("location: ../member-check.php");
    }
}
else if(isset($_SESSION['resId']) && isset($_SESSION['loginId'])){
    header("location: ../member-check.php");
}

if(isset($_POST['delete'])){
    $id = $_POST['id'];
    header("location: ../branchdel.php?id=$id");
}

?>