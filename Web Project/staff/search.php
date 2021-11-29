<?php 
require "connection.php";
    if(isset($_POST["id"])){
    $rid = $_POST["id"];
    $id = $_SESSION["resId"];
    $sql = "SELECT reservation.id, customer.id AS cusId, customer.firstName, customer.lastName, reservation.date, reservation.time, reservation.seats FROM reservation
            INNER JOIN customer on reservation.customerId = customer.id
            INNER JOIN restaurant on reservation.restaurantId = restaurant.id
            WHERE reservation.restaurantId = $id and reservation.status = 'accepted' and reservation.id = $rid ";

    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
        while( $row = $result->fetch_assoc()){?>
                <tr>
                        <td><?php echo $row["id"]?></td>
                        <td hidden><?php echo $row["cusId"]?></td>
                        <td><?php echo "Customer name: " . $row["firstName"] . " " .  $row["lastName"] . 
                                       "<br>Date: " . $row["date"] . 
                                       "<br>Time: " . $row["time"] . 
                                       "<br>Seats: " . $row["seats"];
                            ?>
                        </td>
                        <td>
                        <button type="button" class="btn btn-outline-danger absbtn mr-2" data-toggle="modal" data-target="#absModal">Absent</button> 
                        <button type="button" class="btn btn-outline-success prebtn" data-toggle="modal" data-target="#preModal">Present</button>
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
}
?>