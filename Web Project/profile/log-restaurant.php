<?php
require "connection.php";
$uname = $pword = $edit = $view = $id = "";
$lock = "disabled";

if(isset($_SESSION["loginId"])){
  $id = $_SESSION["loginId"];
  $sql = "SELECT username, password from login where id =$id";
  if($result = $conn->query($sql)){
    if($result->num_rows == 1){
      $row = $result->fetch_assoc();
      $uname = $row['username'];
      $pword = $row['password'];
      if(isset($_GET['acnt'])){
        if($_GET['acnt'] == "edit"){
          $lock = "";
          $pword = "";
        }
      }
    }
  }
}
$success = "<div class='alert alert-success' role='alert'>
Password saved successfully.</a> 
</div>";
$error = "<div class='alert alert-danger' role='alert'>
Password not saved</a> 
</div>";
if(isset($_GET['upd'])){
  if($_GET['upd'] == 'success'){
    echo $success;
    unset($_GET['upd']);
  }
  else if (($_GET['upd'] == 'error')){
    echo $error;
    unset($_GET['upd']);
  }
}
?>


<!--restaurant profile -->
<div class="container padding">
  <div class="row welcome">
    <div class= "col">
    <br> 
    <form class="form-container prof" action="profile/log-res-save.php" method="post">
      <div class="form-row">
        <h1 class="col-md-12">Login Profile</h1>
        <hr class="col-md-12">
      </div>
          <input type="hidden" name="id" value="<?= $id ?>">
          <div class="form-group">
            <label for="restname">Username</label>
            <input type="text" class="form-control" id="uname" name="uname" value="<?= $uname?>" readonly>
          </div>
          <div class="form-group">
            <label for="fname">Password</label>
            <input type="password" class="form-control" id="pword" name="pword" value="<?= $pword?>" <?=$lock?> required>
          </div>
        <!-- province-city-zip row start-->
      <div class="form-row">
        <?php          
          if($_GET['acnt'] == "edit"){echo $edit;}
          else if($_GET['acnt'] == "view"){echo $view;}
        ?>
      </div>
        <!-- ///////////////////-->
      <a type="button"  href="login-profile.php?acnt=edit" name="updBtn" class="btn btn-success <?=$btndsbl?>">Change password</a>&nbsp;
      <button type="submit" name="saveBtn" class="btn btn-primary" onclick="return confirm('Are you sure you want to change password?')" <?=$lock?>>Save</button>
      <!-- ///////////////////// -->
      </form>
    </div>
  </div>
</div>