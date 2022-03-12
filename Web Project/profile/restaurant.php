<?php
$prov = $city =$resName= $fName =$mName =$lName =$cNum =$add1 =$bar =$city =$prov =$open =$close ="";
if(isset($_SESSION['resId'])){
  $id = $_SESSION['resId'];
  $sql = "SELECT * FROM restaurant WHERE id = $id";
  if($result = $conn->query($sql)){
    $row = $result->fetch_assoc();

  }
$resName = $row['restaurantName'];
$fName = $row['firstName'];
$mName = $row['middleName'];
$lName = $row['lastName'];
$cNum = $row['contactNum'];
$add1 = $row['address1'];
$bar = $row['barangay'];
$city = $row['city'];
$prov = $row['province'];
$open = $row['open'];
$close = $row['close'];
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
<!--restaurant profile -->
<div class="container padding">
  <div class="row welcome">
    <div class= "col">
    <br> 
    <form class="form-container prof" action="restaurant/prof-res-save.php" method="post">
      <div class="form-row">
        <h1 class="col-md-12">Restaurant Profile</h1>
        <hr class="col-md-12">
          <div class="form-group col-md-12">    
            <!-- restaurant name-->
            <div class="form-group">
              <label for="restname">Restaurant name</label>
                <input type="text" class="form-control" id="restname" name="restname" placeholder="Enter Restaurant Name" value="<?= $resName?>" <?=$lock?>>
            </div>
          </div>
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
        <div class="form-group">
          <label for="open">Open</label>
          <input type="time" class="form-control" id="open" name="open" placeholder="Opening Hours" value="<?= $open?>" <?=$lock?>>
        </div>
        <div class="form-group">
          <label for="close">Close</label>
          <input type="time" class="form-control" id="close" name="close" placeholder="Closing Hours" value="<?= $close?>" <?=$lock?>>
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
      </form>
    </div>
  </div>
</div>