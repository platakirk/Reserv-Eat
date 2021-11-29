<?php

$sql = "SELECT username,firstName,lastName FROM staff where resId = ? and status = '$stat'";

if(isset($_SESSION["resId"])){
    $id = $_SESSION["resId"];
    if($stmt = $conn->prepare($sql)){
        $stmt->bind_param("s", $idres);
        $idres = $id;
        if($stmt->execute()){
            $result = $stmt->get_result();
            $rowcnt = $result->num_rows; 
                echo "found: " . $rowcnt;
            // output data of each row
                if($rowcnt > 0){
                    while($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row["username"] ?> </td>
                            <td><?php echo $row["firstName"]?></td>
                            <td><?php echo $row["lastName"] ?></td>
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