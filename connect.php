<?php
$user = 'root';
$pass = '';
$db = 'spoticlouddb';

$db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

$sql = "SELECT id FROM 'songs'";
$data = array();
$result = mysqli_query($db, $sql);


$row = mysqli_fetch_assoc($result);
	

print json_encode($data);
mysqli_close($db);

?>