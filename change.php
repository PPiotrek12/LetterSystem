<?php
    include('session.php');
	include('session.php');
	if(!isset($_SESSION['login_user']))
	{
		header("location: index.php");
	}
	session_start();
	if (isset($_POST['submit3'])) 
	{
        $errors = array();
        $goods = ""; 
        $db = mysqli_connect("localhost", "id13024848_kaczuszka01", "k1234", "id13024848_database01");		
        $password_0 = mysqli_real_escape_string($db, $_POST['currentPassword']);
		$password_1 = mysqli_real_escape_string($db, $_POST['newPassword']);
		$password_2 = mysqli_real_escape_string($db, $_POST['confirmPassword']);
        if (empty($password_1)) { array_push($errors, "Hasło jest puste!"); }
        if(md5($password_0) != $password_session)
            array_push($errors, "Błędne aktualne hasło!");
		if ($password_1 != $password_2) {
		  	array_push($errors, "Hasła się różnią!");
        }
        if(count($errors) == 0)
        {
            mysqli_query($db, "UPDATE login set password='" . md5($_POST["newPassword"]) . "' WHERE username='" . $login_session . "'");
            $goods = "Hasło zostało zmienione!";
        }
	}
?>
<html>
    <head>
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link href="styles/input_form.css" rel="stylesheet" type="text/css">
        <ul>
			<li><a style="color: white;"  href="lists_got.php">Odebrane</a></li>
			<li><a style="color: white;" href="lists_sent.php">Wysłane</a></li>
			<li><a style="color: white;" href="send.php">Wyślij list</a></li>
			<li style="float:right"><a style="color: white;" href="logout.php">Wyloguj się</a></li>
			<li style="float:right"><a style="color: white;"class="active"href="change.php">Zmień hasło</a></li>
        </ul>

    	<title> Kaczuszki </title>
        <title>Zmiana hasła</title>
    </head>
    <body>
        <form name="frmChange" method="post" action="">
            <div style="width:500px;">
            <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
                <table style="border: 0px;" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
                    <tr class="tableheader">
                        <td colspan="2"> <h2>Zmiana hasła: </h2></td>
                    </tr>
                    <tr>
                        <td width="40%"><label>Aktualne hasło:</label></td>
                        <td width="60%"><input type="password" name="currentPassword" class="txtField"/><span id="currentPassword"  class="required"></span></td>
                    </tr>
                    <tr>
                        <td><label>Nowe hasło:</label></td>
                        <td><input type="password" name="newPassword" class="txtField"/><span id="newPassword" class="required"></span></td>
                    </tr>
                        <td><label>Potwierdź nowe hasło:</label></td>
                        <td><input type="password" name="confirmPassword" class="txtField"/><span id="confirmPassword" class="required"></span></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="submit3" value="Submit" class="btnSubmit"></td>

                    </tr>
                </table>
                <b><span><?php echo $errors[0]; ?></span></b>
                <b id="ZIELONO"><?php echo $goods; ?> </b>
            </div>
        </form>
    </body>
</html>

