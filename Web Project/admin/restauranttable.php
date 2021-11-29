<?php
require_once "connection.php";

$sql = "SELECT * FROM restaurant";
       if($result = $conn->query($sql)){
           $rowcnt = $result->num_rows;
               echo "Records found: " . $rowcnt;
               // output data of each row       
                if($rowcnt > 0){   
                    while($row = $result->fetch_assoc()) {?>
                        <tr>
                            <td><?php echo $row["id"] ?> </td>
                            <td><?php echo $row["restLoginId"] ?> </td>
                            <td><?php echo $row["restaurantName"] ?></td>
                            <td><?php echo $row["firstName"] ?></td>
                            <td><?php echo $row["middleName"] ?> </td>
                            <td><?php echo $row["lastName"] ?></td>
                            <td><?php echo $row["contactNum"] ?></td>
                            <td><?php echo $row["address1"] ?> </td>
                            <td><?php echo $row["barangay"] ?> </td>
                            <td><?php echo $row["city"] ?> </td>
                            <td><?php echo $row["province"] ?> </td>
                            <td><?php echo $row["status"] ?></td>
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