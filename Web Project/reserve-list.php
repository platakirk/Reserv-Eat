<?php
session_start();
$title = 'Main page';
require_once 'includes/header.php';
require_once 'includes/nav.php';
require 'connection.php';
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: welcome.php");
    exit;
} 

if (isset($_GET["cancel"])){
    if($_GET["cancel"] == "yes"){
        echo "<div class='alert alert-success' role='alert'>
               Cancelled successfully.</a> 
                </div>";
    }
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql ="UPDATE reservation SET status = 'cancelled' where id = $id";
    if($conn->query($sql)){
        $alert ="<div class='alert alert-success' role='alert'>
                Cancelled Successfully.</a> 
            </div>";
        echo $alert;
        unset($alert);
    }
}
?>
<!-- modal start -->
<div class="modal fade" id="canModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content mx-auto" style="max-width: 300px">                
                <div class="modal-body">
                    <form action="customer/cancel-reserve.php" method="POST">
                            <input type="hidden" id="rcid" name ="rcid">  
                    <h2>Are you sure you want to cancel?</h2>      
                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-success" name="canbtn">Yes</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
<!-- modal end-->

<div class="container">

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link btn-warning" role="tab" data-toggle="tab" href="#pending">Pending Reservation</a>
        </li>
        <li class="nav-item">
            <a class="nav-link btn-success" role="tab" data-toggle="tab" href="#accepted">Accepted Reservation</a>
        </li>
        <li class="nav-item">
            <a class="nav-link btn-danger" role="tab" data-toggle="tab" href="#cancelled">Cancelled Reservation</a>
        </li>
    </ul>
    <div class="tab-content">
        <div role ="tabpanel" class="tab-pane active" id = "pending">
            <div class="container">
            <div class="jumbotron jumbotron-fluid py-2 mt-3" style="height: 900px">
                <h1 class="display-4">Reservations</h1>
                <hr>
                <div class="table-wrapper-scroll-y my-custom-scrollbar mt-3">
                    <table id="table" class="table table-bordered table-striped text-center" style="height: 100px">
                        <thead class="text-light bg-dark">
                            <tr>
                                <th>Reservation no.</th>
                                <th>Details</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $color = "";
                                $disa = "disabled";
                                $cid = $_SESSION["cusId"];
                                $sql = "SELECT restaurant.id as resId, reservation.id, restaurant.restaurantName, reservation.date, reservation.time, 
                                        reservation.seats, reservation.status FROM reservation
                                        INNER JOIN restaurant on reservation.restaurantId = restaurant.id
                                        WHERE reservation.customerId = $cid and reservation.status ='pending'ORDER BY reservation.id ASC";

                                if($result = $conn->query($sql)){
                                    if($result->num_rows > 0){
                                    while( $row = $result->fetch_assoc()){
                                        $stat = $row["status"];
                                        if($stat == "pending"){$color = "warning"; $disa = "";}
                                        else if ($stat == "cancelled"){$color = "danger"; $disa = "disabled";}
                                        else if ($stat == "accepted"){$color = "success"; $disa = "disabled";}
                                        else if ($stat == "rejected"){$color = "warning"; $disa = "disabled";}  ?>
                                            <tr>
                                                    <td><?php echo $row["id"]?></td>
                                                    <td><?php echo "<b>Restaurant name:</b> " .$row["restaurantName"].
                                                                    "<br><b>Date:</b> " .$row["date"].
                                                                    "<br><b>Time:</b> " .$row["time"].
                                                                    "<br><b>Seat/s:</b> " .$row["seats"];
                                                    ?></td>                                    
                                                    <td><p class='bg-<?=$color ?>'><?php echo $row["status"] ?></p></td>
                                                    <td>
                                                        <a href="reserve-list.php?id=<?= $row['id']?>" class="btn btn-outline-danger canbtn">Cancel</a>
                                                        <br>
                                                        <br>
                                                        <a type="button" href="res-select.php?id=<?= $row['resId']?>"class="btn btn-outline-primary">Menu</button>
                                                    </td>
                                            </tr>
                            
                                <?php
                                    }
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
        <div role ="tabpanel" class="tab-pane" id = "accepted">
            <div class="container">
                <h1 class="display-4">Reservations</h1>
                <hr>
                <div class="table-wrapper-scroll-y my-custom-scrollbar mt-3">
                    <table id="table" class="table table-bordered table-striped text-center" style="height: 100px">
                        <thead class="text-light bg-dark">
                            <tr>
                                <th>Reservation no.</th>
                                <th>Details</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $color = "";
                                $disa = "disabled";
                                $cid = $_SESSION["cusId"];
                                $sql = "SELECT restaurant.id as resId, reservation.id, restaurant.restaurantName, reservation.date, reservation.time, 
                                        reservation.seats, reservation.status FROM reservation
                                        INNER JOIN restaurant on reservation.restaurantId = restaurant.id
                                        WHERE reservation.customerId = $cid and reservation.status ='accepted'ORDER BY reservation.id ASC";

                                if($result = $conn->query($sql)){
                                    if($result->num_rows > 0){
                                    while( $row = $result->fetch_assoc()){
                                        $resid = $row['resId'];
                                        $stat = $row["status"];
                                        if($stat == "pending"){$color = "warning"; $disa = "";}
                                        else if ($stat == "cancelled"){$color = "danger"; $disa = "disabled";}
                                        else if ($stat == "accepted"){$color = "success"; $disa = "disabled";}
                                        else if ($stat == "rejected"){$color = "warning"; $disa = "disabled";}  ?>
                                            <tr>
                                                    <td><?php echo $row["id"]?></td>
                                                    <td><?php echo "<b>Restaurant name:</b> " .$row["restaurantName"].
                                                                    "<br><b>Date:</b> " .$row["date"].
                                                                    "<br><b>Time:</b> " .$row["time"].
                                                                    "<br><b>Seat/s:</b> " .$row["seats"];
                                                    ?></td>                                    
                                                    <td><p class='bg-<?=$color ?>'><?php echo $row["status"] ?></p></td>
                                                    <td>
                                                    <?php
                                                    if ($stat == "accepted"){
                                                        echo "<a href='feedback.php?cid=$cid&resid=$resid'><button type='button' class='btn btn-outline-success canbtn'>Feedback</button></a>";
                                                    }
                                                    ?>
                                                    <br>
                                                    <br>
                                                        <a type="button" href="res-select.php?id=<?= $row['resId']?>"class="btn btn-outline-primary">Menu</button>
                                                    </td>
                                            </tr>
                            
                                <?php
                                    }
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div role ="tabpanel" class="tab-pane" id = "cancelled">
            <div class="container">
                <h1 class="display-4">Reservations</h1>
                <hr>
                <div class="table-wrapper-scroll-y my-custom-scrollbar mt-3">
                    <table id="table" class="table table-bordered table-striped text-center" style="height: 100px">
                        <thead class="text-light bg-dark">
                            <tr>
                                <th>Reservation no.</th>
                                <th>Details</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $color = "";
                                $disa = "disabled";
                                $cid = $_SESSION["cusId"];
                                $sql = "SELECT restaurant.id as resId, reservation.id, restaurant.restaurantName, reservation.date, reservation.time, 
                                        reservation.seats, reservation.status FROM reservation
                                        INNER JOIN restaurant on reservation.restaurantId = restaurant.id
                                        WHERE reservation.customerId = $cid and reservation.status ='cancelled' ORDER BY reservation.id ASC";

                                if($result = $conn->query($sql)){
                                    if($result->num_rows > 0){
                                    while( $row = $result->fetch_assoc()){
                                        $stat = $row["status"];
                                        if($stat == "pending"){$color = "warning"; $disa = "";}
                                        else if ($stat == "cancelled"){$color = "danger"; $disa = "disabled";}
                                        else if ($stat == "accepted"){$color = "success"; $disa = "disabled";}
                                        else if ($stat == "rejected"){$color = "warning"; $disa = "disabled";}  ?>
                                            <tr>
                                                    <td><?php echo $row["id"]?></td>
                                                    <td><?php echo "<b>Restaurant name:</b> " .$row["restaurantName"].
                                                                    "<br><b>Date:</b> " .$row["date"].
                                                                    "<br><b>Time:</b> " .$row["time"].
                                                                    "<br><b>Seat/s:</b> " .$row["seats"];
                                                    ?></td>                                    
                                                    <td><p class='bg-<?=$color ?>'><?php echo $row["status"] ?></p></td>
                                                    <td>
                                                        <br>
                                                        <a type="button" href="res-select.php?id=<?= $row['resId']?>"class="btn btn-outline-success">Book again</button>
                                                        <br>
                                                    </td>
                                            </tr>
                            
                                <?php
                                    }
                                    }
                                }
                                $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once 'includes/footer.php';
?>