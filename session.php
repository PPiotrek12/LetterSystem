<?php
	$conn = mysqli_connect("localhost", "...", "...", "...");
	session_start();
	$user_check = $_SESSION['login_user'];
	$query = "SELECT username from login where username = '$user_check'";
	$ses_sql = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($ses_sql);
	$login_session = $row['username'];
	$login_session = $row['username'];

	$query2 = "SELECT password from login where username = '$user_check'";
	$ses_sql2 = mysqli_query($conn, $query2);
	$row2 = mysqli_fetch_assoc($ses_sql2);
	$password_session = $row2['password'];
	
	$query3 = "SELECT sent from login where username = '$user_check'";
	$ses_sql3 = mysqli_query($conn, $query3);
	$row3 = mysqli_fetch_assoc($ses_sql3);
	$sent_session = $row3['sent'];

	$query4 = "SELECT got from login where username = '$user_check'";
	$ses_sql4 = mysqli_query($conn, $query4);
	$row4 = mysqli_fetch_assoc($ses_sql4);
	$got_session = $row4['got'];

?>
