<?php

$disable = "disabled";
if(isset($_SESSION['cusId']) && $_SESSION["verified"] == 1){
    $disable = "";
}
?>

<nav class="navbar navbar-expand-lg sticky-top navbar-dark" style = "background-color: #FF914D">
  <!-- logo section -->
  <div class="container col-md-12">
  <a class="navbar-brand" href="landing.php"><img src= "images/reserveat-icon.png"></a> 
  <!-- logo -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- nav section -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="customer/check-cus-new.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= $disable?>" href="reserve-list.php">Reservation</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          My account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="profile.php?acnt=view">Profile</a>
          <a class="dropdown-item" href="#">Contact</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Signout</a>
        </div>
      </li>
    </ul>
    </div>
    <!-- nav section -->
  </div>
  </nav>


