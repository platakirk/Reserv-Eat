<?php 
$success = "<div class='alert alert-success' role='alert'>
Category delete successful.</a> 
</div>";
    if(isset($_GET['delete'])){
        if($_GET['delete'] == 'success'){
            echo $success;
            unset($success);
        }
    }
?>
<div class="container" style="margin-left:400px">
    <div class="jumbotron jumbotron-fluid mt-2 delcat" style="height:450px;width:600px">
                    <div class="container">
                        <h1 class="display-4">Delete Item</h1>
                        <hr class="mb-3">
                            <form action="landing.php?select=deleteItem" method="POST" class="mb-2">
                            <label>Select category:</label>
                            <Br>
                            <select name ="idcat">
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
                                        }
                                    }
                                ?>
                            </select>
                            <br>
                            <button type="submit" name="selbtn" class="btn btn-primary mt-3">Select</button>
                            </form>   
                            <?php
                                if (isset($_POST['selbtn'])){
                                    echo "<hr>";
                                    $id = $_POST['idcat'];
                                    $sql = "SELECT * FROM menuitem WHERE catId= $id ";
                                    if($result = $conn->query($sql)){
                                        if($result->num_rows > 0){ 
                                            ?>
                                            <form aciont='landing.php?select=deleteItem' method='POST' class='mb-2'>                                          
                                            <select name='item'>
                                            <?php
                                            while($row = $result->fetch_assoc()){
                                                ?>  
                                                    <option value="<?php echo $row['catId']?>"><?php echo strtoupper($row['name']) ?></option>
                                                <?php
                                            }
                                            unset($_POST['idcat']);   
                                            ?>      
                                            </select>
                                            <br>
                                            <button type="submit" name="itembtn" class="btn btn-danger mt-3">Delete</button>
                                            </form>     
                            <?php
                                        }
                                    }
                                }
                                if(isset($_POST['itembtn'])){
                                    echo "delete";
                                    $id = $_POST['item'];
                                    $sql = "DELETE FROM menuitem WHERE catId = $id";
                                    if($conn->query($sql)){
                                        echo "<div class='alert alert-success' role='alert'>
                                        Category delete successful.</a> 
                                        </div>";
                                    }
                                }
                            ?>
                                
                            
                    </div>
    </div>
</div>