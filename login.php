<?php
	if(!empty($_POST['send'])){
		if (!empty($_POST['email']) AND !empty($_POST['password'])){
			$email  = mysqli_real_escape_string($connection, $_POST ['email']);
			$password = mysqli_real_escape_string($connection, $_POST ['password']);
			$password = md5 ($password);
			$query ="SELECT * FROM users WHERE email= '$email' AND password = '$password' ";
			$execQuery = mysqli_query ($connection, $query);
			if(mysqli_num_rows($execQuery) !=0){
				$userData = mysqli_fetch_array($execQuery);
				$_SESSION['userID'] = $userData ['id'];
				echo "<p style='color: green; '>You were successfully logged in, " .$userData['name']. "!</p>";				
			}else{
				echo "<p style ='color: red; '>Entered data not valid!!</p>";
			}
			
		}else{
			 echo "<p style ='color: red; '>You didn't fill out all fields!</p>";    
			}			
		}
		

		echo "	
		<form method='POST' action ='index2.php?form=login'>
			<p><input type='email' name='email' placeholder='Email-adress'></p>
			<p><input type='password' name= 'password' placeholder='Password'></p>
			<p><input type='submit' name='send' value = 'Login'></p>
		</form>	
			";
?>