<?php session_start();
$title = 'Delete account page';
require_once 'includes/header.php';
require_once 'includes/nav.php';
require_once "connection.php";

if(isset($_SESSION['cusId']) && $_SESSION["loginId"]){
    $cusid = $_SESSION["cusId"];
    $logId = $_SESSION["loginId"];
    $uname = $_SESSION["username"];
    $email = $_SESSION["email"];
    $sql = "SELECT * FROM customer WHERE id = $cusid";
    if($result = $conn->query($sql)){
        $row = $result->fetch_assoc();
        $fname = $row["firstName"];
        $lname = $row["lastName"];
    }
}
?>

<div class="container" style="margin-left:700px;padding-top:20px">
            <div class="jumbotron jumbotron-fluid" style="height:650px;width:560px">
                <div class="container">
                    <h1 class="display-4">Delete Account</h1>
                    <hr>
                            <div class="col-sm-5">
                                    <div class="card main" style="height:350px;width:500px;margin-top:50px">
                                    <div class="card-body pt-1">
                                        <form action="customer/deletesql.php" method="post">
                                            <input type="hidden" name="cusId" value = "<?= $cusid?>">
                                            <input type="hidden" name="logId" value = "<?= $logId?>">
                                            <input type="hidden" name="fname" value = "<?= $fname?>">
                                            <input type="hidden" name="rname" value = "<?= $rname?>">
                                            <input type="hidden" name="uname" value = "<?= $uname?>">
                                            <input type="hidden" name="email" value = "<?= $email?>">

                                            <label>Username: <b><?= $uname?></b></label>
                                            <br>
                                            <label>First Name: <b><?= $fname?></b></label>
                                            <br>
                                            <label>Last Name: <b><?= $lname?></b></label>  
                                            <Br>
                                            <label>Email: <b><?= $email?></b></label>  
                                            <br>
                                            <label>Reason for deleting:</la bel>                                               
                                                <textarea type="textarea" name="reason" class="form-control" style="width:450px"></textarea>
                                                <Br>                                                
                                                <button name="submit" name="submit" name="submit" class="btn btn-primary" type="submit">Delete</button> 
                                        </form> 
                                    </div>
                                </div>
                            </div>       
                </div>
            </div>
</div>
<?php 
require_once 'includes/footer.php';

?>