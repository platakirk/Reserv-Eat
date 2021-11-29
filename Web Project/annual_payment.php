<!DOCTYPE html>
<html>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
<?php
session_start();
require 'connection.php'; 
$title = 'Annual Subscription';
require_once 'includes/header.php';

require_once 'includes/nav.php';
?>

<div class="container-fluid">
      <div class="row">   
<?php
include "restaurant/sidebar-res.php";

if(isset($_GET['PayerID'])){
    ?>
    <script>
        const Toast = Swal.mixin({
          toast: true,
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        })
        
        Toast.fire({
          icon: 'success',
          title: 'Payment success!'
        })
        history.pushState(null, "", "https://isproj2b.benilde.edu.ph/ReservEat/annual_payment.php");
    </script>
    <?php
}
?>

    <form class="paypal" action="/ReservEat/payments.php" method="post" id="paypal_form">
        <input type="hidden" name="cmd" value="_xclick" />
        <input type="hidden" name="no_note" value="1" />
        <input type="hidden" name="lc" value="UK" />
        <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
        <input type="hidden" name="first_name" value="Eiron" /> <!-- payer name -->
        <input type="hidden" name="last_name" value="Dela Cruz" /> <!-- payer lname-->
        <input type="hidden" name="payer_email" value="eiron23@rocketmail.com" />  <!-- LALAGAY EMAIL ADDRESS NG RESTO -->
        <input type="hidden" name="item_number" value="<?= $_SESSION["loginId"]; ?>" /> <!-- login id nalang nilagay ko -->
        <input type="hidden" name="item" value="Annual Subscription" /> <!-- item name -->
        <input type="hidden" name="amount" value="100000" /> <!-- amount ng babayad -->
        
    <!--restaurant profile -->
<div class="container padding">
  <div class="row welcome">
    <div class= "col">
    <br> 
      <div class="form-row">
        <h1 class="col-md-12">Annual Subscription</h1>
        <hr class="col-md-12">
      </div>
          <div class="form-group">
            <label for="restname">Amount</label>
            <input type="text" class="form-control" id="uname" name="uname" value="PHP 100,000.00" readonly>
          </div>
        <!-- province-city-zip row start-->
      <div class="form-row">
        
        <!--<input type="submit" class="btn btn-primary" name="submit" value="Checkout"/> -->
        <!-- Set recurring payments until canceled. -->

    <!-- Display the payment button. -->
    <input type="image" name="submit"
    src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribe_LG.gif"
    alt="Subscribe">
        
      </div>
        <!-- ///////////////////-->
      <!-- ///////////////////// -->
    </div>
  </div>
</div>
      </form>
</div>
</div>
<?php

require_once 'includes/footer.php'; ?>
?>