<?php
session_start();
$title = 'Login page';
require_once 'includes/header.php';
require_once 'connection.php';

$login_err = $username_err = $password_err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
  // Check if username is empty
  if(empty(trim($_POST["username"]))){
      $username_err = "Please enter username.";
  } else{
      $username = trim($_POST["username"]);
  } 
   // Check if password is empty
   if(empty(trim($_POST["password"]))){
      $password_err = "Please enter password.";
  } else{
      $password = trim($_POST["password"]);
  } 
  
  // Validate credentials
  if(empty($username_err) && empty($password_err)){
      // Prepare a select statement
      $id = $_SESSION["resId"];
      $sql = "select * from staff where username = ? and password = ? and resId = ?";
      
      if($stmt = $conn->prepare($sql)){
          
          // Bind variables to the prepared statement as parameters
          $stmt->bind_param("sss", $paramUsername, $paramPassword, $paramResId);
          
          // Set parameters
          $paramResId = $id;
          $paramUsername = $username;
          $paramPassword = $password; 
          
          // Attempt to execute the prepared statement
          if($stmt->execute()){
              // Store result
              $stmt->store_result();
              
              // Check if username exists, if yes then verify password
              if($stmt->num_rows == 1){                    
                  // Bind result variables
                  $stmt->bind_result($id, $resId, $username, $password,$fname,$lname,$cnum, $status,$dateAdded);
                  if($stmt->fetch()){
                      //if(password_verify($paramPassword, $hashed_password)){
                          // Password is correct, so start a new session
                          session_start();
                          
                          // Store data in session variables
                          $_SESSION["staffLogId"] = $id;
                          $_SESSION["staffUsername"] = $username;  
                          $_SESSION["staffFName"] = $fname;
                          $_SESSION["staffLName"] = $lname;
                          $_SESSION["staffCnum"] = $cnum;
                          $_SESSION["staffStatus"] = $status;  
                          $_SESSION["staffDateLogged"] = $dateAdded;                  
                          
                          header("location: staff/staffOnline.php");
                      //} else{
                          // Password is not valid, display a generic error message
                      //    $login_err = "Invalid username or password123.";
                     // }
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

<img src="images/logo.png" class="rounded mx-auto d-block imaq" alt="logo">

<div class="container padding welc mb-5">
  <div class="row welcome text-center">
    <div class= "col-12">
    <hr>
    <br>
    <br>
    <br>
      <div class="form-container">
      <form action="staff-login.php" method="post">
      <h1 class="col-md-12">Staff Login</h1>
      <hr>
        <div class="form-group">
          <h5 class="text-danger text-center"><?= $login_err; ?></h5>
          <label for="username">Username</label>
          <input type="text" class="form-control login1" id="username" name="username" placeholder="Enter Username">
          <h5 class="text-danger text-center"><?= $username_err; ?></h5>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control login1" id="password" name="password" placeholder="Enter Password">
          <h5 class="text-danger text-center"><?= $password_err; ?></h5>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
        <div class="form-group">
          <br>          
        </div>
      </div>
    </div>
  </div>
</div>

 <?php require_once 'includes/footer.php'; ?>