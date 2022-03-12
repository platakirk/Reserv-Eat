<?php 
if (isset($_POST['searchBtn']) && !empty($_POST['searchStaff'])){
    $search = trim($_POST["searchStaff"]);
    $resid = $_SESSION['resId'];
    $sql = "SELECT * FROM staff WHERE (id = '$search' and resId = $resid) OR (username = '$search' and resId = $resid) OR (firstName = '$search' 
            and resId = $resid) OR (lastName = '$search' and resId = $resid) OR (contactNum = '$search' and resId = $resid)";
       if($result = $conn->query($sql)){
           $rowcnt = $result->num_rows;
               echo "Records found: " . $rowcnt;
               // output data of each row       
                if($rowcnt > 0){   
                    while($row = $result->fetch_assoc()) {?>
                        <tr>
                            <td><?php echo $row["id"] ?> </td>
                            <td><?php echo $row["username"]?></td>
                            <td><?php echo $row["password"] ?></td>
                            <td><?php echo $row["firstName"] ?></td>
                            <td><?php echo $row["lastName"] ?></td>
                            <td><?php echo $row["contactNum"] ?></td>
                            <td><?php echo $row["status"] ?></td>
                            <td><?php echo $row["dateAdded"] ?></td>
                            <td>
                                <button type="button" class="btn btn-success mr-2 updbtn" data-toggle="modal" data-target="#updModal">Edit</button>
                                <button type="button" class="btn btn-danger delbtn" data-toggle="modal" data-target="#delModal">Delete</button>
                            </td>
                        </tr>
                    <?php }
                } 
        $result->close();
        $conn->close();       
        }  
    }

else{
    $sql = "select * from staff where resId = ?";
    $id = $_SESSION["resId"];
    if($stmt = $conn->prepare($sql)){
        $stmt->bind_param("s", $idres);
        $idres = $id;
        if($stmt->execute()){
            $result = $stmt->get_result();
            $rowcnt = $result->num_rows; 
                echo "Records found: " . $rowcnt;
            // output data of each row
                if($rowcnt > 0){
                    while($row = $result->fetch_assoc()) {?>
                        <tr>
                            <td><?php echo $row["id"] ?> </td>
                            <td><?php echo $row["username"]?></td>
                            <td><?php echo $row["password"] ?></td>
                            <td><?php echo $row["firstName"] ?></td>
                            <td><?php echo $row["lastName"] ?></td>
                            <td><?php echo $row["contactNum"] ?></td>
                            <td><?php echo $row["status"] ?></td>
                            <td><?php echo $row["dateAdded"] ?></td>
                            <td>
                                <button type="button" class="btn btn-success mr-2 updbtn" data-toggle="modal" data-target="#updModal">Edit</button>
                                <form action="staff-delete.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $row['id']?>">
                                    <input type="hidden" name="un" value="<?= $row['username']?>">
                                    <input type="hidden" name="fn" value="<?= $row['firstName']?>">
                                    <input type="hidden" name="ln" value="<?= $row['lastName']?>">
                                    <button type="submit" class="btn btn-danger delbtn" name="delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php }
                }
            $result->close();
            $stmt->close();
            $conn->close();             
        }
    }
}
?>