<?php
$id= $_POST["id"];


require_once 'mobileconnection.php';

$sql = "CALL mobileCancel(?)";

if($stmt = $conn->prepare($sql)){
  $stmt->bind_param("s",$parId);
  $parId = $id;

  if($stmt->execute()){
    $response['Success'] = "1";
    echo json_encode($response);
  }else{
    $respose['Success']="0";
    echo json_encode($response);
  }
}
$conn->close();
?>