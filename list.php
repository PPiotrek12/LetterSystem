<?php
    session_start();
    include('session.php');
    $id = $_GET['id'];
    $db = mysqli_connect("localhost", "id13024848_kaczuszka01", "k1234", "id13024848_database01");
    $query = "SELECT * FROM letters WHERE id='$id' LIMIT 1";
    $result = mysqli_query($db, $query);
    $list = mysqli_fetch_assoc($result);
    if($list['od'] != $login_session && $list['do'] != $login_session&& !empty($id))
        echo("<h1>BRAK DOSTĘPU!!!!!!!!! </h1>");
    else if(($list['od'] == $login_session || $list['do'] == $login_session) && !empty($id))
    {
        $eols = array("\n");
        $tresc = $list['tresc'];
        $tresc = str_replace($eols,'<br>',$tresc);
        echo "
        <body>
            <link href='styles/letter.css' rel='stylesheet' type='text/css'>
            <br> Od: <b>".$list['od']."</b>, <br> Do: <b>".$list['do']."</b><br>
            Data wysłania listu: <b>".$list['datawyslania'] ."</b><br> 
            <br> <br>
            <div id='list'>

                <p style='float:right;'>". $list['miejscowosc'] .", <br> " . $list['data'] ." </p> 
                <br> <br> <br> <br>
                
                ". $tresc . "
                <p style='float: right;'>". $list['podpis'] . " </p> 
                <p> <br> </p>
                
                
                
            </div>
        </body>
        ";
    }
        
?>
