<?php
session_start();
$target_file = $_SESSION['target_file'];
$backToHome = 'index2.php?page=settings'; //variable für die main page, da der verweis zu der seite in html direkt im php echo nicht funktioniert

$title = $_POST["title"];
$artist = $_POST["artist"];
$genre = $_POST["genre"];
$length = $_SESSION["length"];
$year = $_POST["year"];

//write new song data into db
$user = 'root';
$pass = '';
$db = 'spoticlouddb';

$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

$sql = "INSERT INTO songs (title, artist, genre, length, year, filename)
		VALUES ('".$title."',
				'".$artist."',
				'".$genre."',
				'".$length."',
				'".$year."',
				'".$target_file."')";

if ($conn->query($sql) === FALSE) {
    echo "Error: " . $sql . "<br>" . $conn->error . "<br>File was not added into the database";   
} else {
	echo '
		<head>
			<title>Spoticloud</title>
			<link rel="stylesheet" type="text/css" href="css/style.css">
		</head>
		<body>
			Your song has been added successfully!<br>
			<a href="'.$backToHome.'" style="color: burlywood">Go back to Spoticloud Main Page</a>
		</body>
	';
}

$conn->close();
?>