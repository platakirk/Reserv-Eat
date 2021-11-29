<?php
session_start();

$title = 'About page';
require_once 'includes/header.php';
require_once 'includes/nav.php';
require "connection.php";
$uname = $pword = $edit = $view = $id = $desc= $btndsbl ="";

if(isset($_SESSION["resId"])){
  $id = $_SESSION["resId"];
  $sql = "SELECT description FROM restaurant WHERE id =$id";
  if($result = $conn->query($sql)){
    if($result->num_rows == 1){
      $row = $result->fetch_assoc();
      $desc = $row['description'];
    }
  }
}

if(isset($_POST['updbtn'])){
    $id =  $_POST['id'];
        $desc = trim($_POST['desc']);
        $sql = "UPDATE restaurant SET description = '$desc' WHERE id = $id";
        if($conn->query($sql)){
            echo "<div class='alert alert-success' role='alert'>
            Item Update successful.</a> 
            </div>";
        }
}
$error = "<div class='alert alert-danger' role='alert'>
Password not saved</a> 
</div>";
?>


<!--restaurant profile -->
<div class="container padding">
  <div class="row welcome">
    <div class= "col">
    <br> 
    <form class="form-container prof" action="about.php" method="post">
      <div class="form-row">
        <h1 class="col-md-12">Restaurant About</h1>
        <hr class="col-md-12">
      </div>
          <input type="hidden" name="id" value="<?= $id ?>">
          <div class="form-group">
            <textarea type="text" class="form-control" id="desc" name="desc" style="height:300px"><?= $desc ?></textarea>
          </div>
      <div class="form-row">
      </div>
        <!-- ///////////////////-->
      <button type="submit" name="updbtn" class="btn btn-primary">Save</button>
      <!-- ///////////////////// -->
      </form>
    </div>
  </div>
</div>


<?php
    require "includes/footer.php";
?>