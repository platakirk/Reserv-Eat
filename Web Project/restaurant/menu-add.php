
<div class="container" style="margin-left:400px">
            <div class="jumbotron jumbotron-fluid" style="height:680px;width:560px">
                <div class="container">
                    <h1 class="display-4">Menu</h1>
                    <hr>
                            <div class="col-sm-5">
                                    <div class="card main" style="height:500px;width:500px">
                                    <div class="card-body pt-1">
                                        <form action="restaurant/add-cat.php" method="post">
                                            <input type="hidden" name="id">
                                            <label>Category:</label>
                                            <div class="row">                                                
                                                <input type="text" name="catName" class="form-control ml-3 mr-3" style="width:200px">                                                
                                                <button name="submit" class="btn btn-primary" type="submit">Add</button> 
                                            </div>                                               
                                        </form> 
                                        <hr>
                                        <form action="restaurant/ins-menu.php" method="post" enctype="multipart/form-data">
                                            <label>Category: </label>
                                            <select name="catName">
                                                <option name="default" value="">-SELECT-</option>
                                                <?php       
                                                    require 'connection.php';                                                 
                                                    require "restaurant/view-cat-sql.php";
                                                ?>
                                            </select>
                                            <br>
                                            <br>
                                            <input type="hidden" name="id">
                                            <label>Item Name:</label>
                                            <input type="text" name="name" class="form-control">
                                            <br>
                                            <label>Item Price:</label>
                                            <input type="text" name="price" class="form-control">
                                            <br>
                                            Select image to upload:
                                            <input type="file" name="fileToUpload" id="fileToUpload">
                                            <br>
                                            <br>
                                            <button class="btn btn-primary mr-3" name="btn">Add</button>
                                        </form> 
                                    </div>
                                </div>
                            </div>       
                </div>
            </div>
</div>
    