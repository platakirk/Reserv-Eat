<?php session_start();
$title = 'Delete account page';
require_once 'includes/header.php';
require_once "connection.php";

$id = $un = $fn = $ln ="";

if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $un = $_POST['un'];
    $fn = $_POST['fn'];
    $ln = $_POST['ln'];    
}

?>

<div class="container" style="margin-left:700px;padding-top:100px">
            <div class="jumbotron jumbotron-fluid" style="height:650px;width:560px">
                <div class="container">
                    <h1 class="display-4">Delete Branch</h1>
                    <hr>
                            <div class="col-sm-5">
                                    <div class="card main" style="height:350px;width:500px;margin-top:50px">
                                    <div class="card-body pt-1">
                                        <form action="restaurant/staff/del-staff.php" method="post">
                                            <input type="hidden" name="id" value = "<?= $id?>">
                                            <input type="hidden" name="username" value = "<?= $un?>">

                                            <label>Username: <b><?= $un?></b></label>
                                            <br>
                                            <label>First Name: <b><?= $fn?></b></label>
                                            <br>
                                            <label>Last Name: <b><?= $ln?></b></label>  
                                            <Br>
                                            <label>Reason for deleting:</label>                                               
                                                <textarea type="textarea" name="reason" class="form-control" style="width:450px"></textarea>
                                                <Br>                                                
                                                <button name="submit"  name="submit" onclick="return confirm('Are you sure you want to delete restaurant and all of its data?')"class="btn btn-primary" type="submit">Delete</button> 
                                        </form> 
                                    </div>
                                </div>
                            </div>       
                </div>
            </div>
</div>