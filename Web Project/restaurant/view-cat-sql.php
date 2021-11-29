<?php
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