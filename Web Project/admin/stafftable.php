<?php
require_once "connection.php";

$sql = "SELECT * FROM staff";
       if($result = $conn->query($sql)){
           $rowcnt = $result->num_rows;
               echo "Records found: " . $rowcnt;
               // output data of each row       
                if($rowcnt > 0){   
                    while($row = $result->fetch_assoc()) {?>
                        <tr>
                            <td><?php echo $row["id"] ?> </td>
                            <td><?php echo $row["resId"] ?> </td>
                            <td><?php echo $row["username"] ?></td>
                            <td><?php echo $row["password"] ?></td>
                            <td><?php echo $row["firstName"] ?> </td>
                            <td><?php echo $row["lastName"] ?></td>
                            <td><?php echo $row["contactNum"] ?></td>
                            <td><?php echo $row["status"] ?> </td>
                            <td><?php echo $row["dateAdded"] ?> </td>
                            <td>
                                <button type="button" class="btn btn-success mr-2 updbtn" data-toggle="modal" data-target="#updModal">Edit</button>
                                <button type="button" class="btn btn-danger delbtn" data-toggle="modal" data-target="#delModal">Delete</button>
                            </td>
                        </tr>
                    <?php }
                }       
        }  

?>