<?php
require "../connection.php";

$sql = "UPDATE reservation SET status = 'accepted' WHERE id = ?";
 // Check if staff name is empty
if(isset($_GET['id'])){
        $id = $_GET['id'];
    if($stmt = $conn->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("s",$paramResId);
        // Set parameters
        $paramResId = $id;
            
        if($stmt->execute()){
            $cid = $_GET["cusId"];
            $sql = "SELECT login.email FROM customer INNER JOIN login on customer.loginId = login.id WHERE customer.id = $cid";
            if($result = $conn->query($sql)){
                echo "hi";
                if($result->num_rows == 1){
                    echo "hello"; 
                    $row = $result->fetch_assoc();
                    $to = $row["email"];
                    $subject = "Reservation Accepted";
                    $message = "<h3>Your reservation has been accepted. Thank you and God Bless!</h3>";
                    $headers = "From: officialreserv.eat@gmail.com \r\n";
                    $headers .= "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                    mail($to, $subject,$message, $headers);
                    header("location: ../landing.php?accept=yes");
                    $stmt->close();
                    $conn->close();
                }
            }
        else{
            echo $id;
            echo "<div class='alert alert-danger' role='alert'>
                Error occured. Try again later.</a> 
                </div>";
            }      
        }

    }
}
 else{
     echo "no id";
}
?>