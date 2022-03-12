<?php

$fName =$mName =$lName =$cNum =$add1 =$bar =$city =$prov ="";
if(isset($_SESSION['cusId'])){
$fName = $_SESSION['fName'];
$mName =$_SESSION['mName'];
$lName = $_SESSION['lName'];
$cNum = $_SESSION['cNum'];
$add1 = $_SESSION['add1'];
$bar = $_SESSION['bar'];
$city = $_SESSION['city'];
$prov = $_SESSION['prov'];
$btndsbl = "";
}
else{
  $btndsbl = "disabled"; 
}

$lock = "disabled";
$edit = "<div class='form-group col-md-6'>
          <label for='city'>City</label>
          <input type='text' class='form-control' id='city' name='city' placeholder='Enter City' value='$city'>
        </div>
        <div class='form-group col-md-6'>
          <label for='province'>Province</label>
          <input type='text' class='form-control' id='province' name='province' placeholder='Enter Province' value='$prov'>
        </div>";
$view = "<div class='form-group col-md-6'>
          <label for='city'>City</label>
          <input type='text' class='form-control' id='city' name='city' placeholder='Enter City' value='$city' $lock>
        </div>
        <div class='form-group col-md-6'>
          <label for='province'>Province</label>
          <input type='text' class='form-control' id='province' name='province' placeholder='Enter Province' value='$prov' $lock>
        </div>";
if($_GET['acnt']== "edit"){
  $lock = "";
}

?>
<!--customer profile -->
    <!--username-password row start-->
<div class="container padding">
  <div class="row welcome">
    <div class= "col">
    <br> 
    <form class="form-container prof" action="customer/prof-cus-save.php" method="post">
      <div class="form-row">
        <h1 class="col-md-12">Customer Profile</h1>
        <hr class="col-md-12">
      </div>
            <!-- //////////////-->      
          <div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" value="<?= $fName?>" <?=$lock?>>
          </div>
          <div class="form-group">
            <label for="mname">Middle Name (optional)</label>
            <input type="text" class="form-control" id="mname" name="mname" placeholder="Enter Middle Name" value="<?= $mName?>" <?=$lock?>>
          </div>
          <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" value="<?= $lName?>" <?=$lock?>>
          </div>  
        <div class="form-group">
          <label for="contactnum">Contact number</label>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text">
                +63
              </div>
            </div>  
              <input type="text" class="form-control" id="contactnum" name="contactnum" placeholder="Enter 10 digits" value="<?= $cNum?>" <?=$lock?>>            
          </div>
        </div>
        <!-- ////////////////////-->
        <!-- address row start -->
        <div class="form-group">
          <label for="homeadd">Address line 1</label>
          <input type="text" class="form-control" id="add1" name="add1" placeholder="Room/Unit no., Street, Village" value="<?= $add1?>" <?=$lock?>>
        </div>
        <!-- ////////////////-->
        <div class="form-group">
          <label for="homeadd">Barangay</label>
          <input type="text" class="form-control" id="bar" name="bar" placeholder="Enter Barangay" value="<?= $bar?>" <?=$lock?>>
        </div>
        <!-- province-city-zip row start-->
      <div class="form-row">
        <?php          
          if($_GET['acnt'] == "edit"){echo $edit;}
          else if($_GET['acnt'] == "view"){echo $view;}
        ?>
      </div>
        <!-- ///////////////////-->
      <a type="button" href="profile.php?acnt=edit" name="updBtn" class="btn btn-success <?=$btndsbl?>">Edit</a>&nbsp;
      <button type="submit" name="saveBtn" class="btn btn-primary" <?=$lock?>>Save</button>
      <!-- ///////////////////// -->
      <Br>
      <br>
      <a type="button" href="delete.php" name="delBtn" class="btn btn-danger <?=$btndsbl?>">Delete Account</a>
      </form>
    </div>
  </div>
</div>