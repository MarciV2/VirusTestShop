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
        Header("location: /index.php");
                                   # Programm beenden
    }

    #cookie für die Packungen setzen für die Weiterverarbeitung der Produktangebot.php

    //Sortier-Kriterium
   $orderByParam=$_GET['orderBy'];
   //Switch abfrage gegen SQL-Injection
   switch($orderByParam){
        case "Preis ASC"  :
        case "Preis DESC" :
        case "Packungsgroesse ASC"  :
        case "Packungsgroesse DESC" : break;
        default : $orderByParam="Preis ASC"; break;
    }
    //Kategorie-abfrage
    $kategorie=$_GET['kategorie'];
    //console_log($kategorie);
   //Switch gegen SQL-Injection
   switch($kategorie){
        case "Corona Schnelltests"  : $kategorie="\n WHERE k.Bezeichnung = 'Test' \n"; break;
        case "Corona PCR-Tests" :$kategorie="\n WHERE k.Bezeichnung = 'Medizinischer Test' \n"; break;
        case "Schulungen"  : $kategorie="\n WHERE k.Bezeichnung = 'Training' \n"; break;
        default : $kategorie=""; break;
    }

    $sqlPackungen = "SELECT
        p.Packung_ID,
        h.Name AS Hersteller,
        a.Artikelname AS Artikelname,
        a.Beschreibung AS Beschreibung,
        p.Packungsgroessee AS Packungsgroesse,
        round(p.Verkaufspreis,2) AS Preis,
        p.Lagermenge AS Bestand,
        k.Bezeichnung AS Kategorie

        FROM
        packung p
        JOIN artikel a ON a.Artikel_ID=p.Artikel_ID
        LEFT JOIN hersteller h ON h.Hersteller_ID=a.Hersteller_ID
        LEFT JOIN kategorie k ON k.kategorie_ID=a.kategorie_ID" . $kategorie .
        " ORDER BY " . $orderByParam;


    $sqlPackungenCheck = mysqli_query($verbindung, $sqlPackungen);
   //console_log( $sqlPackungen);
   //console_log(mysqli_error($verbindung));
    $valuePackungsArray = array();
    while($reihe2 = mysqli_fetch_assoc($sqlPackungenCheck)){
        $value= $reihe2["Packung_ID"] .";". $reihe2["Hersteller"] . ";" . $reihe2["Artikelname"] .";". $reihe2["Beschreibung"] .";" . $reihe2["Packungsgroesse"] . ";" . $reihe2["Preis"] . ";". $reihe2["Bestand"] .";";
        array_push($valuePackungsArray,$value);
    }
    setcookie("PackungCookie",json_encode($valuePackungsArray),time()+3600);




?>