<?php 
$success = "<div class='alert alert-success' role='alert'>
Category Updated successfully.</a> 
</div>";
    if(isset($_GET['update'])){
        if($_GET['update'] == 'success'){
            echo $success;
            unset($success);
        }
    }
?>
<div class="container" style="margin-left:400px">
    <div class="jumbotron jumbotron-fluid mt-3 delcat" style="height:500px;width:600px">
                    <div class="container">
                        <h1 class="display-4 mt-3">Update Category</h1>
                        <hr class="mb-5">
                            <form action="restaurant/update-cat-sql.php" method="POST">
                            <select name ="id" class="deleteCat">
                                <?php
                                    require "connection.php";
                                    //delete category
                                    $id = $_SESSION["resId"];
                                    $sql = "SELECT * FROM menucat WHERE resId= $id ORDER BY category";
                                    if($result = $conn->query($sql)){
                                        if($result->num_rows > 0){
                                            while($row = $result->fetch_assoc()){
                                                ?>  
                                                    <option value="<?php echo $row['id']?>"><?php echo strtoupper($row['category']) ?></option>
                                                <?php
                                            }         
                                            $conn->close();         
                                        }
                                    }
                                ?>
                            </select>
                            <br>
                            <label class="mt-4">Change to:</label>
                            <input type="text" name="name" class="form-control" style="width:300px;margin-left:135px">
                            <button type="submit" name="delbtn" onclick="return confirm('Are you sure you want to delete category? Deleting this will delete all items in it.')" class="btn btn-primary mt-3">Update</button>
                            </form>         
                    </div>
    </div>
</div>