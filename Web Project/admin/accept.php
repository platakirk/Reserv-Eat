<?php
require "../connection.php";

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $resName = $_POST["resName"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $logId = $_POST["logId"];
    $sql = "UPDATE restaurant SET application = 'accepted' WHERE id = $id";
    if($conn->query($sql)){
        $sql = "SELECT email FROM login where id = $logId";
        if($result = $conn->query($sql)){
            if($result->num_rows == 1){
                $row = $result->fetch_assoc();
                $email = $row['email'];
                $subject = "Application Accepted";
                $message = "<p>Dear $fname, </p>
                            <p>Congratulations! Your restaurant ($resName) has been accepted. You can now
                            go online and enjoy full features of the application.</p>
                            <p>Goodluck and many thanks.</p>
                            <p>Reserv-Eat</p>          
                ";
                $headers = "From: officialreserv.eat@gmail.com \r\n";
                $headers .= "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                if(mail($email,$subject,$message, $headers)){
                    require_once "../includes/header.php";
                        echo "<div class='jumbotron text-center'>
                        <h1 class='display-3'>Accepted Successful</h1>
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
        else {
            echo "email sql error";
        }
    }
    else{
        echo "error";
    }
}
else{
    echo "not going in";
}

?>