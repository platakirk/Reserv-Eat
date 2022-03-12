<?php
    session_start();
    $title = 'Add Branch page';
    require 'includes/header.php';
    require 'connection.php';

    if(isset($_POST['saveBtn'])){
        $logid = $_SESSION['loginId'];
        $resName = $_POST['restname'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $contactnum = $_POST['contactnum'];
        $add1 = $_POST['add1'];
        $bar = $_POST['bar'];
        $city = $_POST['city'];
        $province = $_POST['province'];
        $open = $_POST['open'];
        $close = $_POST['close'];

        $sql = "INSERT INTO restaurant (restLoginId , restaurantName, firstName, middleName, lastName, contactNum, address1, barangay, city, province, open, close)
                                    VALUES($logid,   '$resName',       '$fname', '$mname',    '$lname','$contactnum','$add1', '$bar', '$city','$province','$open','$close')";
        if($conn->query($sql)){
            header("location: branch.php?add=success");
        }
    }
?>

<!--restaurant profile -->
<div class="container padding">
  <div class="row welcome">
    <div class= "col">
    <br> 
    <form class="form-container prof" action="addbranch.php" method="post">
      <div class="form-row">
        <h1 class="col-md-12">Restaurant Profile</h1>
        <hr class="col-md-12">
          <div class="form-group col-md-12">    
            <!-- restaurant name-->
            <div class="form-group">
              <label for="restname">Restaurant name</label>
                <input type="text" class="form-control" id="restname" name="restname" placeholder="Enter Restaurant Name">
            </div>
          </div>
      </div>
            <!-- //////////////-->      
          <div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name">
          </div>
          <div class="form-group">
            <label for="mname">Middle Name (optional)</label>
            <input type="text" class="form-control" id="mname" name="mname" placeholder="Enter Middle Name">
          </div>
          <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name">
          </div>  
        <div class="form-group">
          <label for="contactnum">Contact number</label>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text">
                +63
              </div>
            </div>  
              <input type="text" class="form-control" id="contactnum" name="contactnum" placeholder="Enter 10 digits">            
          </div>
        </div>
        <!-- ////////////////////-->
        <!-- address row start -->
        <div class="form-group">
          <label for="homeadd">Address line 1</label>
          <input type="text" class="form-control" id="add1" name="add1" placeholder="Room/Unit no., Street, Village">
        </div>
        <!-- ////////////////-->
        <div class="form-group">
          <label for="homeadd">Barangay</label>
          <input type="text" class="form-control" id="bar" name="bar" placeholder="Enter Barangay">
        </div>
        <div class="form-row">
            <div class='form-group col-md-6'>
            <label for='city'>City</label>
            <input type='text' class='form-control' id='city' name='city' placeholder='Enter City'>
            </div>
            <div class='form-group col-md-6'>
            <label for='province'>Province</label>
            <input type='text' class='form-control' id='province' name='province' placeholder='Enter Province'>
            </div>
        </div>
        <div class="form-group">
          <label for="open">Open</label>
          <input type="time" class="form-control" id="open" name="open" placeholder="Opening Hours">
        </div>
        <div class="form-group">
          <label for="close">Close</label>
          <input type="time" class="form-control" id="close" name="close" placeholder="Closing Hours">
        </div>
      <button type="submit" name="saveBtn" class="btn btn-primary">Save</button>
      <!-- ///////////////////// -->
      </form>
    </div>
  </div>
</div>