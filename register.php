<?php
	session_start();
	if (isset($_POST['submit2'])) 
	{
		$username = "";
		$errors = array(); 
		$db = mysqli_connect("localhost", "id13024848_kaczuszka01", "k1234", "id13024848_database01");		
		$username = mysqli_real_escape_string($db, $_POST['newusername']);
		$password_1 = mysqli_real_escape_string($db, $_POST['newpassword']);
		$password_2 = mysqli_real_escape_string($db, $_POST['newpassword2']);
		if (empty($username)) { array_push($errors, "Nazwa urzytkownika jest pusta!"); }
		if (empty($password_1)) { array_push($errors, "Hasło jest puste!"); }
		if ($password_1 != $password_2) {
		  	array_push($errors, "Hasła się różnią!");
		}
	  
		$user_check_query = "SELECT * FROM login WHERE username='$username' LIMIT 1";
		$result = mysqli_query($db, $user_check_query);
		$user = mysqli_fetch_assoc($result);
		
		if ($user)
		{
			if ($user['username'] === $username)
			{
				array_push($errors, "Taki użytkownik już istieje!");
		  	}
		}
	  
		if (count($errors) == 0) {
			$password = md5($password_1);
			$query = "INSERT INTO login (username, password) 
					VALUES('$username', '$password')";
			mysqli_query($db, $query);
			$_SESSION['login_user'] = $username;
			header('location: lists_got.php');
		}
	}
?>
