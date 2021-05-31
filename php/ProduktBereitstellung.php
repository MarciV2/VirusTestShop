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
	$login = $_SESSION["login"];
    console_log($login);
    # Datenbankverbindung herstellen
    $verbindung = mysqli_connect($servername, $dbusername, $dbpasswort);

    # Verbindung hergestellt?
    if(!$verbindung)
    {
        console_log("Error Verbindung");
    }

    #konkrete Datenbank auf dem dem Server ausw�hlen
    $datenbank = mysqli_select_db($verbindung, $dbname);


    if(!$datenbank)
    {
        console_log("Kann die Datenbank nicht verwenden");
        mysqli_close($verbindung);      # Verbindung schliessen bei vorangegagenem Zugriffsfehler
        Header("location: /index.php");
                                   # Programm beenden
    }

    #cookie f�r die Packungen setzen f�r die Weiterverarbeitung der Produktangebot.php

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
        default : $kategorie="\n WHERE k.Bezeichnung LIKE '%' \n"; break;
    }

   $kontoTypFilter=" AND b.Kundentyp_ID=1 ";
   if($login==2)$kontoTypFilter="";

    $sqlPackungen = "SELECT
        p.Packung_ID,
        h.Name AS Hersteller,
        a.Artikelname AS Artikelname,
        a.Beschreibung AS Beschreibung,
        p.Packungsgroessee AS Packungsgroesse,
        round(p.Verkaufspreis,2) AS Preis,
        p.Lagermenge AS Bestand,
        k.Bezeichnung AS Kategorie,
        b.Kundentyp_ID

        FROM
        packung p
        JOIN artikel a ON a.Artikel_ID=p.Artikel_ID
        LEFT JOIN hersteller h ON h.Hersteller_ID=a.Hersteller_ID
        LEFT JOIN kategorie k ON k.kategorie_ID=a.kategorie_ID
        JOIN bestellfaehigkeit b ON k.Kategorie_ID=b.Kategorie_ID
        " . $kategorie . $kontoTypFilter .
        "GROUP BY Packung_ID ORDER BY " . $orderByParam;


    $sqlPackungenCheck = mysqli_query($verbindung, $sqlPackungen);
   console_log( $sqlPackungen);
   console_log(mysqli_error($verbindung));
   //cookie "l�schen"
   setcookie("PackungCookie","", time() - 3600);
    $valuePackungsArray = array();
    while($reihe2 = mysqli_fetch_assoc($sqlPackungenCheck)){
        $value= $reihe2["Packung_ID"] .";". $reihe2["Hersteller"] . ";" . $reihe2["Artikelname"] .";". $reihe2["Beschreibung"] .";" . $reihe2["Packungsgroesse"] . ";" . $reihe2["Preis"] . ";". $reihe2["Bestand"] .";";
        array_push($valuePackungsArray,$value);
        console_log($value);
    }
    //cookie mit richtigen Werten setzen
    setcookie("PackungCookie",json_encode($valuePackungsArray),time()+3600,'/');




?>