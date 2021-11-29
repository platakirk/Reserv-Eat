<?php
$log_err="";
session_start();
require 'connection.php';
require_once 'includes/header.php';
require_once 'includes/nav.php';
require 'cardcheck.php';
?>
    <div class="container">
        <div class="jumbotron jumbotron-fluid py-2 mt-3" style="height:700px">
            <div class="form-container">
                <form action="mongopayments.php" method="post" onsubmit="return confirm('Confirm Payment?')">
                    <h1 class="col-md-12">Annual Payment of 100,000 Php</h1>
                    <hr>
                    <div class="form-group">
                        Card no:<input type="text" name="card" class="form-control" maxlength="16">
                    </div>

                    <div class="form-group">
                        Month:<select name="month" class="form-control">
                            <option value="">Choose a month</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>

                    <div class="form-group">
                        Year:<input type="number" name="year" class="form-control" min="1900" max="2099" value="2021">
                    </div>

                    <div class="form-group">
                        CVC/CVV:<input type="text" name="cvcc" pattern="[0-9]+" onKeyPress="if(this.value.length==3) return false;">
                    </div>
                    <h5 class="text-danger text-center"><?=$log_err;?></h5>
                    <button type="submit" class="btn btn-primary">Pay Now</button>
                </form>
            </div>
            
        </div>
    </div>


<?php
require_once 'includes/footer.php';
?>