<?php
	session_start();
	$error = '';
	if (isset($_POST['submit'])) 
	{
		if (empty($_POST['username']) || empty($_POST['password'])) 
		{
			$error = "Nazwa użytkownika lub hasło jest puste!";
		}
		else
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			$password = md5($password);
			$conn = mysqli_connect("localhost", "id13024848_kaczuszka01", "k1234", "id13024848_database01");
			$query = "SELECT username, password from login where username=? AND password=? LIMIT 1";
			$stmt = $conn->prepare($query);
			$stmt->bind_param("ss", $username, $password);
			$stmt->execute();
			$stmt->bind_result($username, $password);
			$stmt->store_result();
			if($stmt->fetch())
			{
				$_SESSION['login_user'] = $username;
				header("location: lists_got.php");
			}
			else
				$error = "Błędne hasło lub nazwa użytkownika!";
		}
	}
?>
