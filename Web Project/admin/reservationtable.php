<?php
require_once "connection.php";

$sql = "SELECT * FROM reservation";
       if($result = $conn->query($sql)){
           $rowcnt = $result->num_rows;
               echo "Records found: " . $rowcnt;
               // output data of each row       
                if($rowcnt > 0){   
                    while($row = $result->fetch_assoc()) {?>
                        <tr>
                            <td><?php echo $row["id"] ?> </td>
                            <td><?php echo $row["restaurantId"] ?> </td>
                            <td><?php echo $row["customerId"] ?></td>
                            <td><?php echo $row["date"] ?> </td>
                            <td><?php echo $row["time"] ?></td>
                            <td><?php echo $row["seats"] ?></td>
                            <td><?php echo $row["status"] ?> </td>
                            <td><?php echo $row["feedback"] ?> </td>
                            <td><?php echo $row["dateAdded"] ?></td>
                            <td>
                                <button type="button" class="btn btn-success mr-2 updbtn" data-toggle="modal" data-target="#updModal">Edit</button>
                                <button type="button" class="btn btn-danger delbtn" data-toggle="modal" data-target="#delModal">Delete</button>
                            </td>
                        </tr>
                    <?php }
                }       
        }  

?>