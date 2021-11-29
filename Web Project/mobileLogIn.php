<?php
  $user = $_POST["user"];
  $pass = $_POST["pass"];
  
  require_once 'mobileconnection.php';

  $sql = "CALL mobileLogIn(?)";

  if($stmt = $conn->prepare($sql)){
    $stmt->bind_param("s", $paramUsername);
    $paramUsername = $user;

    if($stmt->execute()){
      $stmt->store_result();
      
      if($stmt->num_rows == 1){
        $stmt->bind_result($id, $gusername, $hashed_password, $email,$vkey,$verified,$as, $date);
        if($stmt->fetch()){
          if(password_verify($pass, $hashed_password)){
            $response['cEmail'] = $email;
            $response['username'] = $gusername;
            $response['id'] = $id;
            $response['verified'] = $verified;
            $response['type'] = $as;
            $response['Success'] = "1";
            echo json_encode($response);
          }else{
            $response['Success']="0";
            echo json_encode($response);
          }
        }else{
          $response['Success']="0";
          echo json_encode($response);
        }
      }else{
        $response['Success']="0";
        echo json_encode($response);
      }
    }else{
      $response['Success']="0";
      echo json_encode($response);
    }
  }else{
    $response['Success']="0";
    echo json_encode($response);
  }

  $conn->close();
?>