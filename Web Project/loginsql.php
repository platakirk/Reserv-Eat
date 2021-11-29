<?php
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = $_POST["username"];
    } 
     // Check if password is empty
     if(empty(trim($_POST["password"]))){
        $password_err = "Please enter password.";
    } else{
        $password = $_POST["password"];
    } 
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT * FROm login WHERE username = ?  AND type = '$a'";
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $paramUsername);
            // Set parameters
            $paramUsername = $username; 
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){                  
                    // Bind result variables
                    $stmt->bind_result($id, $username, $hashed_password, $email,$vkey,$verified,$as, $date);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["loginId"] = $id;
                            $_SESSION["username"] = $username;  
                            $_SESSION["email"] = $email;
                            $_SESSION["vkey"] = $vkey;
                            $_SESSION["verified"] = $verified;
                            $_SESSION["status"] = $status;  
                            $_SESSION["dateLogged"] = $date;    
                            $_SESSION["type"] = $as;                     
                            
                            // Redirect user to welcome page
                            if($as == "restaurant"){
                            header("location: restaurant/check-res-new.php");
                            }
                            else if($as == "customer"){
                            header("location: customer/check-cus-new.php");
                            }
                        } else{
                            // Password is not valid, display a generic error message
                           $login_err = "Invalid password.";
                        }
                    }
                } 
                else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    // Close connection
    $conn->close();
  }
?>