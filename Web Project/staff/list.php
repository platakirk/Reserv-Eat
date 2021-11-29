<?php 
require "connection.php";

    $id = $_SESSION["resId"];
    $sql = "SELECT reservation.id, customer.id AS cusId, customer.firstName, customer.lastName, reservation.date, reservation.time, reservation.seats, res_table.name FROM reservation
            INNER JOIN customer on reservation.customerId = customer.id
            INNER JOIN restaurant on reservation.restaurantId = restaurant.id
            join res_table on reservation.table_id=res_table.id
            WHERE reservation.restaurantId = $id and reservation.status = 'pending'";

    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
        while( $row = $result->fetch_assoc()){?>
                <tr>
                        <td hidden><?php echo $row["id"]?></td>
                        <td hidden><?php echo $row["cusId"]?></td>
                        <td><?php echo "Customer name: " . $row["firstName"] . " " .  $row["lastName"] . 
                                       "<br>Date: " . $row["date"] . 
                                       "<br>Time: " . $row["time"] . 
                                       "<br>Table Name: " . $row["name"]. 
                                       "<br>Seats: " . $row["seats"] ;

                            ?>
                        </td>
                        <td>
                            <a type="button" class="btn btn-outline-danger rejbtn mr-2" href="staff/reject.php?id=<?= $row['id'] ?>&cusId=<?= $row['cusId']?>">Reject</a> 
                            <a type="button" class="btn btn-outline-success accbtn" href="staff/accept.php?id=<?= $row['id'] ?>&cusId=<?= $row['cusId']?>">Accept</a>
                        </td>
                </tr>

    <?php
            }
        }
        else{
            echo "no record";
        }
        $conn->close();
    }
?>