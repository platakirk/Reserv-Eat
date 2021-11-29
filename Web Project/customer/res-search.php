<?php
require_once  "connection.php";
if(isset($_POST["searchBtn"]) && !empty($_POST['resName']) || !empty($_POST['city']) || !empty($_POST['prov'])){
        $rname = $rcity = $rprov = "";
        $rname = $_POST["resName"];
        $rcity = trim($_POST["city"]);
        $rprov = trim($_POST["prov"]);
        $sql ="SELECT id, restaurantName, address1, barangay, city, province FROM restaurant where (status='active' AND restaurantName = '$rname') OR 
                (status='active' AND city = '$rcity') OR (status='active' AND province = '$rprov')";
        if($result = $conn->query($sql)){
            if($result->num_rows > 0){
                $disable = "";
            while( $row = $result->fetch_assoc()){ ?>
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
    $conn->close();
}
else{
 $sql = "SELECT id, restaurantName, address1, barangay, city, province FROM restaurant WHERE status='active'";

    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
        while( $row = $result->fetch_assoc()){?>
                <tr>
                        <td hidden><?php echo $row["id"]; $id = $row["id"];?></td>
                        <td><?php echo $row["restaurantName"]?></td>
                        <td><?php echo $row["address1"] . " " . $row["barangay"] . "," . $row["city"] . ", " . $row["province"]?></td>
                        <td><a href="res-select.php?id=<?=$id ?>" class="btn btn-outline-success srchbtn  <?=$disable?>">Select</button></td>
                        <td><a href="customer-approved-feedback.php?id=<?=$id ?>" class="btn btn-outline-warning srchbtn <?=$disable?>">Feedbacks</button></td>
                </tr>

    <?php
        }
        }
    }
    $conn->close();
}

?>