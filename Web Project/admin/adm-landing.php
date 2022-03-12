<div class="container-fluid mt-3">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" role="tab" data-toggle="tab" href="#customer">Customer</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" role="tab" data-toggle="tab" href="#restaurant">Restaurant</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" role="tab" data-toggle="tab" href="#reservation">Reservation</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" role="tab" data-toggle="tab" href="#login">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" role="tab" data-toggle="tab" href="#staff">Staff</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" role="tab" data-toggle="tab" href="#admin">Admin</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" role="tab" data-toggle="tab" href="#payment">Payment</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" role="tab" data-toggle="tab" href="#application">Applications</a>
        </li><li class="nav-item">
            <a class="nav-link" role="tab" data-toggle="tab" href="#reapproval">Reapproval</a>
        </li>
        </li><li class="nav-item">
            <a class="nav-link" role="tab" data-toggle="tab" href="#dca">Deleted customer accounts</a>
        </li>
    </ul>
    <div class="tab-content">
        <div role ="tabpanel" class="tab-pane active" id = "customer">
            <div class="table-wrapper-scroll-y my-custom-scrollbar mt-3">
                <table id="table" class="table table-bordered table-striped text-center" style="height: 800px">
                    <tr>
                        <th>id</th>
                        <th>Login Id</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Contact Number</th>
                        <th>Address1</th>
                        <th>Barangay</th>
                        <th>City</th>
                        <th>Province</th>
                        <th>Date Added</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                        require_once "customertable.php";
                    ?>
                </table>
            </div>
        </div>
        <div role ="tabpanel" class="tab-pane" id = "restaurant">
            <div class="table-wrapper-scroll-y my-custom-scrollbar mt-3">
                <table id="table" class="table table-bordered table-striped text-center" style="height: 800px">
                    <tr>
                        <th>Id</th>
                        <th>Login Id</th>
                        <th>Restaurant Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Contact Number</th>
                        <th>Address1</th>
                        <th>Barangay</th>
                        <th>City</th>
                        <th>Province</th>
                        <th>Status</th>
                        <th>Applcation</th>
                        <th>Date Added</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                        require_once "restauranttable.php";
                    ?>
                </table>
            </div>
        </div>
        <div role ="tabpanel" class="tab-pane mx-auto" id = "reservation">
            <div class="table-wrapper-scroll-y my-custom-scrollbar mt-3">
                <table id="table" class="table table-bordered table-striped text-center" style="height: 800px">
                    <tr>
                        <th>Id</th>
                        <th>Restaurant Id</th>
                        <th>Customer Id</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Seats</th>
                        <th>Status</th>
                        <th>Feedback</th>
                        <th>Date Added</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                        require_once "reservationtable.php";
                    ?>
                </table>
            </div>
        </div>
        <div role ="tabpanel" class="tab-pane mx-auto" id = "login">
            <div class="table-wrapper-scroll-y my-custom-scrollbar mt-3">
                <table id="table" class="table table-bordered table-striped text-center" style="height: 800px">
                    <tr>
                        <th>id</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>VKey</th>
                        <th>Verified</th>
                        <th>Type</th>
                        <th>Date Added</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                        require_once "logintable.php";
                    ?>
                </table>
            </div>
        </div>
        <div role ="tabpanel" class="tab-pane" id = "staff">
            <div class="table-wrapper-scroll-y my-custom-scrollbar mt-3">
                <table id="table" class="table table-bordered table-striped text-center" style="height: 800px">
                    <tr>
                        <th>Id</th>
                        <th>Restaurant Id</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Contact Number</th>
                        <th>Status</th>
                        <th>Date Added</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                        require_once "stafftable.php";
                    ?>
                </table>
            </div>
        </div>
        <div role ="tabpanel" class="tab-pane mx-auto" id = "admin" style="width:600px">
            <div class="table-wrapper-scroll-y my-custom-scrollbar mt-3">
                <table id="table" class="table table-bordered table-striped text-center" style="height: 800px">
                    <tr>
                        <th>id</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                        require_once "admintable.php";
                    ?>
                </table>
            </div>
        </div>      
        <div role ="tabpanel" class="tab-pane mx-auto" id = "payment" style="width:600px">
            <div class="table-wrapper-scroll-y my-custom-scrollbar mt-3">
                <table id="table" class="table table-bordered table-striped text-center" style="height: 800px">
                    <tr>
                        <th>txnid</th>
                        <th>login_id</th>
                        <th>payer_email</th>
                        <th>payment_amount</th>
                        <th>payment_status</th>
                    </tr>
                    <?php
                        require_once "payment_table.php";
                    ?>
                </table>
            </div>
        </div> 
        <div role ="tabpanel" class="tab-pane mx-auto" id = "application">
            <div class="table-wrapper-scroll-y my-custom-scrollbar mt-3">
                <table id="table" class="table table-bordered table-striped text-center" style="height: 800px">
                    <tr>
                        <th>id</th>
                        <th>Restaurant name</th>
                        <th>Owner</th>
                        <th>Location</th>
                        <th>Registered Date</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                        require_once "application.php";
                    ?>
                </table>
            </div>
        </div>
        <div role ="tabpanel" class="tab-pane mx-auto" id = "reapproval">
            <div class="table-wrapper-scroll-y my-custom-scrollbar mt-3">
                <table id="table" class="table table-bordered table-striped text-center" style="height: 800px">
                    <tr>
                        <th>id</th>
                        <th>Restaurant name</th>
                        <th>Owner</th>
                        <th>Location</th>
                        <th>Reason</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                        require_once "reapproval.php";
                    ?>
                </table>
            </div>
        </div>
        <div role ="tabpanel" class="tab-pane mx-auto" id = "dca">
            <div class="table-wrapper-scroll-y my-custom-scrollbar mt-3">
                <table id="table" class="table table-bordered table-striped text-center" style="height: 800px">
                    <tr>
                        <th>id</th>
                        <th>Customer Id</th>
                        <th>Login Id</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Reason</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                        require_once "dca.php";
                    ?>
                </table>
            </div>
        </div>
    </div>
    
</div>