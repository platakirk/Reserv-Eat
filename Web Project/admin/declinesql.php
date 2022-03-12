<?php
require "../connection.php";

if(isset($_POST["submit"])){
    $id = $_POST["id"];
    $resId = $_POST["resId"];
    $reason = $_POST["reason"];
    $fname = $_POST["fname"];
    $sql = "UPDATE restaurant SET application = 'declined' WHERE id = $id";
    if($conn->query($sql)){
        $sql = "INSERT INTO decline (resId , reason) VALUES ($id, '$reason')";
        if($conn->query($sql)){
            $sql = "SELECT email FROM login where id = $resId";
            if($result = $conn->query($sql)){
                if($result->num_rows == 1){
                    $row = $result->fetch_assoc();
                    $email = $row['email'];
                    $subject = "Application Declined";
                    $message = "<p>Dear $fname, </p>
                                <p>We sincerely regret that your application does not meet our requirements. 
                                Reserv-Eat takes information protection very seriously and will continue to work to ensure that all 
                                appropriate measures are taken to protect personal information.  Please contact 'officialreserv.eat@gmail.com' 
                                should you have any additional questions or reconsider your application.</p>
                                <p>Goodluck and many thanks.</p>
                                <p>Reserv-Eat</p>          
                    ";
                    $headers = "From: officialreserv.eat@gmail.com \r\n";
                    $headers .= "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    if(mail($email,$subject,$message, $headers)){
                        require_once "../includes/header.php";
                        echo "<div class='jumbotron text-center'>
                        <h1 class='display-3'>Declined Successful</h1>
                        <p class='lead'><strong>Email sent successful.</strong></p>
                        <hr>
                        <p class='lead'>
                          <a class='btn btn-primary btn-sm' href='../landing.php' role='button'>Go back</a>
                        </p>
                      </div></a>
                             ";
                    }
                }
            }
        }
    }
}

?>