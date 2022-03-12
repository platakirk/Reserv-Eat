<!DOCTYPE html>
<html>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
<?php
session_start();
require 'connection.php'; 
$title = 'Feedback Page';
require_once 'includes/header.php';

require_once 'includes/nav.php';
$id = $_SESSION["loginId"];
$id_query = mysqli_query($conn,"SELECT * FROM restaurant WHERE restLoginId = '$id' ");
$getid = mysqli_fetch_array($id_query);
$resid = $getid['id'];

if (isset($_POST['approve'])){
    $newfeedbackid = $_POST['feedbackid'];
    $approve = mysqli_query($conn,"UPDATE feedback SET status = 'approved' WHERE feedbackID = '$newfeedbackid' ");
    if ($approve){
        echo "<script> alert ('Feedback has been approved')</script>";
    }
}

if (isset($_POST['reject'])){
    $newfeedbackid = $_POST['feedbackid'];
    $reject = mysqli_query($conn,"UPDATE feedback SET status = 'disapproved' WHERE feedbackID = '$newfeedbackid' ");
    if ($reject){
        echo "<script> alert ('Feedback has been rejected')</script>";
    }
}
?>

<div class="container-fluid">
      <div class="row">   
<?php
include "restaurant/sidebar-res.php";
?>
        <div class="col-9">
            <h4 class="mt-1"><?php if(isset($_SESSION["resName"])){echo "Account name: " . $_SESSION["resName"]; }?></h4>
            <?php echo "<h4>".$resid."</h4>"; ?>
            <?php
                if (isset($_GET["select"])){
                    if($_GET["select"] == "staff"){
                        include "staff-check.php";
                    }
                    else if($_GET["select"] == "menu"){
                        include "menu-add.php";
                    }
                    else if($_GET["select"] == "deleteCat"){
                        include "delete-cat.php";
                    }
                    else if($_GET["select"] == "updateCat"){
                        include "update-cat.php";
                    }
                }
            ?>
                <div class = "row">
        <div class = "col-md-12">
            <div class = "card shadow mb-4">
                <div class = "card-header py-3">
                    <div class = "row">
                        <div class = "col">
                            <h6 class = "m-0 font-weight-bold text primary">Feedbacks</h6>
                        </div>
                    </div>
                </div>
                <div class = "card-body">
                    <div id = "table_status">
                        <div class = "row">

                                       <div class="table-wrapper-scroll-y my-custom-scrollbar2">
                                        <form method = "POST">
                                            <table id="table" class="table table-bordered table-striped"> 
                                                <thead>
                                                    <tr>      
                                                        <th>Customer Name</th>     
                                                        <th>Feedback</th>    
                                                        <th>Status</th>
                                                        <th>Action</th>       
                                                    </tr>
                                                        <?php
                                                            $list = mysqli_query($conn,"SELECT * FROM feedback WHERE restaurantId = '$resid' AND status = 'pending' OR status = 'approved' OR status = 'disapproved' ");
                                                            while ($get = mysqli_fetch_array($list)){
                                                                $feedbackid = $get['feedbackID'];
                                                                $customerid = $get['customerId'];
                                                                $feedback = $get['feedback'];
                                                                $status = $get['status'];
                                                                echo "<form method = 'POST'>";
                                                                echo "<input type = 'hidden' name = 'feedbackid' value = '".$feedbackid."' >";
                                                                $nameq = mysqli_query($conn,"SELECT * FROM customer WHERE id = '$customerid' ");
                                                                $getname = mysqli_fetch_array($nameq);
                                                                $fname = $getname['firstName'];
                                                                $lname = $getname['lastName'];
                                                                $name = $fname." ".$lname;
                                                                if(!isset($fname) || isset($lname)){
                                                                    $fname = $lname = "";
                                                                }
                                                            echo '<tr>
                                                            <td>'.$name.'</td>
                                                            <td>'.$feedback.'</td>
                                                            <td>'.$status.'</td>';

                                                            echo '<td>'; 
                                                                if ($status == 'approved'){
                                                                  echo '<button type = "submit" name = "reject" class = "btn btn-danger">Reject</button>';
                                                                }else if ($status == 'disapproved'){
                                                                    echo '<button type = "submit" name = "approve" class = "btn btn-success">Approve</button>';
                                                                }else{
                                                                    echo '<button type = "submit" name = "approve" class = "btn btn-success">Approve</button>';
                                                                    echo '<button type = "submit" name = "reject" class = "btn btn-danger">Reject</button>';
                                                                }
                                                                echo '</td>';
                                                            echo "</form>";
                                                        }
                                                            ?>
                                                        </tr>
                                                </thead>
                                            </table>
                                            </form> 
                                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
</div>
<?php

require_once 'includes/footer.php'; ?>
?>