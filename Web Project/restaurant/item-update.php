<?php 
require "connection.php";
$name = $price = "";

    if(isset($_POST['updbtn']) && isset($_POST['name'])){      
        $id =  $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $sql = "UPDATE menuitem SET name = '$name', price = $price WHERE id = $id";
        if($conn->query($sql)){
            echo "<div class='alert alert-success' role='alert'>
            Item Update successful.</a> 
            </div>";
        }
    }
?>
<div class="container" style="margin-left:400px">
    <div class="jumbotron jumbotron-fluid mt-2 delcat" style="height:540px;width:600px">
                    <div class="container">
                        <h1 class="display-4">Update Item</h1>
                        <hr class="mb-3">
                            <form action="landing.php?select=updateItem" method="POST" class="mb-2">
                            <label>Select category:</label>
                            <Br>
                            <select name ="idcat">
                                <?php
                                    
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
                                            <form action='landing.php?select=updateItem' method='POST' class='mb-2'>                                          
                                            <select name='item'>
                                            <?php
                                            while($row = $result->fetch_assoc()){
                                                ?>  
                                                    <option value="<?php echo $row['id']?>"><?php echo strtoupper($row['name']) ?></option>
                                                <?php
                                                
                                            }
                                            $itName = $row["name"];
                                            unset($_POST['idcat']);   
                                            ?>      
                                            </select>
                                            <br>
                                            <input type="hidden" name="itemName" value="<?= $itName?>">
                                            <button type="submit" name="itembtn" class="btn btn-primary mt-3">Select</button>
                                            </form>     
                            <?php
                                        }
                                    }
                                }
                                if(isset($_POST['itembtn'])){
                                    echo "<hr>";
                                    $id = $_POST['item'];
                                    $name = $_POST["itemName"];
                                    $sql = "SELECT * FROM menuitem WHERE id = $id";
                                    if($result = $conn->query($sql)){
                                        if($result->num_rows > 0){ 
                                            ?>
                                            <form action='landing.php?select=updateItem' method='POST' class='mb-2'>    
                                            <?php
                                            while($row = $result->fetch_assoc()){
                                                ?>  
                                                    <input type="hidden" name="id" value="<?= $id ?>">
                                                    <label>Item Name:</label><br>
                                                    <input type="text" value="<?=$row['name'] ?>" name="name" class="form-group">
                                                    <br>
                                                    <label>Item Price: (php)</label><br>
                                                    <input type="text" value="<?=$row['price'] ?>" name="price" class="form-group">
                                                <?php
                                            }
                                            ?>  
                                            <br>
                                            <button type="submit" name="updbtn" class="btn btn-success mt-3">Update</button>
                                            </form>     
                            <?php
                                        }
                                    }
                                    
                                }
                                
                            ?>
                            
                    </div>
    </div>
</div>