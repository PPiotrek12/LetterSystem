<?php
    session_start();
	if (isset($_POST['submit'])) 
	{
        $errors = array(); 
        $goods = ""; 
		$db = mysqli_connect("localhost", "id13024848_kaczuszka01", "k1234", "id13024848_database01");		
        $odbiorca = $_POST['odbiorca'];
        $miejscowosc = $_POST['miejscowosc'];
        $data = $_POST['data'];
        $tresc = $_POST['tresc'];
        $podpis = $_POST['podpis'];
        if (empty($odbiorca)) { array_push($errors, "Nazwa odbiorcy jest pusta!"); }
        if (empty($miejscowosc)) { array_push($errors, "Nazwa miejsowości jest pusta!"); }
        if (empty($data)) { array_push($errors, "Data jest pusta!"); }
        if (empty($tresc)) { array_push($errors, "Treść jest pusta!"); }
        if (empty($podpis)) { array_push($errors, "Podpis jest pusty!"); }
        
		$user_check_query = "SELECT * FROM login WHERE username='$odbiorca' LIMIT 1";
		$result = mysqli_query($db, $user_check_query);
		$user = mysqli_fetch_assoc($result);
		if ($user)
		{
			if ($user['username'] != $odbiorca)
			{
				array_push($errors, "Taki użytkownik nie istnieje!");
		  	}
        }
        else
            array_push($errors, "Taki użytkownik nie istnieje!");
        if (count($errors) == 0)
        {
            $date = date("d.m.Y");
			$query = "INSERT INTO letters (miejscowosc, data, tresc, podpis, od, do, datawyslania) 
					VALUES('$miejscowosc', '$data', '$tresc', '$podpis', '$login_session', '$odbiorca', '$date')";
            mysqli_query($db, $query);
            $goods = "List został wysłany.";
		}
	}
?>
