<?php
if (!empty($_POST['send'])){
	if (!empty($_POST['name'])){
		$name = mysqli_real_escape_string ($connection, $_POST['name']);
		$query= "SELECT * FROM users WHERE name = '$name' ";
		$execQuery = mysqli_query ($connection, $query);
		if (mysqli_num_rows ($execQuery)==0){
			
		
			$nameChecked =true;
			
		}else{
			 echo "<p style= 'color: red;'>The name \"$name\" already exists!</p> ";
			
		}
	}else{
	 echo "<p style= 'color: red;'>Enter username!</p> ";
 }
 
 
 
 if (!empty($_POST['email'])){
	 $email= mysqli_real_escape_string($connection, $_POST['email']);
	$query= "SELECT * FROM users WHERE email = 'email' ";
	$execQuery = mysqli_query ($connection, $query);
if (mysqli_num_rows($execQuery)==0){
	
	if(preg_match('/^[^\x00-\x20()<>@,;:\\".[\]\x7f-\xff]+(?:\.[^\x00-\x20()<>@,;:\\".[\]\x7f-\xff]+)*\@[^\x00-\x20()<>@,;:\\".[\]\x7f-\xff]+(?:\.[^\x00-\x20()<>@,;:\\".[\]\x7f-\xff]+)+$/i', $email)){
		
		$emailChecked =true;
	}else{
		
		echo "<p style='color: red; '>Enter valid E-Mail adress!</p> ";
		
		
	
	
}
	
	}else{
		echo "<p style='color: red; '>E-Mail adress already exists</p> ";
		
		
	}	 
 	
 }else {
	 echo "<p style= 'color: red;'>Please enter E-Mail adress!</p> ";
}
	 
		
if(!empty($_POST['password']) AND !empty($_POST['password2'])){
	$password = mysqli_real_escape_string($connection, $_POST['password']);
	$password2 = mysqli_real_escape_string($connection, $_POST['password2']);
	if (strlen($password)>=6){
		$password =md5($password);
		$password2 =md5($password2);
		if($password == $password2){
			$passwordChecked = true;
		}else{
	 	 echo "<p style= 'color: red;'>Passwords not identical</p> ";
		}
	}else {
 	 echo "<p style= 'color: red;'>Password too short (minimum 6 characters)</p> ";
 }
}else{
	 echo "<p style= 'color: red;'>Password missing</p> ";
	
}
			
			
if (isset($nameChecked)AND isset ($emailChecked)AND isset ($passwordChecked)){
	$query ="INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
	$execQuery = mysqli_query($connection,$query);
	if($execQuery){
  	 echo "<p style= 'color: green;'>Registration successful</p> ";
	}else {
 	 echo "<p style= 'color: red;'>Registration not successful</p> ";
		
	}
	
}
}	
	
echo "
	<form method ='POST' action ='index2.php?form=register'>
 <p><input type ='text' name ='name' placeholder ='Username'></p>
 <p><input type ='mail' name ='email' placeholder ='E-Mail adress'></p>
 <p><input type ='password' name ='password' placeholder ='Password'></p>
 <p><input type ='password' name ='password2' placeholder ='repeat password'></p>
 <p><input type ='submit' name ='send' value='Sign up'></p>
 </form>
	";
?>