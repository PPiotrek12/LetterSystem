<?php
	include('login.php');
	include('register.php');
	if(isset($_SESSION['login_user']))
	{
		header("location: lists_got.php");
	}
?>
<!DOCTYPE html>
<html>
    <style>
        body
        {
            background-image: url('img/bcg_lobby2.jpg');
        }
    </style>

	<head>
		<title>	Lobby </title>
		<link href="styles/index.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<form action="" method="post">
			<div id="content">
				<table id="left">
					<tr>
						<td> <h2>Zaloguj się!</h2> </td>	
					</tr>
					<tr>
						<td> <label>Nazwa użytkownika:</label> </td>
					</tr>
					<tr>
						<td> <input id="name" name="username"  type="text">  </td>
					</tr>
					<tr>
						<td> <label>Hasło:</label> </td>
					<tr>
					</tr>
						<td> <input id="password" name="password" type="password"> </td> 
					</tr>
					<tr>
						<td> <input name="submit" type="submit" value=" Login "></td> 
					</tr>
					<tr>
						<td> <span><?php echo $error; ?></span></td> 
					</tr>
				</table>
				<table id="right">
					<tr>
						<td><h2>Zarejestruj się!</h2> </td>
					</tr>
					<tr>
						<td> <label>Nazwa użytkownika:</label> </td>
					</tr>
					<tr>
						<td> <input id="newusername" name="newusername"  type="text"> </td>
					</tr>
					<tr>
						<td> <label>Hasło:</label> </td>
					</tr>
					<tr>
						<td> <input id="newpassword" name="newpassword" type="password"></td>
					</tr>
					<tr>
						<td><label>Potwierdź hasło:</label> </td>
					</tr>
					<tr>
						<td> <input id="newpassword2" name="newpassword2" type="password"></td>
					<tr>
						<td> <input name="submit2" type="submit" value=" Rejestruj "> </td>
					</tr>
					<tr>
						<td> <span><?php echo $errors[0]; ?></span> </td>
					</td>
				</table>
			</div>
		</form>
	</body>
</html>
