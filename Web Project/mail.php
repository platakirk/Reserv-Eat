<?php
  session_start();
  if(isset($_SESSION['loginId'])){
    $to = $_SESSION["email"];
    $vkey = $_SESSION["vkey"];
    $u = $_SESSION["username"];
    $subject = "Email Verification";
    $message = "<h1> Hello $u</h1>
    <br>
    <h3>You have registered an account on Reserv-Eat. 
    <br>
    Before being able to use your account you need to verify that this is your email address by clicking here:</h3><a href = 'https://isproj2b.benilde.edu.ph/ReservEat/verify.php?vkey=$vkey'>Verify Account</a>
    <br>
    <h2>Kind Regards,</h2>
    <br>
    <h2> Reserv-Eat</h2>";
    $headers = "From: officialreserv.eat@gmail.com \r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    if(mail($to, $subject,$message, $headers)){
    header("location: thankyou.php");
  }
  }
  
?>