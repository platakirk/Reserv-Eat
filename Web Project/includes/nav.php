<?php
if(isset($_SESSION['type'])){
  if($_SESSION['type']=="customer")
  {
    require_once 'navtype/customernav.php';
  }
  else if($_SESSION['type']=="restaurant")
  {
    require 'navtype/restaurantnav.php';
  }
  else if($_SESSION['type']=="staff")
  {
    require 'navtype/staffnav.php';
  }
  else if($_SESSION['type']=="admin")
  {
    require 'navtype/adminnav.php';
  }
  include 'alert-verify.php';
}
else {
    require 'navtype/welcomenav.php';
}
?>