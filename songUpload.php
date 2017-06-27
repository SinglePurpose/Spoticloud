<?php
session_start();
$target_dir = "music/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$filename = basename($_FILES["fileToUpload"]["name"]);
$_SESSION['target_file'] = $target_file;
$uploadOk = 1;
$audioFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$backToHome = 'index.html'; //variable für die main page, da der verweis zu der seite in html direkt im php echo nicht funktioniert


// Check file size; other checks need to be added later: https://www.w3schools.com/php/php_file_upload.asp
if ($_FILES["fileToUpload"]["size"] > 20000000) {
    echo "Sorry, your file is too large.";
	echo "<br><a href='".$backToHome."'>Go back to Spoticloud Main Page</a>";
    $uploadOk = 0;
}


//file upload to storage
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        header("Location: set_tags.html"); //redirect to tag html
		exit();
 } else {
        echo "Sorry, there was an error uploading your file.";
 }
 
?>