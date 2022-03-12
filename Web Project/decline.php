<?php session_start();
$title = 'Decline page';
require_once 'includes/header.php';
require_once 'includes/nav.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $rname = $_GET['resName'];
    $fname = $_GET['fname'];
    $lname = $_GET['lname'];
    $resId = $_GET['resId'];
}
?>

<div class="container" style="margin-left:700px;padding-top:50px">
            <div class="jumbotron jumbotron-fluid" style="height:650px;width:560px">
                <div class="container">
                    <h1 class="display-4">Decline Application</h1>
                    <hr>
                            <div class="col-sm-5">
                                    <div class="card main" style="height:350px;width:500px;margin-top:50px">
                                    <div class="card-body pt-1">
                                        <form action="admin/declinesql.php" method="post">
                                            <input type="hidden" name="id" value = "<?= $id?>">
                                            <input type="hidden" name="resId" value = "<?= $resId?>">
                                            <input type="hidden" name="fname" value = "<?= $fname?>">
                                            <input type="hidden" name="rname" value = "<?= $rname?>">
                                            <label>Restaurant Name: <b><?= $rname?></b></label>
                                            <br>
                                            <label>First Name: <b><?= $fname?></b></label>
                                            <br>
                                            <label>Last Name: <b><?= $lname?></b></label>  
                                            <Br>
                                            <label>Reason for declining:</label>                                               
                                                <textarea type="textarea" name="reason" class="form-control" style="width:450px"></textarea>
                                                <Br>                                                
                                                <button name="submit" name="submit" class="btn btn-primary" type="submit">Decline</button> 
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