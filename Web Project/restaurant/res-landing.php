<?php
require_once 'connection.php'; 
$id = $_SESSION["loginId"];
?>

<!-- modal start -->
<div class="modal fade" id="srchModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content mx-auto" style="max-width: 500px">
                <div class="modal-header">
                    <h1>Reservation</h1>
                </div>
                <div class="modal-body">
                    <form action="landing.php" method="POST">
                            <input type="hidden" id="rid" name ="rid">
                        <div class="form-group">
                            <label for="rname">Restaurant Name</label>
                            <input type="text" class="form-control" id="rname" name="rname" readonly>
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date" >
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="time" class="form-control" id="time" name="time">
                        </div>
                        <div class="form-group">
                            <label for="seat">Seats</label>
                            <input type="number" min="1"class="form-control" id="seat" name="seat" placeholder="Number of Seats">
                        </div>           
                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="resbtn">Reserve</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
<!-- modal end-->

<div class="container-fluid">
    <div class="row">   
        <?php
            include "sidebar-res.php";
        ?>
    
        <div class="col-9">
            <h4 class="mt-1"><?php if(isset($_SESSION["resName"])){echo "Account name: " . $_SESSION["resName"]; }?></h4>
            <?php
                if (isset($_GET["select"])){
                    if($_GET["select"] == "staff"){
                        include "staff-check.php";
                    }
                    else if($_GET["select"] == "addmenu"){
                        include "menu-add.php";
                    }
                    else if($_GET["select"] == "viewmenu"){
                        include "view-cat.php";
                    }
                    else if($_GET["select"] == "deleteCat"){
                        include "delete-cat.php";
                    }
                    else if($_GET["select"] == "updateCat"){
                        include "update-cat.php";
                    }
                    else if($_GET["select"] == "deleteItem"){
                        include "item-delete.php";
                    }
                    else if($_GET["select"] == "updateItem"){
                        include "item-update.php";
                    }
                }
                    else{ ?>
                        <div class = "row">
                        <div class = "col-md-12">
                            <div class = "card shadow mb-4">
                                <div class = "card-header py-3">
                                    <div class = "row">
                                        <div class = "col">
                                            <h6 class = "m-0 font-weight-bold text primary"> Live Table Status </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class = "card-body">
                                    <div id = "table_status">
                                        <div class = "row"> 
                                            <?php
                                            $list = mysqli_query($conn, "SELECT * from res_table WHERE resID = '$id' AND status = 'Active' ");
                                            while($get = mysqli_fetch_array($list)){
                                            $tid = $get['id'];
                                            $name = $get['name'];
                                            $seats = $get['seats'];
                                            $status = $get['status'];
                                            echo '<div class = "col-lg-2 mb-3">
                                                <div class = "card bg-light text-black shadow" style="height: 180px; width : 225;">
                                                    <div class = "card-body">
                                                    '.$name.'
                                                    <div class = "nt-1 text-black-58 small">'.$seats.'Seats </div>
                                                    </div>
                                                </div>
                                            </div>';
                                            }   
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
                    <?php
                    }
            ?>
    

</div>