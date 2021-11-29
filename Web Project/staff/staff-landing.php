<?php
if(isset($_GET["accept"])){
    if($_GET["accept"] == "yes"){
        echo "<div class='alert alert-success' role='alert'>
                Reservation accepted.</a> 
                </div>";
    }
}
if(isset($_GET["reject"])){
    if($_GET["reject"] == "yes"){
        echo "<div class='alert alert-success' role='alert'>
                Reservation rejected.</a> 
                </div>";
    }
}
?>
<!-- modal start -->
<div class="modal fade" id="accModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content mx-auto" style="max-width: 300px">                
                <div class="modal-body">
                    <form action="staff/accept.php" method="POST">
                            <input type="text" id="idR" name ="idres">  
                            <input type="text" id="idCus" name ="idCus">
                    <h2>Are you sure you want to accept?</h2>      
                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-success" name="accbtn">Yes</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
<!-- modal end-->

<!-- modal start -->
<div class="modal fade" id="rejModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content mx-auto" style="max-width: 300px">                
                <div class="modal-body">
                    <form action="staff/reject.php" method="POST">
                            <input type="hidden" id="idRr" name ="idrese">
                            
                    <h2>Are you sure you want to reject?</h2>      
                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-success" name="rejbtn">Yes</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
<!-- modal end-->
<div class="container">
    <br> <br>


    <div class="tab">
        <button class="tablinks" id="defaultOpen"  onclick="selection(event, 'feedback1')">Reservation - Feedback</button>
        <button class="tablinks"  onclick="selection(event, 'pending')">Reservation - Pending</button>
    </div>

    <div id="feedback1" class="tabcontent">
        <div class="jumbotron jumbotron-fluid py-2 mt-3" style="height:500px">
            <div class="container">
                <h1 class="display-4">Reservation - Feedback</h1>
                <hr>
                <form action='landing.php' method='post'>
                                <div class="form-row">
                                    <input type='text' class='form-control col-md-3' id='id' name='id' placeholder="Reservation #">
                                    <button type="submit" name="searchBtn" class='btn btn-primary ml-2'>Search</button>
                                </div>
                </form>  
                <div class="table-wrapper-scroll-y my-custom-scrollbar mt-3" style="height:320px">
                    <table id="table" class="table table-bordered table-striped text-center">
                        <thead class="text-light bg-dark">
                                <th>Reservation #</th>
                                <th hidden>customer id</th>
                                <th>Details</th>
                        </thead>
                        <tbody>
                            <?php 
                                if(isset($_POST["searchBtn"])){
                                    require 'search.php';
                                }
                                else{
                                require 'staff/feedback.php';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="pending" class="tabcontent">
        <div class="jumbotron jumbotron-fluid py-2 mt-3" style="height:500px">
        <div class="container">
            <h1 class="display-4">Reservation - Pending</h1>
            <hr>
            <form action='landing.php' method='post'>
                            <div class="form-row">
                                <input type='date' class='form-control col-md-3' id='date' name='date' placeholder="Search Date">
                                <button type="submit" name="dateBtn" class='btn btn-primary ml-2'>Search</button>
                            </div>
            </form>  
            <div class="table-wrapper-scroll-y my-custom-scrollbar mt-3" style="height:330px">                        
                <table id="table" class="table table-bordered table-striped text-center">
                    <thead class="text-light bg-dark">
                            <th hidden>id</th>
                            <th hidden>customer id</th>
                            <th>Details</th>
                            <th>Actions</th>
                    </thead>
                        <tbody>
                            <?php 
                                require 'list.php';
                            ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>

