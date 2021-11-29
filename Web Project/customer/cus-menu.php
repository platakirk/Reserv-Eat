<?php

$sql = "SELECT * FROM menucat INNER JOIN menuitem ON menuitem.catId = menucat.id WHERE menucat.resId = ?";


if(isset($_SESSION["resIdko"])){
    $id = $_SESSION["resIdko"];
    if($stmt = $conn->prepare($sql)){
        $stmt->bind_param("s", $idres);
        $idres = $id;
        if($stmt->execute()){
            $result = $stmt->get_result();
            $rowcnt = $result->num_rows;
            $copy=''; 
            // output data of each row
                if($rowcnt > 0){
                    while($row = $result->fetch_assoc()) { ?>
                    
                        <tr>

                            <?php if(!($copy == $row["category"])){?>
                                <td><?php echo $row["category"] ?> </td>
                            <?php $copy = $row["category"]; } else { ?>
                                <td> </td>
                            <?php } ?>
                            <td><?php echo $row["name"] ?></td>
                            <td><?php echo $row["price"] ?></td>

                        </tr>
                    <?php }
                }
            $result->close();     
            $stmt->close();     
        }
    }
}
?>