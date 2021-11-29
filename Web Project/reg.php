<?php 
$login_err ="";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $u = $_POST['username'];
  $p = $_POST['password'];
  $p2 = $_POST['password2'];
  $e = $_POST['emailAdd'];

  $number = preg_match('@[0-9]@', $p);
  $uppercase = preg_match('@[A-Z]@', $p);
  $lowercase = preg_match('@[a-z]@', $p);
  $specialChars = preg_match('@[^\w]@', $p);

  if ($p2 != $p){
    $login_err = "Password does not match!";
  }
  else if(empty($u) || empty($p) || empty($e)){
    $login_err = "Please fill up the blanks.";
  }
  else if(strlen($p) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars){
    $login_err = "<ul>
                    <li>Password must be a minimum of 8 characters</li>
                    <li>Password must contain at least 1 number</li>
                    <li>Password must contain at least one uppercase character</li>
                    <li>Password must contain at least one lowercase character</li>
                    <li>Password must contain at least one special character</li>
                  </ul>";
  }
  else if(strlen($u) <5){
    $login_err = "Username should be more than 5 characters.";
  }
  else {
    $sql = "SELECT username FROM login WHERE username = '$u' and type ='$a'";

    if($result = $conn->query($sql)){
      if($result->num_rows > 0){
        $login_err = "Your username has already been taken.";
      }
      else{
        //encrypt username and password
        $encP = password_hash($p, PASSWORD_DEFAULT);
        //generate vkey
        $vkey = md5(time().$u);
        // Prepare a select statement
        $sql = "insert into login (username, password, email, vkey, type) values (?,?,?,?, '$a')";
      
        if($stmt = $conn->prepare($sql)){
          // Bind variables to the prepared statement as parameters
          $stmt->bind_param("ssss", $paramUsername, $paramPassword, $paramEmail, $paramVKey);
          $paramUsername = $u;
          $paramPassword = $encP;
          $paramEmail = $e;
          $paramVKey = $vkey;

          // Attempt to execute the prepared statement
          if($stmt->execute()){
            $to = $e;
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
          else{
            $login_err = "Something went wrong. Please try again later.";
          }
            // Close statement
          $stmt->close();
            // Close connection
          $conn->close();
        }
      }
    }
  }
}
?>