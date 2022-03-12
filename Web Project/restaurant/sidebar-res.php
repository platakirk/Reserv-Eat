<div class="col-2 mt-2">
            <h4>Dashboard</h4>
            <div class="list-group">
                <div class="dropdown">
                    <button class="btn dropdown-toggle list-group-item list-group-item-action" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Account
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="login-profile.php?acnt=view">Manage Login Account</a>
                        <a class="dropdown-item" href="profile.php?acnt=view">Manage User Profile</a>
                        <a class="dropdown-item" href="about.php?acnt=view">Manage restaurant description</a>
                        <a class="dropdown-item" href="branch.php">Manage branches</a>
                    </div>
                </div>          
                <div class="dropdown">
                    <button class="btn dropdown-toggle list-group-item list-group-item-action" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="landing.php?select=viewmenu">Overview Menu</a>
                        <a class="dropdown-item" href="landing.php?select=addmenu">Add Menu</a>
                        <hr>
                        <a class="dropdown-item" href="landing.php?select=deleteCat">Delete Category</a>
                        <a class="dropdown-item" href="landing.php?select=updateCat">Update Category</a>
                        <hr>
                        <a class="dropdown-item" href="landing.php?select=deleteItem">Delete Item</a>
                        <a class="dropdown-item" href="landing.php?select=updateItem">Update Item</a>
                    </div>
                </div>     
                <div class="dropdown">
                    <button class="btn dropdown-toggle list-group-item list-group-item-action" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Staff
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="landing.php?select=staff">Staff Overview</a>
                        <a class="dropdown-item" href="staff.php">Manage Staff</a>
                        <hr>
                        <a class="dropdown-item" onclick="return confirm('You are going to be redirected to staff login page. Are you sure?')" href="staff-login.php">Staff Login</a>
                    </div>
                </div>      
                <div class="dropdown">
                    <button class="btn dropdown-toggle list-group-item list-group-item-action" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Table Management
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="table.php">Table List</a>
                    </div>
                </div>  
                <div class="dropdown">
                    <button class="btn dropdown-toggle list-group-item list-group-item-action" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Payment
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="annual_payment.php">PayPal Subscription</a>
                        <a class="dropdown-item" href="mongopayments.php">Paymongo Subscription</a>
                    </div>
                </div>  
                <div class="dropdown">
                    <button class="btn dropdown-toggle list-group-item list-group-item-action" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Feedbacks
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="approve-feedback.php">List of feedbacks</a>
                    </div>
                </div>
            </div>
            <div>
            <img src = "qrCreator.php?id=<?=$ridd?>">
     </div>
</div>

