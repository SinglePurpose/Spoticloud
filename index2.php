<?php
session_start();
header ("Content-Type: text/html; Charset=utf-8");

$host= "localhost";
$user ="root";
$password = "";
$db = "spoticlouddb";

$connection = mysqli_connect($host, $user, $password);	
if ($connection){	
	if(!mysqli_select_db($connection, $db))
		echo "<br>". mysqli_error($connection);
		

}else {
	
	echo "<br>". mysqli_error($connection);
	
}


if (!empty ($_SESSION['userID'])){
	$userID = mysqli_real_escape_string($connection, $_SESSION['userID']);
	$query = "SELECT * FROM users WHERE id= '$userID' ";
	$execQuery = mysqli_query($connection, $query);
	if (mysqli_num_rows($execQuery) != 0){
		$userData = mysqli_fetch_array($execQuery);
		echo "<p>You are logged in, ".$userData['name']."</p>";			
	}
	
}



echo "
	<p>
	<a href = 'index2.php?form=register'>Register</a>
	<a href = 'index2.php?form=login'>Login</a>
	<a href = 'index2.php?page=settings'>Spoticloud</a>
	<a href = 'index2.php?page=logout'>Logout</a>
	<p/>                                                                                                                                                                                                                                                                      
	";
	
	if (!empty($_GET['form'])AND $_GET ['form']== "register"){
		//registerformular
		include ("register.php");
	}else if (! empty ($_GET['form'])AND  $_GET['form']== "login")  {
		include ("login.php");
	}else if(!empty($_GET['page']) AND $_GET['page'] == "settings"){
		include ("index.html");
	}else if(!empty($_GET['page']) AND $_GET['page'] == "logout"){
		include ("logout.php");
	}
?>	












































