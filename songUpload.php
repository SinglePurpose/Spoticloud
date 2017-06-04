<?php
$target_dir = "music/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$audioFileType = pathinfo($target_file,PATHINFO_EXTENSION);


// Check file size
if ($_FILES["fileToUpload"]["size"] > 20000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
 } else {
        echo "Sorry, there was an error uploading your file.";
 }
?>