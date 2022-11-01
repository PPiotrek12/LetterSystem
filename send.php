<?php
    include('session.php');
    include('wyslij.php');
	if(!isset($_SESSION['login_user']))
	{
		header("location: index.php");
    }
?>

<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link href="styles/input_form.css" rel="stylesheet" type="text/css">
    <title> Kaczuszki </title>
    <ul>
			<li><a style="color: white;"  href="lists_got.php">Odebrane</a></li>
			<li><a style="color: white;" href="lists_sent.php">Wysłane</a></li>
			<li><a style="color: white;" class="active"href="send.php">Wyślij list</a></li>
			<li style="float:right"><a style="color: white;" href="logout.php">Wyloguj się</a></li>
			<li style="float:right"><a style="color: white;"href="change.php">Zmień hasło</a></li>
	</ul>


    <form action="" method="post">
        <table>
            <tr>
                <td> <h2>Wyślij list: </h2> </td>
            </tr>
            <tr>
                <td> <label>Odbiorca (upewnij się, że taki użytkownik istnieje!): </label> </td>
            </tr>
            <tr>
                <td> <input id="odbiorca" name="odbiorca"  type="text">  </td>
            </tr>
            <tr>
                <td> <label> Miejscowość: </label> </td>
            <tr>
            </tr>
                <td> <input id="miejscowosc" name="miejscowosc" type="text"> </td> 
            </tr>
            <tr>
                <td> <label> Data pisania: </label> </td>
            <tr>
            </tr>
                <td> <input id="data" name="data" type="text"> </td> 
            </tr>
            <tr>
                <td> <label>Treść:</label> </td>
            <tr>
            </tr>
                <td> <textarea rows="10" class="text_edit" name="tresc" id="tresc"></textarea> </td>
            </tr>
            <tr>
                <td> <label>Podpis:</label> </td>
            <tr>
            </tr>
                <td> <textarea rows="3" class="text_edit" name="podpis" id="tresc"></textarea> </td>
            </tr>

            <tr>
                <td> <input name="submit" type="submit" value=" Wyślij "></td> 
            </tr>
            <tr>
                <td> <span><?php echo $errors[0]; ?></span></td> 
            </tr>
            <tr>
                <td> <b id="ZIELONO"><?php echo $goods; ?> </b></td> 
            </tr>
        </table>
    </form>
<html>