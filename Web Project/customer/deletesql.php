<?php
require "../connection.php";

if(isset($_POST["submit"])){
    $cusId = $_POST["cusId"];
    $logId =$_POST["logId"];
    $uname = $_POST["uname"];
    $email =$_POST["email"];
    $fname = $_POST["fname"];
    $lname =$_POST["lname"];
    $reason = $_POST["reason"];
    $sql = "INSERT INTO accountDelete (cusId, logId, username, email, firstName, lastName, reason ) VALUES($cusId, $logId, '$uname', '$email', '$fname', '$lname' , '$reason')";
    if($conn->query($sql)){
        $sql = "DELETE FROM customer where id = $cusId";
        if($conn->query($sql)){
            $sql = "DELETE FROM login where id = $logId";
            if($conn->query($sql)){
                    $subject = "Account Deletion";
                    $message = "<p>Dear $fname, </p>
                            <p>You have deleted your account. We appreciate and cherish your time using our app. Sadly that we need to part ways.</p>
                            <p>We wish you the best and stay safe.</p>
                            <p>Reserv-Eat</p>          
                ";
                    $headers = "From: officialreserv.eat@gmail.com \r\n";
                    $headers .= "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    if(mail($email,$subject,$message, $headers)){
                        header("location: ../logout.php");
                    }
            }
        }
    }
}

?>