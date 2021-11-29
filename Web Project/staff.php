<?php
session_start();
require_once 'connection.php'; 

$title = 'Staff page';
require_once 'includes/header.php';
require 'includes/nav.php';

$addErr = $delErr = $updErr= $searchErr = "";

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
    <!-- addStaff modal start-->
    <div class="modal fade" id="addModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Add Staff</h1>
                </div>
                <div class="modal-body">
                    <form action="restaurant/staff/add-staff.php" method="POST">
                        <div class="form-group">
                            <label for="uname">Username</label>
                            <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="pword">Password</label>
                            <input type="password" class="form-control" id="pword" name="pword" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label for="fname">Firt Name</label>
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name">
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
                                <input type="text" class="form-control" id="contactnum" name="cnum" placeholder="Enter Contact Number">            
                            </div>
                        </div>            
                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- modal end-->
    <!-- editStaff modal start-->
    <div class="modal fade" id="updModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Update Staff</h1>
                </div>
                <div class="modal-body">
                    <form action="restaurant/staff/upd-staff.php" method="POST">
                        <input type="hidden" id="sid" name="eid">
                        <div class="form-group">
                            <label for="uname">Username</label>
                            <input type="text" class="form-control" id="suname" name="euname" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="pword">Password</label>
                            <input type="password" class="form-control" id="spword" name="epword" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control" id="sfname" name="efname" placeholder="Enter First Name">
                        </div>
                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" class="form-control" id="slname" name="elname" placeholder="Enter Last Name">
                        </div>
                        <div class="form-group">
                            <label for="contactnum">Contact number</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text">
                                    +63
                                </div>
                                </div>  
                                <input type="text" class="form-control" id="scnum" name="ecnum" placeholder="Enter Contact Number">            
                            </div>
                        </div>            
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- modal end-->
    <!-- deleteStaff modal start-->
    <div class="modal fade" id="delModal">
    <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Delete Staff</h1>
                </div>
                <div class="modal-body">
                    <form action="restaurant/staff/del-staff.php" method="POST">
                        <input type="hidden" id="did" name="eid">
                        <div class="form-group">
                            <label for="uname">Username</label>
                            <input type="text" class="form-control" id="duname" name="euname" disabled>
                        </div>
                        <div class="form-group">
                            <label for="pword">Password</label>
                            <input type="password" class="form-control" id="dpword" name="epword" disabled>
                        </div>
                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control" id="dfname" name="efname" disabled>
                        </div>
                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" class="form-control" id="dlname" name="elname" disabled>
                        </div>
                        <div class="form-group">
                            <label for="contactnum">Contact number</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text">
                                    +63
                                </div>
                                </div>  
                                <input type="text" class="form-control" id="dcnum" name="ecnum" disabled>            
                            </div>
                        </div>            
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- modal end-->
    <div class="container">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <h5 class='card-title'>Search Staff Profile</h5>
                    <div class="form-group">
                        <form action='staff.php' method='post'>
                            <div class="form-row">
                                <input type='text' class='form-control col-md-6' id='searchStaff' name='searchStaff' 
                                placeholder='Staff Id / Username / First Name / Last Name / Contact Number'>&nbsp;&nbsp;&nbsp;
                                <button type="submit" name="searchBtn" class='btn btn-primary'>Search</button>
                            </div>
                        </form>           
                            <br>    
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add staff</button>
                            <hr>
                        <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                <table id="table" class="table table-bordered table-striped"> 
                                    <thead class="text-light bg-dark">
                                        <tr>
                                            <th>Id</th>       
                                            <th>Username</th>    
                                            <th>Password</th>    
                                            <th>First Name</th>    
                                            <th>Last Name</th>    
                                            <th>Contact Number</th>    
                                            <th>Status</th>    
                                            <th>Date Added</th>    
                                            <th>Actions</th>     
                                        </tr>     
                                    </thead>              
                                    <?php
                                        require_once 'connection.php';                                                            
                                        require_once 'restaurant/staff/search-staff.php';
                                    ?>
                                </table>
                        </div>
                    </div>
                </div>            
            </div>
        </div>
    </div>
<?php require_once 'includes/footer.php'; ?>