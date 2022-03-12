<?php session_start();
require "connection.php";
$title = 'Decline page';
require_once 'includes/header.php';
require_once 'includes/nav.php';

if(isset($_GET['id'])){
    $tname = "";
    $id = $_GET['id'];
    $sql = "SELECT * FROM res_table WHERE id = $id";
    if($result = $conn->query($sql)){
        $row = $result->fetch_assoc();
        $tname = $row['name'];
        $seat = $row['seats'];
    }
    if(isset($_POST['submit'])){
        $reason = $_POST['reason'];
        $sql = "INSERT INTO deleteitem (itemId, name, category, reason) VALUES ($id , '$tname' , 'table', '$reason' )";
        if($conn->query($sql)){
            $sql="DELETE FROM res_table WHERE id=$id";
            if($conn->query($sql)){
                header("location: landing.php");
            }
        }
    }
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
                                        <form action="tabledelete.php?id=<?=$id?>" method="post">
                                            <label>Table name: <b><?= $tname?></b></label>
                                            <br>
                                            <label>Capacity: <b><?= $seat?></b></label>
                                            <Br>
                                            <label>Reason for deleting:</label>                                               
                                                <textarea type="textarea" name="reason" class="form-control" style="width:450px"></textarea>
                                                <Br>                                                
                                                <button name="submit" name="submit" class="btn btn-primary" type="submit">Delete</button> 
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