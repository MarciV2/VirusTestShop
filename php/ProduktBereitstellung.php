<?php
    $servername = 'localhost';
    $dbname = 'vts';
    $dbusername = 'root';
    $dbpasswort = '';
    $serverdaten = "mysql:host=$servername;dbname=$dbname";

    if(!isset($_SESSION))
    {
        SESSION_START();
    }



    function console_log( $data ){
        echo '<script>';
        echo 'console.log('.json_encode($data).')';
        echo '</script>';
    }

    # Datenbankverbindung herstellen
    $verbindung = mysqli_connect($servername, $dbusername, $dbpasswort);

    # Verbindung hergestellt?
    if(!$verbindung)
    {
        console_log("Error Verbindung");
    }

    #konkrete Datenbank auf dem dem Server auswählen
    $datenbank = mysqli_select_db($verbindung, $dbname);


    if(!$datenbank)
    {
        console_log("Kann die Datenbank nicht verwenden");
        mysqli_close($verbindung);      # Verbindung schliessen bei vorangegagenem Zugriffsfehler
        Header("../index.php");
                                   # Programm beenden
    }


    #Cookie für die Produkte setzen zur Weiterverarbeitung auf der Produktangebot.php
    $sqlProdukte = "SELECT * FROM `artikel`";
    $sqlProdukteCheck = mysqli_query($verbindung,$sqlProdukte);
    $valueProduktArray = array();
    while($reihe = mysqli_fetch_assoc($sqlProdukteCheck)){
        $value = $reihe["Artikel_ID"] . ";" . $reihe["Artikelname"] . ";" . $reihe["Kategorie_ID"] . ";" . $reihe["Hersteller_ID"] . ";";
        array_push($valueProduktArray, $value);        
    }
    setcookie("ArtikelCookie",json_encode($valueProduktArray),time()+3600);

    #cookie für die Packungen setzen für die WEiterverarbeitung der Produktangebot.php
    $sqlPackungen = "SELECT * FROM `packung`";
    $sqlPackungenCheck = mysqli_query($verbindung, $sqlPackungen);
    $valuePackungsArray = array();
    while($reihe2 = mysqli_fetch_assoc($sqlPackungenCheck)){ 
        $value= $reihe2["Packung_ID"] .";". $reihe2["Packungsgroessee"] . ";" . $reihe2["Verkaufspreis"] .";". $reihe2["Verkaufspreis"] .";" . $reihe2["Mindestbestand"] . ";" . $reihe2["Lagermenge"] . ";" . $reihe2["Artikel_ID"] . ";";
        array_push($valuePackungsArray,$value);
    }
    setcookie("PackungCookie",json_encode($valuePackungsArray),time()+3600);
?>