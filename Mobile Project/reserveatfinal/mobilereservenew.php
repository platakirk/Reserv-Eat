<?php
$userid= $_POST["userid"];
$resid = $_POST["resid"];
$datechose = $_POST["date"];
$timechose = $_POST["time"];
$people = $_POST["people"];


require_once 'mobileconnection.php';

$sql = "CALL mobileAddR(?,?,?,?,?)";

if($stmt = $conn->prepare($sql)){
  $stmt->bind_param("sssss",$parRI,$parUI,$parD,$parT,$parP);
  $parRI = $resid;
  $parUI = $userid;
  $parD = $datechose;
  $parT = $timechose;
  $parP = $people;

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