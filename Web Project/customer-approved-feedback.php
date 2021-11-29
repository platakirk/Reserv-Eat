<!DOCTYPE html>
<html>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
<?php
session_start();
require 'connection.php'; 
$title = 'Annual Subscription';
require_once 'includes/header.php';

require_once 'includes/nav.php';
$id = $_REQUEST['id'];
$query_name = mysqli_query($conn,"SELECT * FROM restaurant WHERE id = '$id' ");
$getname = mysqli_fetch_array($query_name);
$restname = $getname['restaurantName'];
?>
  
<?php
if (isset($_POST["resbtn"]) && isset($_POST["date"]) && isset($_POST["time"]) && isset($_POST["seat"])){
    require "customer/reservation.php";
}
?>

 
 <div class="container">
    <div class="jumbotron jumbotron-fluid py-2 mt-3" style="height: 700px">
        <div class="container">
            <h4><?php echo $restname ?> - Feedback</h4>
            <hr>
                                        <table width="100%" class = "table">
                                                <thead>
                                                    <tr>      
                                                        <th>Customer Name</th>     
                                                        <th>Feedback</th>    
                                                    </tr>
                                                        <?php
                                                            $list = mysqli_query($conn,"SELECT * FROM feedback WHERE restaurantId = '$id' AND status = 'approved' ");
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
                                                            echo '<tr>
                                                            <td>'.$fname.'</td>
                                                            <td>'.$feedback.'</td>';
                                                            echo "</form></tr>";
                                                        }
                                                            ?>
                                                </thead>
                                            </table>
        </div>
    </div>
    <center>
    <a href = "landing.php"><button type = "button" class = "btn btn-warning" style = "float : inherit; margin-bottom: 50px;">Back</button></a>
</center>
</div>
<?php

require_once 'includes/footer.php'; ?>
?>