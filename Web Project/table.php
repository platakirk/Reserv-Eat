<?php
session_start();
require_once 'connection.php'; 
$title = 'Staff page';
require_once 'includes/header.php';
require 'includes/nav.php';
$id = $_SESSION["loginId"];
$addErr = $delErr = $updErr= $searchErr = "";

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if (isset($_POST['add'])){
    $resID = $_SESSION["loginId"];
    $tname = $_POST['name'];
    $seats = $_POST['seats'];
    $insert = mysqli_query($conn,"INSERT INTO `res_table`(`name`, `seats`, `status`, `resID`) VALUES ('$tname','$seats','Active','$id')");
            if ($insert){
                echo "<script> alert('Table Added')</script>'";
            }else{
                echo "<script> alert('GG')</script>'";
            }
}

if (isset($_POST['update'])){
    $new_tableid = $_POST['tableid'];
    $new_table = $_POST['new_table'];
    $new_seats = $_POST['new_seats'];
    $new_status = $_POST['new_status'];
    $update = mysqli_query($conn,"UPDATE res_table SET name = '$new_table', seats = '$new_seats', status = '$new_status' WHERE id = '$new_tableid' ");
    if ($update){
    echo "<script> alert('Table Updated')</script>'";
    }else{
    echo "<script> alert('GG')</script>'";
    }
}

if (isset($_POST['delete'])){
    $new_tableid = $_POST['tableid'];
    /*$delete = mysqli_query($conn,"DELETE FROM res_table WHERE id = '$new_tableid' ");
            if ($delete){
                echo "<script> alert('Updated')</script>'";
            }else{
                echo "<script> alert('GG')</script>'";
            }
            */
    header("location: tabledelete.php?id=$new_tableid");
}

?>
<!-- Modal -->
    <div class="modal fade" id="addModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Add Table</h1>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="uname">Table Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Table Name:">
                        </div>
                        <div class="form-group">
                            <label for="fname">Seats</label>
                            <input type="number" class="form-control" id="seats" name="seats" placeholder="Enter Seats Capacity" onkeydown="javascript: return event.keyCode == 69 ? false : true" min="0">
                        </div>       
                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name = "add">Add</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <h5 class='card-title'>List of Tables</h5>
                    <div class="form-group">          
                            <br>    
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add Table</button>
                            <hr>
                        <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                <table id="table" class="table table-bordered table-striped"> 
                                    <thead class="text-light bg-dark">
                                        <tr>
                                            <th>Table ID</th>       
                                            <th>Table Name</th>    
                                            <th>Seats</th>    
                                            <th>Status</th>
                                            <th>Option</th>       
                                        </tr>
                                        <?php
                                        $list = mysqli_query($conn, "SELECT * from res_table WHERE resID = '$id'");
                                        while($get = mysqli_fetch_array($list)){
                                        $tid = $get['id'];
                                        $name = $get['name'];
                                        $seats = $get['seats'];
                                        $status = $get['status'];
                                        echo "<form method = 'POST'>";
                                        echo "<tr align='center'>";
                                        echo "<input type = 'hidden' name = 'tableid' value = '".$tid."'> ";
                                        echo "<td>".$tid."</td>";
                                        echo "<td>".$name."</td>";
                                        echo "<td>".$seats."</td>";
                                        echo "<td>".$status."</td>";
                                        echo "<td>  <button type='button' class='btn btn-success' data-toggle='modal' data-target='#myModal".$tid."'>Update</button>
                                                    <button type='submit' class='btn btn-danger' name = 'delete'>Delete</button></td>";
                                        echo "</form>";
                                        echo "</tr>";
                                        echo '<div id="myModal'.$tid.'" class="modal fade" role="dialog">
                                              <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1>Update '.$name.'</h1>
                                                    </div>
                                                  <div class="modal-body">
                                                  <form method = "POST">
                                                    <input type = "hidden" name = "tableid" value = "'.$tid.'">
                                                    <div class="form-group">
                                                        <label>Table Name</label>
                                                        <input type="text" name="new_table" class="form-control" placeholder="Table Name" value = "'.$name.'" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Table Capacity</label>
                                                        <input type="text" name="new_seats" class="form-control" placeholder="First name" value = "'.$seats.'" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select name = "new_status" class = "form-control">
                                                            <option value = "Active"> Active </option>
                                                            <option value = "Disabled"> Disabled</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                    <center>
                                                        <button type = "submit" name = "update" class = "btn btn-success">update</button>
                                                    </center>
                                                    </div>
                                                        </form>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                  </div>
                                                </div>

                                              </div>
                                            </div>
                                            </div>';
                                        }

                                ?>
                                    </thead>            
                                </table>
                        </div>
                    </div>
                </div>            
            </div>
        </div>
    </div>
<?php require_once 'includes/footer.php'; ?>