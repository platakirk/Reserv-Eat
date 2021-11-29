<?php

$rest = $_GET["rest"];
$array = array();

require_once 'mobileconnection.php';

$sql = "CALL mobileRDat('$rest')";
$result = $conn->query($sql);

while($row = mysqli_fetch_assoc($result)){

  // add each row returned into an array
  $array[] = $row;

}

if ($array != null) {
    $response=$array;
    header('Content-type: application/json');
    echo json_encode($response);
} else {
   $response=array();
    $response[] = array('success'=>"0",'message'=>"Failed");
    echo json_encode($response);
}

$conn->close();
?>