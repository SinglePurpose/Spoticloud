<?php
$user = 'root';
$pass = '';
$db = 'spoticlouddb';

//establish connection
$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");


$sql = "SELECT * FROM songs";
$result = $conn->query($sql);

//create php array from sql data
$emparray = array();
while ($row = mysqli_fetch_assoc($result))
{
	$emparray[] = $row;
}

//convert php array into json
echo json_encode($emparray);

$conn->close();

?>