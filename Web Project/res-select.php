<?php
session_start();
$title = 'Main page';
require_once 'includes/header.php';
require_once 'includes/nav.php';
require_once 'connection.php';

$customerid = $_SESSION['cusId'];
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: welcome.php");
    exit;
} 

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $sql = "SELECT * FROM restaurant WHERE id = $id";
    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $rname = $row["restaurantName"];
        $address = $row["city"];
        $desc = $row["description"];
        $resID = $row['restLoginId'];
        }
    }
}

if (isset($_POST['choosetable'])){
    $selectedtables = $_POST['table'];
    $tablescount = count($selectedtables);
    $try = implode(",",$selectedtables);
    $loginid = $_SESSION["loginId"];
    $datetoday = date("Y-m-d H:i:s");
    //pre insertment for reservation
    for ($i = 0; $i <$tablescount; $i++){
    $tableid = $selectedtables[$i];
    $getseat_query = mysqli_query($conn,"SELECT * FROM res_table WHERE id = $tableid");
    while ($getseat = mysqli_fetch_array($getseat_query)){
    $newseats = $getseat['seats'];
    $addtoreservation = mysqli_query($conn,"INSERT INTO reservation ( restaurantid, customerId, date, time, table_id, seats, status, feedback, dateAdded) VALUES ($id,$customerid,null,null,'$tableid','$newseats','pending1','','$datetoday')");
        }
    }
        if ($addtoreservation){
            echo "<script> alert ('Successfully Added') </script>";
        }else{
            echo "<script> alert ('INSERT INTO reservation ('$id','$customerid','','','$tableid','','pending','','$datetoday')') </script>";
        }

}


    if (isset($_POST['resbtn'])){
        $getdate = $_POST['date'];
        $gettime = $_POST['time'];
        $converted_time = date("H:i:s", strtotime($gettime));
        $updatereservations = mysqli_query($conn,"UPDATE reservation SET time = '$converted_time' , date = '$getdate' , status = 'pending' WHERE customerId = $customerid AND status = 'pending1' AND restaurantId = $id ");
        if ($updatereservations){
            echo "<script> alert ('Successfully Added') </script>";
        }else{
            echo "<script> alert ('INSERT INTO reservation ('$id','$customerid','','','$tableid','','pending','','$datetoday')') </script>";
        }
        

    }

    if (isset($_GET['deleteid'])){
        $id = $_GET["id"];
        $new_tableid = $_GET['deleteid'];    
        $removetable_query = mysqli_query($conn, "DELETE FROM reservation WHERE table_id  = '$new_tableid' AND customerId = '$customerid' AND restaurantid = '$id' AND status = 'pending1' ");
        ?>
         <script>history.pushState(null, "", "/ReservEat/res-select.php?id=<?php echo $id; ?>") </script>
            <?php
        if ($removetable_query){
            echo "<script> alert ('Successfully removed');
            </script>";
        }else{
            echo "<script> alert ('tanganeto') </script>";
        }
    }

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $_SESSION["resIdko"] = $id;
        $sql = "SELECT * FROM restaurant WHERE id = $id";
        if($result = $conn->query($sql)){
            if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $rname = $row["restaurantName"];
            $address = $row["city"];
            $desc = $row["description"];
            $addresslong = $row["address1"].", ".$row["barangay"];
            }
        }
    }
?>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="pl-3"><?=$rname?></h2>
                <div class="jumbotron jumbotron-fluid pt-3 pl-3" style="overflow:auto">
                    <h5>About the restaurant</h5>
                    <h6><?=$desc?></h4>
                    <h5>Location</h5>
                    <h6><?=$addresslong?></h4>
                    <h6><?=$address?></h4>
                    <br>
                    <h6>Opening hours:
                <?php 
                    $sql = "SELECT open, close FROM restaurant WHERE id = $id";
                    if($result = $conn->query($sql)){
                        if($result->num_rows > 0){        
                            $row = $result->fetch_assoc();
                                $open = $row["open"]; 
                                $close = $row["close"];
                                $open = date("h:i a", strtotime($open));
                                $close = date("h:i a", strtotime($close));  ?>
                                
                                <h7><?= $open . '-' . $close?></h7>
                                <?php
                        }
                    }
                ?>
                </h6>
                    <hr>
                    <h1>MENU</h1> 
                    <div>
                    <table class="table table-bordered table-striped">
                        <thead class="text-light bg-dark">
                            <tr>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                require_once 'customer/cus-menu.php';
                            ?>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
            <div class="col-4 mt-5">
                <div class="jumbotron jumbotron-fluid pt-4">
                    <div class="container">
                        <Label>Reservation details</label>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Choose table</button>
                        <hr>
                        <form method = "POST">
                            <input type="hidden" id="rid" name="rid" value="<?= $id?>">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" name="date"> 
                            </div>
                            <div class="form-group">
                                <label for="time">Time</label>
                                    <div class='input-group date'>
                                        <input class = "timepicker timepicker-without-drowndown text-center" class = "form-control" name = "time">
                                        <!--<select name="time">
                                            <option value="00:00:00">12:00 AM</option>
                                            <option value="01:00:00">01:00 AM</option>
                                            <option value="02:00:00">02:00 AM</option>
                                            <option value="03:00:00">03:00 AM</option>
                                            <option value="04:00:00">04:00 AM</option>
                                            <option value="05:00:00">05:00 AM</option>
                                            <option value="06:00:00">06:00 AM</option>
                                            <option value="07:00:00">07:00 AM</option>
                                            <option value="08:00:00">08:00 AM</option>
                                            <option value="09:00:00">09:00 AM</option>
                                            <option value="10:00:00">10:00 AM</option>
                                            <option value="11:00:00">11:00 AM</option>
                                            <option value="12:00:00">12:00 PM</option>
                                            <option value="13:00:00">01:00 PM</option>
                                            <option value="14:00:00">02:00 PM</option>
                                            <option value="15:00:00">03:00 PM</option>
                                            <option value="16:00:00">04:00 PM</option>
                                            <option value="17:00:00">05:00 PM</option>
                                            <option value="18:00:00">06:00 PM</option>
                                            <option value="19:00:00">07:00 PM</option>
                                            <option value="20:00:00">08:00 PM</option>
                                            <option value="21:00:00">09:00 PM</option>
                                            <option value="22:00:00">10:00 PM</option>
                                            <option value="23:00:00">11:00 PM</option>
                                        </select> -->
                                        <span class="glyphicon glyphicon-time"></span>
                                    </div>
                            </div>
                            <hr>
                            <h6>Tables to be reserved </h6>
                            <?php
                                $rlist = mysqli_query($conn,"SELECT * FROM reservation WHERE status = 'pending1' AND customerId = $customerid");
                                while ($getlist = mysqli_fetch_array($rlist)){
                                    $tabid = $getlist['table_id'];
                                    $getnamequery = mysqli_query($conn,"SELECT * FROM res_table WHERE id = $tabid ");
                                        while ($get1 = mysqli_fetch_array($getnamequery)){
                                        $call_tname = $get1['name'];
                                        $call_tseats = $get1['seats'];
                                        echo '<a href="res-select.php?id='.$id.'&deleteid='.$tabid.'"> <button type="button" class="btn btn-danger btn-sm" name = "remove_table">x</button></a>';
                                        echo "<label>Table name :".$call_tname."</label> "; 
                                        echo "<label>|Seats: ".$call_tseats."</label><br>";
                                        }
                                    }
                            ?>
                            <!-- modal -->
                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Choose Table</h4> 
                                                </div>
                                            <div class="modal-body">
                                                <?php
                                                    $list = mysqli_query($conn,"SELECT * FROM res_table WHERE resID = $resID AND status = 'Active' ORDER BY name ASC ");
                                                    while ($get = mysqli_fetch_array($list)){
                                                        $tid = $get['id'];
                                                        $tname = $get['name'];
                                                        $seats = $get['seats'];
                                                        
                                                        echo '
                                                        <input type="checkbox" name="table[]" value="'.$tid.'">
                                                        <label for="table" style = width:70px;>'.$tname.'</label>
                                                        <label for="table">With '.$seats.' Seats</label><br>';
                                                    }
                                                ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type = "submit" name = "choosetable"  class = "btn btn-primary">Choose</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="modal-body">
                                    <button type="submit" class="btn btn-success" name="resbtn">Reserve</button>
                                   </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'includes/footer.php'; ?>