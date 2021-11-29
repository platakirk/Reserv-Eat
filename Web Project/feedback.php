<?php
session_start();
$title = 'Main page';
require_once 'includes/header.php';
require_once 'includes/nav.php';
require 'connection.php';
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: welcome.php");
    exit;
} 
$cid = $_REQUEST['cid'];
$resid = $_REQUEST['resid'];
if (isset($_POST['feedbacksubmit'])){
    $feedback = $_POST['feedback'];
    $addquery = mysqli_query($conn,"INSERT INTO `feedback`(`restaurantId`, `customerId`, `feedback`, `status`) VALUES ('$resid','$cid','$feedback','pending')");
    if ($addquery){
        echo "<script> alert('Thanks for your feedback');
        window.location.href='reserve-list.php';</script>'";
    }else{
        echo "<script> alert('tangamo gago')</script>'";
    }
}

?>
<div class="container">
    <form method = "POST">
    <div class="jumbotron jumbotron-fluid py-2 mt-3" style="height: 350px ; width : 500px">
        <div class="container">
            <div class = "row">
            </div>
            <h4> Feedback </h4>
            <hr>
            <textarea name = "feedback" class = "form-control" rows="4" cols="50"></textarea>
            <br>
            <button type = "submit" name = "feedbacksubmit" class = "btn btn-success">Submit</button>
            <a href = "reserve-list.php"><button type = "button" class = "btn btn-warning">Back</button></a>
        </div>
    </div>
    </form>
</div>
<?php
require_once 'includes/footer.php';
?>