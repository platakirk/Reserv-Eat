<?php 
session_start();
require_once '../connection.php';
 // Check if staff name is empty

    if(isset($_POST["btn"])){
        if($_POST["catName"] != "" ){

            $target_dir = "images/";
            $uploadOk = 1;
            $newfilename= date('dmYHis').str_replace("", "", basename($_FILES["fileToUpload"]["name"]));
            $target_file = $target_dir . basename($newfilename);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $finalfilename = date('dmYHis')."1".".".$imageFileType;//add the user id.
            $target_file = $target_dir . basename($finalfilename);

            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }

            // Check if file already exists
            if (file_exists("../" .$target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 5000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "../" .$target_file)) {
                    echo '<script language="javascript">';
                    echo 'alert("File was Uploaded';
                    echo '");';
                    echo '</script>';
                    $id = $_POST["catName"];
                    $n = $_POST["name"];
                    $p = $_POST["price"];
                    $sql = "INSERT INTO menuitem (catId, name, price, image) values ($id , '$n' ,$p, '$target_file')";
                    echo '<script language="javascript">';
                    echo 'alert("';
                    echo $sql;
                    echo '");';
                    echo '</script>';
                    if($conn->query($sql)){
                        echo "hi";
                        echo '<script language="javascript">';
                        echo 'alert("Query was added';
                        echo '");';
                        echo '</script>';
                         header("location: ../landing.php?select=menu");
                $conn->close();          
            }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
        else{
            header("location: ../landing.php?select=menu&err=itemMenu");
        }   
    }
?>