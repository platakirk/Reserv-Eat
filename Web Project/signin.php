<?php
session_start();
$title = 'Register page';
require_once 'includes/header.php';
require_once 'connection.php';

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: landing.php");
  exit;
}
$head="";
$type="";
$a ="";
if(isset($_GET['type'])){
  if($_GET['type'] == "restaurant"){
    $head= "Restaurant Registration";
    $type="?type=restaurant";
    $a = "restaurant";
  }
  else if($_GET['type'] == "customer"){
    $head = "Customer Registration";
    $type= "?type=customer";
    $a = "customer";
  }
  require "reg.php";
}
else{
  header("location: welcome.php");
}

?>

<img src="images/logo.png" class="rounded mx-auto d-block imaq" alt="logo">

<div class="container padding">
  <div class="row welcome">
    <div class= "col">
    <hr>
    <br> 
    <form id="example4" action="signin.php<?= $type?>" class="form-container" method="post">
      <input type="hidden" name ="type" value="<?= $a?>">
      <h2 class="col-md-12"><?php echo $head?></h1>
      <hr class="col-md-12">
        <!-- username row start -->
      <div class="form-group">
          <label for="emailadd">Enter Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
      </div>
        <!-- //////////////-->
        <!-- password and confirm password row-->
      <div class="form-row">
        <div class="form-group col-md-6">    
          <label for="username">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
        </div>
        <div class="form-group col-md-6">
          <label for="password">Confirm Password</label>
          <input type="password" class="form-control" id="password2" name="password2" placeholder="Enter Confirm Password">
        </div>
      </div>
        <!-- ////////////////-->
        <!-- email row start-->
        <div class="form-group">
          <label for="emailadd">Email Address</label>
            <input type="email" class="form-control" id="emailadd" name="emailAdd" placeholder="Enter Email Address">
        </div>
        <!-- ////////////-->
        <div class="form-group">
          <?php
            if ($a == "customer"){
              ?>
              <label>Birthday</label>
              <input type="date" class="form-control" name="bday">
              <?php
            }
          ?>
        </div>
        <h5 class="text-danger text-center"><?= $login_err; ?></h5>
        <!-- //////////////// -->
      <button type="submit" class="btn btn-primary">Register</button>
      <!-- ///////////////////// -->
      <br>
      <br>
      <a href="login.php" style="color: #999">Already have an account?</a>
    </form>
    </div>
  </div>
</div>


<?php require_once 'includes/footer.php'; ?>