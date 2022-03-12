<?php
require_once  "connection.php";
if(isset($_POST["searchBtn"]) && !empty($_POST['resName']) || !empty($_POST['city']) || !empty($_POST['prov'])){
        $rname = $rcity = $rprov = "";
        $rname = $_POST["resName"];
        $rcity = trim($_POST["city"]);
        $rprov = trim($_POST["prov"]);
        $sql ="SELECT id, restaurantName, address1, barangay, city, province, open, close FROM restaurant where (status='active' AND restaurantName = '$rname') OR 
                (status='active' AND city = '$rcity') OR (status='active' AND province = '$rprov')";
        if($result = $conn->query($sql)){
            if($result->num_rows > 0){
                $disable = "";
            while( $row = $result->fetch_assoc()){ 
                if(isset($row["open"]) && isset($row["close"])){
                    $open = $row['open'];
                    $close = $row['close'];
                    $st_time    =   strtotime($open);
                    $end_time   =   strtotime($close);
                    $cur_time   =   strtotime(date('H:i'));
                    //$timenow = date("H:i");
                    //$timeclose = DateTime::createFromFormat("H:i", $row["close"]);
                    //$timeopen = DateTime::createFromFormat("H:i", $row["open"]);
	//check if within hour first
    if ($st_time > $end_time){
        $premidnight= strtotime("23:59:00");
        $midnight = strtotime("00:00");
        if(($st_time <= $cur_time && $cur_time<= $premidnight)||($midnight <= $cur_time && $cur_time<= $end_time)){
        ?>
                            <!-- open -->
                            <tr>
                                <td hidden><?php echo $row["id"]; $id = $row["id"]; ?></td>
                                <td><?php echo $row["restaurantName"]?></td>
                                <td><?php echo $row["address1"] . " " . $row["barangay"] . " " . $row["city"] . ", " . $row["province"]?></td>
                                <td><a href="res-select.php?id= <?=$id ?>" class="btn btn-outline-success srchbtn  <?=$disable?>">Select</button></td>
                                <td><a href="customer-approved-feedback.php?id=<?=$id ?>" class="btn btn-outline-warning srchbtn <?=$disable?>">Feedbacks</button></td>
                            </tr>
        
                        <?php
        }else{
         ?>
                            <!-- close -->
                            <tr>
                                <td hidden><?php echo $row["id"]; $id = $row["id"]; ?></td>
                                <td><?php echo $row["restaurantName"]?></td>
                                <td><?php echo $row["address1"] . " " . $row["barangay"] . " " . $row["city"] . ", " . $row["province"]?></td>
                                <td>Closed</td>
                                <td><a href="customer-approved-feedback.php?id=<?=$id ?>" class="btn btn-outline-warning srchbtn <?=$disable?>">Feedbacks</button></td>
                            </tr>
        
                        <?php
        }
        }else{
        if($cur_time >= $st_time && $cur_time < $end_time){
                            ?>
                            <!-- open -->
                            <tr>
                                <td hidden><?php echo $row["id"]; $id = $row["id"]; ?></td>
                                <td><?php echo $row["restaurantName"]?></td>
                                <td><?php echo $row["address1"] . " " . $row["barangay"] . " " . $row["city"] . ", " . $row["province"]?></td>
                                <td><a href="res-select.php?id= <?=$id ?>" class="btn btn-outline-success srchbtn  <?=$disable?>">Select</button></td>
                                <td><a href="customer-approved-feedback.php?id=<?=$id ?>" class="btn btn-outline-warning srchbtn <?=$disable?>">Feedbacks</button></td>
                            </tr>
        
                        <?php
                        }else{
                            ?>
                            <!-- close -->
                            <tr>
                                <td hidden><?php echo $row["id"]; $id = $row["id"]; ?></td>
                                <td><?php echo $row["restaurantName"]?></td>
                                <td><?php echo $row["address1"] . " " . $row["barangay"] . " " . $row["city"] . ", " . $row["province"]?></td>
                                <td>Closed</td>
                                <td><a href="customer-approved-feedback.php?id=<?=$id ?>" class="btn btn-outline-warning srchbtn <?=$disable?>">Feedbacks</button></td>
                            </tr>
        
                        <?php
                        }
        }
                }else{
                    ?>
                    <!-- null -->
                    <tr>
                        <td hidden><?php echo $row["id"]; $id = $row["id"]; ?></td>
                        <td><?php echo $row["restaurantName"]?></td>
                        <td><?php echo $row["address1"] . " " . $row["barangay"] . " " . $row["city"] . ", " . $row["province"]?></td>
                        <td><a href="res-select.php?id= <?=$id ?>" class="btn btn-outline-success srchbtn  <?=$disable?>">Select</button></td>
                        <td><a href="customer-approved-feedback.php?id=<?=$id ?>" class="btn btn-outline-warning srchbtn <?=$disable?>">Feedbacks</button></td>
                    </tr>
                <?php
                    }
                }
            }
        }    
    $conn->close();
}
else{
 $sql = "SELECT id, restaurantName, address1, barangay, city, province, open, close FROM restaurant WHERE status='active'";

    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
        while( $row = $result->fetch_assoc()){
            if(isset($row["open"]) && isset($row["close"])){
                $open = $row['open'];
                $close = $row['close'];
                $st_time    =   strtotime($open);
                $end_time   =   strtotime($close);
                $cur_time   =   strtotime(date('H:i'));
                //$timenow = date("H:i");
                //$timeclose = DateTime::createFromFormat("H:i", $row["close"]);
                //$timeopen = DateTime::createFromFormat("H:i", $row["open"]);
//check if within hour first
if ($st_time > $end_time){
    $premidnight= strtotime("23:59:00");
    $midnight = strtotime("00:00");
    if(($st_time <= $cur_time && $cur_time<= $premidnight)||($midnight <= $cur_time && $cur_time<= $end_time)){
    ?>
                        <!-- open -->
                        <tr>
                            <td hidden><?php echo $row["id"]; $id = $row["id"]; ?></td>
                            <td><?php echo $row["restaurantName"]?></td>
                            <td><?php echo $row["address1"] . " " . $row["barangay"] . " " . $row["city"] . ", " . $row["province"]?></td>
                            <td><a href="res-select.php?id= <?=$id ?>" class="btn btn-outline-success srchbtn  <?=$disable?>">Select</button></td>
                            <td><a href="customer-approved-feedback.php?id=<?=$id ?>" class="btn btn-outline-warning srchbtn <?=$disable?>">Feedbacks</button></td>
                        </tr>
    
                    <?php
    }else{
     ?>
                        <!-- close -->
                        <tr>
                            <td hidden><?php echo $row["id"]; $id = $row["id"]; ?></td>
                            <td><?php echo $row["restaurantName"]?></td>
                            <td><?php echo $row["address1"] . " " . $row["barangay"] . " " . $row["city"] . ", " . $row["province"]?></td>
                            <td>Closed</td>
                            <td><a href="customer-approved-feedback.php?id=<?=$id ?>" class="btn btn-outline-warning srchbtn <?=$disable?>">Feedbacks</button></td>
                        </tr>
    
                    <?php
    }
    }else{
    if($cur_time >= $st_time && $cur_time < $end_time){
                        ?>
                        <!-- open -->
                        <tr>
                            <td hidden><?php echo $row["id"]; $id = $row["id"]; ?></td>
                            <td><?php echo $row["restaurantName"]?></td>
                            <td><?php echo $row["address1"] . " " . $row["barangay"] . " " . $row["city"] . ", " . $row["province"]?></td>
                            <td><a href="res-select.php?id= <?=$id ?>" class="btn btn-outline-success srchbtn  <?=$disable?>">Select</button></td>
                            <td><a href="customer-approved-feedback.php?id=<?=$id ?>" class="btn btn-outline-warning srchbtn <?=$disable?>">Feedbacks</button></td>
                        </tr>
    
                    <?php
                    }else{
                        ?>
                        <!-- close -->
                        <tr>
                            <td hidden><?php echo $row["id"]; $id = $row["id"]; ?></td>
                            <td><?php echo $row["restaurantName"]?></td>
                            <td><?php echo $row["address1"] . " " . $row["barangay"] . " " . $row["city"] . ", " . $row["province"]?></td>
                            <td>Closed</td>
                            <td><a href="customer-approved-feedback.php?id=<?=$id ?>" class="btn btn-outline-warning srchbtn <?=$disable?>">Feedbacks</button></td>
                        </tr>
    
                    <?php
                    }
    }
            }else{
                ?>
                <!-- null -->
                <tr>
                    <td hidden><?php echo $row["id"]; $id = $row["id"]; ?></td>
                    <td><?php echo $row["restaurantName"]?></td>
                    <td><?php echo $row["address1"] . " " . $row["barangay"] . " " . $row["city"] . ", " . $row["province"]?></td>
                    <td><a href="res-select.php?id= <?=$id ?>" class="btn btn-outline-success srchbtn  <?=$disable?>">Select</button></td>
                    <td><a href="customer-approved-feedback.php?id=<?=$id ?>" class="btn btn-outline-warning srchbtn <?=$disable?>">Feedbacks</button></td>
                </tr>
            <?php
                }
            }
        }
    }
    $conn->close();
}

?>