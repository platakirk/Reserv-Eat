<?php session_start();
$title = 'Delete account page';
require_once 'includes/header.php';
require_once "connection.php";


$rname = $id = "";
if(isset($_GET['id'])){
    $id = $_GET["id"];
    $sql = "SELECT * FROM restaurant WHERE id = $id";
    if($result = $conn->query($sql)){
        $row = $result->fetch_assoc();
        $rname = $row["restaurantName"];
        $city = $row["city"];
        $prov = $row["province"];
    }
}


if(isset($_POST['submit'])){
    $id= $_POST['id'];
    $reason = $_POST['reason'];
    $rname = $_POST['rname'];
        $sql = "INSERT INTO deleteitem (itemId, name, category, reason) VALUES ($id , '$rname' , 'restaurant', '$reason' )";
        if($conn->query($sql)){
            $sql="DELETE FROM restaurant WHERE id=$id";
            if($conn->query($sql)){
                header("location: branch.php?delete=success");
            }
        }
    
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
                                        <form action="branchdel.php?id=<?= $id?>" method="post">
                                            <input type="hidden" name="id" value = "<?= $id?>">
                                            <input type="hidden" name="rname" value = "<?= $rname?>">

                                            <label>Restaurant Name: <b><?= $rname?></b></label>
                                            <br>
                                            <label>City: <b><?= $city?></b></label>
                                            <br>
                                            <label>Province: <b><?= $prov?></b></label>  
                                            <Br>
                                            <label>Reason for deleting:</label>                                               
                                                <textarea type="textarea" name="reason" class="form-control" style="width:450px"></textarea>
                                                <Br>                                                
                                                <button name="submit" name="submit" name="submit" onclick="return confirm('Are you sure you want to delete restaurant and all of its data?')"class="btn btn-primary" type="submit">Delete</button> 
                                        </form> 
                                    </div>
                                </div>
                            </div>       
                </div>
            </div>
</div>