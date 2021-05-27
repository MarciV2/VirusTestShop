<?php

    $servername = 'localhost';
    $dbname = 'vts';
    $dbusername = 'root';
    $dbpasswort = '';
    $serverdaten = "mysql:host=$servername;dbname=$dbname";

    if(!isset($_SESSION))
    {
    console_log("session not yet started -> starting");
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
       // Header("location: /index.php");
                                   # Programm beenden
    }
    $sqlQuery="SELECT k.Kunde_ID,
        k.LoginName,
        k.Vorname,
        k.Name,
        k.Email,
        k.Telefon,
        kt.Bezeichung,
        a.Land,
        a.Bundesland,
        a.Stadt,
        a.Stadtteil,
        a.PLZ,
        a.Strasse,
        a.Hausnummer

        FROM Kunde k
        JOIN Adresse a ON k.Adresse_ID=a.Adresse_ID
        JOIN Kundentyp kt ON k.Kundentyp_ID=kt.Kundentyp_ID

        WHERE k.Kunde_ID=1";




    $sqlResult = mysqli_query($verbindung, $sqlQuery);
    $valueDatenArray = array();
    while($reihe2 = mysqli_fetch_assoc($sqlResult)){ 
        $value= $reihe2["Kunde_ID"] .";". $reihe2["LoginName"] . ";" . $reihe2["Vorname"] .";". $reihe2["Name"] .";" . $reihe2["Email"] . ";" . $reihe2["Telefon"] . ";". $reihe2["Bezeichung"] . ";". $reihe2["Land"] . ";". $reihe2["Bundesland"] . ";". $reihe2["Stadt"] . ";". $reihe2["Stadtteil"] . ";". $reihe2["PLZ"] . ";". $reihe2["Strasse"] . ";". $reihe2["Hausnummer"] . ";" ;
        array_push($valueDatenArray,$value);
    }
    console_log("Query: ".$sqlQuery);
   console_log($valueDatenArray);
   console_log("Fehler? :".mysqli_error($verbindung));


   ?>