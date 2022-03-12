<?php
$check = "";
$value = "active";
if($_SESSION['status'] == "active"){
  $check = "checked";
  $value = "inactive";
}
else if($_SESSION['status'] == "inactive"){
  $check = "unchecked ";
}
$disable = "disabled";
if(isset($_SESSION['resId']) && $_SESSION["verified"] == 1){
  if(isset($_SESSION["application"])){
    $a = $_SESSION["application"];
    if($a == "accepted"){
      $disable = "";
    }
  }
}
$ridd=$_SESSION['resId'];
?>

<nav class="navbar navbar-expand-lg sticky-top navbar-dark" style = "background-color: #FF914D">
<link rel="icon" href="images/imageedit_2_4034572533.png">
  <div class="container col-md-12">
    <a class="navbar-brand" href="landing.php"><img src= "images/reserveat-icon.png" style = "height: 150px"></a>
    <h6 class="col-md-1" style="max-width: 70px">Status: </h6>
    <form action="restaurant/status-res.php"  method="post">
      <input id="stat" class="col-md-2 toggle" type="checkbox" data-toggle="toggle" data-on="active" data-off="inactive" data-onstyle="success" onchange="this.form.submit()" <?= $check ?> <?= $disable?>/>
      <input type="hidden" name="hidden-status" value="<?= $value ?>"/> 
    </form>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="restaurant/check-res-new.php">Home</a>
        </li>  
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Signout</a>
        </li>  
      </ul>
    </div>
  </div>
</nav>