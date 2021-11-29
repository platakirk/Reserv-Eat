<?php
$email= $_POST["user"];
$status = $_POST["status"];

require_once 'mobileconnection.php';

if($status!="1"){
    $response['Success']='0';
    header('Content-type: application/json');
    die (json_encode($response));
}


$sql = "CALL whoUser('$email')";
$result = $conn->query($sql);

while($row = mysqli_fetch_assoc($result)){

  if ($row != null) {
    $response['cEmail'] = $row['email'];
    $response['username'] = $row['username'];
    $response['Success'] = '1';
    echo json_encode($response);
  } else {
    $response['Success']='0';
    echo json_encode($response);
  }
  

}
$conn->close();
?>