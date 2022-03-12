<?php
require "connection.php";



$sql = "SELECT restaurant.id, restaurant.restaurantName, restaurant.firstName, restaurant.city, restaurant.province, restaurant.lastName, decline.reason, restaurant.restLoginId
        FROM restaurant INNER JOIN decline on decline.resId = restaurant.id WHERE restaurant.application = 'declined'";
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
                            <td><?php echo $row["reason"] ?> </td>
                            <?php
                                $id = $row["id"];
                                $resName = $row["restaurantName"];
                                $fname = $row["firstName"];
                                $lname = $row["lastName"];
                                $logId = $row["restLoginId"];
                            ?>
                            <td>
                                <form action="admin/reapprovalsql.php" method="POST">
                                    <input type ="hidden" name="id" value="<?= $id ?>">
                                    <input type ="hidden" name="resName" value="<?= $resName ?>">
                                    <input type ="hidden" name="fname" value="<?= $fname ?>">
                                    <input type ="hidden" name="lname" value="<?= $lname ?>">
                                    <input type ="hidden" name="logId" value="<?= $logId ?>">
                                    <button type="submit" name="submit" class="btn btn-success mr-2 updbtn" onclick="return confirm('Are you sure you want to accept application?')">Reapprove</button>
                                </form>
                            </td>
                        </tr>
                    <?php }
                }       
        }  
?>