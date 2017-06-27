<?php
session_start();
$target_file = $_SESSION['target_file'];

$backToHome = 'index.html'; //variable für die main page, da der verweis zu der seite in html direkt im php echo nicht funktioniert

$titleInput = $_POST["title"];
$artistInput = $_POST["artist"];
$genreInput = $_POST["genre"];
$lengthInput = $_POST["length"];
$yearInput = $_POST["year"];

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
} else {
	echo "<a href='".$backToHome."'>Go back to Spoticloud Main Page</a>";
}

$conn->close();
?>