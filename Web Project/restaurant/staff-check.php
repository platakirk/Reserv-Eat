

    
            <div class="jumbotron jumbotron-fluid py-2">
                <div class="container">
                    <div class="row ml-1">
                        <h1 class="display-4">Staff</h1>
                    </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card main">
                                    <div class="card-body pt-1">
                                        <h5 class="card-title">Online</h5>
                                        <hr>                                        
                                        <div class="table-wrapper-scroll-y my-custom-scrollbar2">
                                            <table id="table" class="table table-bordered table-striped"> 
                                                <thead class="text-light bg-dark">
                                                    <tr>      
                                                        <th>Username</th>     
                                                        <th>First Name</th>    
                                                        <th>Last Name</th>       
                                                    </tr>  
                                                </thead>
                                                    <?php
                                                        $stat = "online";
                                                        require 'connection.php';
                                                        require 'check-staff-status.php';
                                                    ?> 
                                            </table> 
                                        </div>     
                                    </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card main">
                                    <div class="card-body pt-1">
                                        <h5 class="card-title">Offline</h5>
                                        <hr>
                                        <div class="table-wrapper-scroll-y my-custom-scrollbar2">
                                            <table id="table" class="table table-bordered table-striped"> 
                                                <thead class="text-light bg-dark">
                                                    <tr>      
                                                        <th>Username</th>     
                                                        <th>First Name</th>    
                                                        <th>Last Name</th>        
                                                    </tr>   
                                                </thead>
                                                    <?php
                                                    $stat = "offline";
                                                    require 'connection.php';
                                                    require 'check-staff-status.php';
                                                ?>  
                                                
                                            </table> 
                                        </div>   
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
