<?php

if(isset($_SESSION['resId'])){
    $id = $_SESSION['resId'];
    $sql = "SELECT menucat.id, menucat.category, menuitem.name as iname, menuitem.price, menuitem.image FROM menucat 
            INNER JOIN menuitem on menuitem.catId = menucat.id WHERE resId= $id ORDER BY menucat.category, menuitem.name";
    $copy = "";
                    if($result = $conn->query($sql)){
                        if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()) { ?>
                            <tr>
                            <?php if(!($copy == $row["category"])){?>
                                <td><?php echo $row["category"] ?> </td>
                            <?php $copy = $row["category"]; } else { ?>
                                <td> </td>
                            <?php } ?>
                            <td>
                                    <?php
                                        if(isset($row["image"])){
                                            ?><img src="<?php echo $row["image"]; ?>" class="img-fluid">
                                       <?php
                                       }?>
                            </td>
                            <td><?php echo $row["iname"] ?></td> 
                            <td>Php <?php echo $row["price"] ?></td>
                            </tr>
                        <?php }
                    }
                $result->close();      
            }
        }
?>