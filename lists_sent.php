<?php
	include('session.php');
	if(!isset($_SESSION['login_user']))
	{
		header("location: index.php");
	}
	include('list.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="styles/lists.css" rel="stylesheet" type="text/css">
		<ul>
			<li><a style="color: white;" href="lists_got.php">Odebrane</a></li>
			<li><a style="color: white;" class="active" href="lists_sent.php">Wysłane</a></li>
			<li><a style="color: white;"href="send.php">Wyślij list</a></li>
			<li style="float:right"><a style="color: white;" href="logout.php">Wyloguj się</a></li>
			<li style="float:right"><a style="color: white;"href="change.php">Zmień hasło</a></li>
		</ul>

	</head>
	<body>
		<h2>Wysłane:</h2>
		<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Wyszukaj po odbiorcach" title="Type in a name">
		<table id="myTable">
			<tr class="header">
				<th style="width:10%;">Do</th>
				<th style="width:10%;">Data wysłania</th>
				<th style="width:80%;">Podgląd</th>
			</tr>
			<?php
				$db = mysqli_connect("localhost", "id13024848_kaczuszka01", "k1234", "id13024848_database01");
				$query = "SELECT * FROM `letters` WHERE od='$login_session' ORDER BY `letters`.`id` DESC";
				$results=mysqli_query($db,$query);
				$row_count=mysqli_num_rows($results);
				while ($row = mysqli_fetch_array($results))
				{
					$akt_name = $row['id'];
					$gdzie = 'list.php?id='.$akt_name;
					echo "
					<tr>
						<td> <a href=".$gdzie . " target='_blank'> " . $row['do'] ." </a></td> 
						<td> <a href=".$gdzie . " target='_blank'> " . $row['datawyslania'] ." </a></td> 
						<td> <a href=".$gdzie . " target='_blank'> " . $row['podpis'] ." </a></td> 
					</tr>
					";
				}
				mysqli_query($db,$query); 
				mysqli_close($db);
			?>
		</table>
		<script>
		function myFunction()
		{
			var input, filter, table, tr, td, i, txtValue;
			input = document.getElementById("myInput");
			filter = input.value.toUpperCase();
			table = document.getElementById("myTable");
			tr = table.getElementsByTagName("tr");
			for (i = 0; i < tr.length; i++)
			{
				td = tr[i].getElementsByTagName("td")[0];
				if (td)
				{
					txtValue = td.textContent || td.innerText;
					if (txtValue.toUpperCase().indexOf(filter) > -1)
					{
						tr[i].style.display = "";
					}
					else
					{
						tr[i].style.display = "none";
					}
				}       
			}
		}
		</script>

	</body>
</html>
