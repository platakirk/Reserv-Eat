<?php
$title = 'Login page';
require_once 'includes/header.php';
require_once 'connection.php';

  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: landing.php");
    exit;
  }
  $head="";
  $type="";
  $a = "";
  if(isset($_GET['type'])){
    if($_GET['type'] == "restaurant"){
      $head = "Restaurant Login";
      $type="?type=restaurant";
      $a= "restaurant";
    }
    else if($_GET['type'] == "customer"){
      $head = "Customer Login";
      $type="?type=customer";
      $a="customer";
    }
    require "loginsql.php";
  }
  else{
    header("location: welcome.php");
  }
?>

<img src="images/reserveat-icon.png" class="rounded mx-auto d-block imaq" alt="logo">

<div class="container padding welc">
  <div class="row welcome text-center">
    <div class= "col-12">
    <hr>
    <br>
    <br>
    <br>
      <div class="form-container">
      <form action="login.php<?= $type?>" method="post">
      <h1 class="col-md-12"><?php echo $head?></h1>
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
          <small id="emailHelp" class="form-text text-muted">We'll never share your password with anyone else.</small>
          <h5 class="text-danger text-center"><?= $password_err; ?></h5>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
        <div class="form-group">
          <a href="signin.php<?= $type?>" style="color: #999">Create new account</a>
          <br>
          <a href="welcome.php" style="color: #999">Forgot password</a>
        </div>
      </div>
    </div>
  </div>
</div>

 <?php require_once 'includes/footer.php'; ?>