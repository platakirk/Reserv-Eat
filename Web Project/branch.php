<?php
session_start();
$title = 'Branch page';
require_once 'includes/header.php';
require 'connection.php';

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: welcome.php");
    exit;
} 

$success = "<div class='alert alert-success' role='alert'>
Successfully added restaurant.</a> 
</div>";
$delete = "<div class='alert alert-danger' role='alert'>
Successfully deleted restaurant.</a> 
</div>";

if(isset($_GET['add'])){
  if($_GET['add'] == 'success'){
    echo $success;
    unset($_GET['add']);
  }
}
if(isset($_GET['delete'])){
    if($_GET['delete'] == 'success'){
      echo $delete;
      unset($_GET['delete']);
    }
  }

?>

<div class="container" style="margin-left:600px;padding-top:50px;">
            <div class="jumbotron jumbotron-fluid" style="height:650px;width:660px">
                <div class="container">
                    <h1 class="display-4">Choose a branch</h1>
                    <hr>
                            <div class="col-sm-5">
                                <div class="card main" style="height:350px;width:600px;margin-top:50px">
                                    <div class="card-body pt-1" style="overflow:auto">
                                        <table class="table table-bordered table-striped">
                                            <thead class="text-light bg-dark">
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Restaurant Name</th>
                                                    <th>Location</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                    if($_SESSION['loginId']){
                                                        $id = $_SESSION['loginId'];
                                                        $sql = "SELECT * FROM restaurant WHERE restLoginId = $id";
                                                        if($result = $conn->query($sql)){
                                                            while($row = $result->fetch_assoc()){ ?>
                                                            <tr>
                                                                <th><?= $row['id']?></th>
                                                                <th><?= $row['restaurantName']?></th>
                                                                <th><?= $row['barangay'] . ', ' . $row['city']?></th>
                                                                <th>
                                                                    <form action='restaurant/check-res-new.php' method='POST'>
                                                                        <input type='hidden' name='id' value='<?= $row['id']?>'>
                                                                        <button type='submit' class='btn btn-success' name='submit'>select</button>
                                                                        <button type='submit' class='btn btn-danger' name='delete'>delete</button>
                                                                    </form>
                                                                </th>
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
                            
                            <a href="addbranch.php" class="btn btn-primary mt-3 ml-3">Add new</a>
                 </div>
            </div>
</div>