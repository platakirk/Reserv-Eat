<?php
$ver_alert ="<div class='alert alert-danger' role='alert'>
  Your account has not been verified. To access features, please check your email to verify your account. <a target = '_blank' href='mail.php'>Send new verification.</a> 
</div>";
$new_alert ="<div class='alert alert-warning' role='alert'>
  Please Complete Profile details. <a href='profile.php?acnt=edit'>Fill up profile.</a> 
</div>";
$add_staff_error = "<div class='alert alert-danger' role='alert'>
Adding staff unsuccessful. Please don't forget to fill the blanks.</a> 
</div>";
$add_staff_success = "<div class='alert alert-success' role='alert'>
Adding staff successful.</a> 
</div>";
$add_prof_success = "<div class='alert alert-success' role='alert'>
Profile added successfully.</a> 
</div>";
$upd_prof_success = "<div class='alert alert-success' role='alert'>
Profile saved successfully.</a> 
</div>";
$upd_staff_error = "<div class='alert alert-danger' role='alert'>
Update staff unsuccessful.</a> 
</div>";
$upd_staff_success = "<div class='alert alert-success' role='alert'>
Update staff successful.</a> 
</div>";
$del_staff_success = "<div class='alert alert-success' role='alert'>
Delete successful.</a> 
</div>";
$del_staff_error = "<div class='alert alert-danger' role='alert'>
Delete unsuccessful.</a> 
</div>";

$app_pending = "<div class='alert alert-warning' role='alert'>
Your application is still pending.</a> 
</div>";
$app_declined = "<div class='alert alert-danger' role='alert'>
Your application is still declined.</a> 
</div>";

if(isset($_SESSION['verified'])){
  if($_SESSION['verified'] == 0){
    echo $ver_alert;
  }
}
if(isset($_SESSION['member'])){
    if($_SESSION['member'] == "new"){
      echo $new_alert;
    }
}
if (isset($_GET["error"])){
  if($_GET["error"] == "add"){
    echo $add_staff_error;
    unset($_GET["error"]);
  }
  else if($_GET["error"] == "upd"){
    echo $upd_staff_error;
    unset($_GET["error"]);
  }
  else if($_GET["error"] == "del"){
    echo $del_staff_error;
    unset($_GET["error"]);
  }
}
if(isset($_GET["success"])){
  if($_GET["success"] == "add"){
    echo $add_staff_success;
    unset($_GET["success"]);
  }
  else if($_GET["success"] == "upd"){
    echo $upd_staff_success;
    unset($_GET["success"]);
  }
  else if($_GET["success"] == "del"){
    echo $del_staff_success;
    unset($_GET["success"]);
  }
}
if(isset($_SESSION["updresprof"])){
  if($_SESSION["updresprof"] == "success"){
    echo $upd_prof_success;
    unset($_SESSION["updresprof"]);
  }
}
if(isset($_SESSION["addresprof"])){
  if($_SESSION["addresprof"] == "success"){
    echo $add_prof_success;
    unset($_SESSION["addresprof"]);
  }
}
if(isset($_SESSION['application'])){
  $a = $_SESSION["application"];
  if($a == "pending"){
    echo $app_pending;
  }
  else if ($a == "declined"){
    echo $app_declined;
  }

}
?>