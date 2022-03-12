<?php
require_once "connection.php";

$sql = "SELECT * FROM restaurant WHERE application = 'pending'";
       if($result = $conn->query($sql)){
           $rowcnt = $result->num_rows;
               echo "Records found: " . $rowcnt;
               // output data of each row       
                if($rowcnt > 0){   
                    while($row = $result->fetch_assoc()) {?>
                        <tr>
                            <td><?php echo $row["id"] ?> </td>
                            <td><?php echo $row["restaurantName"] ?></td>
                            <td><?php echo $row["firstName"] . " " . $row["lastName"]  ?></td>
                            <td><?php echo $row["city"] . ", " . $row["province"] ?> </td>
                            <td><?php echo $row["dateAdded"] ?> </td>
                            <?php
                                $id = $row["id"];
                                $resName = $row["restaurantName"];
                                $fname = $row["firstName"];
                                $lname = $row["lastName"];
                                $logId = $row["restLoginId"];
                            ?>
                            <td>
                                <form action="admin/accept.php" method="POST">
                                    <input type ="hidden" name="id" value="<?= $id ?>">
                                    <input type ="hidden" name="resName" value="<?= $resName ?>">
                                    <input type ="hidden" name="fname" value="<?= $fname ?>">
                                    <input type ="hidden" name="lname" value="<?= $lname ?>">
                                    <input type ="hidden" name="logId" value="<?= $logId ?>">
                                    <button type="submit" name="submit" class="btn btn-success mr-2 updbtn" onclick="return confirm('Are you sure you want to accept application?')">Approve</button>
                                </form>
                                <br>
                                <a href="decline.php?id=<?=$id?>&resName=<?=$resName ?>&fname=<?=$fname?>&lname=<?=$lname?>&resId=<?=$logId?>" class="btn btn-danger delbtn">Decline</button>
                            </td>
                        </tr>
                    <?php }
                }       
        }  

?>