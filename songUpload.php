<?php
$target_dir = "music/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$filename = basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$audioFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$backToHome = 'index.html'; //variable für die main page, da der verweis zu der seite in html direkt im php echo nicht funktioniert

$titleInput = $_POST["title"];
$artistInput = $_POST["artist"];
$genreInput = $_POST["genre"];
$lengthInput = $_POST["length"];
$yearInput = $_POST["year"];


// Check file size; other checks need to be added later: https://www.w3schools.com/php/php_file_upload.asp
if ($_FILES["fileToUpload"]["size"] > 20000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
//file upload to storage
 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br>
			 <a href='".$backToHome."'>Go back to Spoticloud Main Page</a>";
 } else {
        echo "Sorry, there was an error uploading your file.";
 }


//write new song data into db
$user = 'root';
$pass = '';
$db = 'spoticlouddb';

$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

$sql = "INSERT INTO songs (title, artist, genre, length, year, filename)
		VALUES ('".$titleInput."',
				'".$artistInput."',
				'".$genreInput."',
				'".$lengthInput."',
				'".$yearInput."',
				'".$target_file."')";

if ($conn->query($sql) === FALSE) {
   echo "Error: " . $sql . "<br>" . $conn->error . "<br>File was not added into the database";   
}

$conn->close();

 //debug
 //echo "<br>";
 //echo $target_dir."<br>";
 //echo $target_file."<br>";
 //echo basename( $_FILES["fileToUpload"]["name"]);
?>