<?php
error_reporting(0);
define('MB', 1048576);

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


$title = $ThisFileInfo['comments_html']['title'][0];
$artist = $ThisFileInfo['comments_html']['artist'][0];
$genre = $ThisFileInfo['comments_html']['genre'][0];
$_SESSION['length'] = $ThisFileInfo['playtime_seconds'];
$year = $ThisFileInfo['comments_html']['year'][0];


// Check file size
if ($_FILES["fileToUpload"]["size"] > 20*MB) {
    echo "Your file is too large.";
    $uploadOk = 0;
}

//check if file is mp3
if ($audioFileType != "mp3") {
    echo "File must be mp3";
    $uploadOk = 0;
}

//file upload to storage
if ($uploadOk == 0) {
        echo "<br>File wasn't uploaded<br><a href='".$backToHome."'>Go back to Spoticloud Main Page</a>";
}

// alle checks durch: file hochladen und tags setzen
if ($uploadOk == 1) {
	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
	echo'
		<head>
			<title>Spoticloud</title>
			<link rel="stylesheet" type="text/css" href="css/style.css">
		</head>
		<body>
			<p>Please enter missing tags:</p>
			<form action="set_tags.php" method="post" enctype="multipart/form-data">

			<table>
				<tr>
					<td>Title </td>
					<td><input type="text" name="title" value="'.$title.'" placeholder="Title" id="title"></td>
				</tr>
				<tr>
					<td>Artist </td>
					<td><input type="text" name="artist" value="'.$artist.'" placeholder="Artist" id="artist"></td>
				</tr>
				<tr>
					<td>Genre </td>
					<td><input type="text" name="genre" value="'.$genre.'" placeholder="Genre" id="genre"></td>
				</tr>
				<tr>
					<td>Year </td>
					<td><input type="number" name="year" value="'.$year.'" placeholder="Year" id="year"></td>
				</tr>
			</table>
				<input type="submit" value="Confirm tags" name="submit">
			</form>
		</body>
	';
}
?>