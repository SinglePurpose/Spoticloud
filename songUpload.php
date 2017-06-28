<?php
error_reporting(0);
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/getid3/getid3.php';
$target_dir = "music/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$filename = basename($_FILES["fileToUpload"]["name"]);
$_SESSION['target_file'] = $target_file;
$uploadOk = 1;
$audioFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$backToHome = 'index.html'; //variable für die main page, da der verweis zu der seite in html direkt im php echo nicht funktioniert
$getID3 = new getID3;
$ThisFileInfo = $getID3->analyze($target_file);
getid3_lib::CopyTagsToComments($ThisFileInfo);


$_SESSION['title'] = $ThisFileInfo['comments_html']['title'][0];
$_SESSION['artist'] = $ThisFileInfo['comments_html']['artist'][0];
$_SESSION['genre'] = $ThisFileInfo['comments_html']['genre'][0];
$_SESSION['length'] = $ThisFileInfo['playtime_seconds'];
$_SESSION['year'] = $ThisFileInfo['comments_html']['year'][0];


// Check file size; other checks need to be added later: https://www.w3schools.com/php/php_file_upload.asp
if ($_FILES["fileToUpload"]["size"] > 20000000) {
    echo "Sorry, your file is too large.";
	echo "<br><a href='".$backToHome."'>Go back to Spoticloud Main Page</a>";
    $uploadOk = 0;
}


//file upload to storage
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //header("Location: set_tags.html"); //redirect to tag html
		//exit();
} else {
        echo "Sorry, there was an error uploading your file.";
}
echo'
	<p>Please enter missing tags:</p>
	<form action="set_tags.php" method="post" enctype="multipart/form-data">
		<input type="text" name="title" value="'.$_SESSION['title'].'" placeholder="title" id="title">
		<input type="text" name="artist" value="'.$_SESSION['artist'].'" placeholder="artist" id="artist">
		<input type="text" name="genre" value="'.$_SESSION['genre'].'" placeholder="genre" id="genre">
		<input type="number" name="year" value="'.$_SESSION['year'].'" placeholder="year" id="year">
		<input type="submit" value="Add tags to song" name="submit">
	</form>
';
 
?>