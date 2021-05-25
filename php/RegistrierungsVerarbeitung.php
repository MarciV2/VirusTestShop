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
    exit;                           # Programm beenden
}

console_log($_POST);

if(isset($_POST))
{
    console_log("submit ok --starte--");
    mysqli_real_escape_string($verbindung,$_POST['regloginname']);
    $loginname = md5($_POST['regloginname']);
    mysqli_real_escape_string($verbindung,$_POST['passwort']);
    $passwort = md5($_POST['passwort']);
    mysqli_real_escape_string($verbindung,$_POST['wdhlg-passwort']);
    mysqli_real_escape_string($verbindung,$_POST['vorname']);
    $vorname = $_POST['vorname'];
    mysqli_real_escape_string($verbindung,$_POST['nachname']);
    $nachname = $_POST['nachname'];
    mysqli_real_escape_string($verbindung,$_POST['strasse']);
    $strasse = $_POST['strasse'];
    mysqli_real_escape_string($verbindung,$_POST['hausnummer']);
    $hausnummer = $_POST['hausnummer'];
    mysqli_real_escape_string($verbindung,$_POST['plz']);
    $plz = $_POST['plz'];
    mysqli_real_escape_string($verbindung,$_POST['stadt']);
    $stadt = $_POST['stadt'];
    mysqli_real_escape_string($verbindung,$_POST['stadtteil']);
    $stadtteil = $_POST['stadtteil'];
    mysqli_real_escape_string($verbindung,$_POST['land']);
    $land = $_POST['land'];
    mysqli_real_escape_string($verbindung,$_POST['bundesland']);
    $bundesland = $_POST['bundesland'];
    mysqli_real_escape_string($verbindung,$_POST['email']);
    $email = $_POST['email'];
    mysqli_real_escape_string($verbindung,$_POST['wdhlg-email']);
    mysqli_real_escape_string($verbindung,$_POST['telefon']);
    $telefon = $_POST['telefon'];
    mysqli_real_escape_string($verbindung,$_POST['firmenkunde']);
    $firmenkunde = $_POST['firmenkunde'];
    


    $sqlUsernameCheck = "SELECT `Loginname` FROM `kunde` WHERE `Loginname` = '$loginname'";
    $sqlUserCheckErgebnis = mysqli_query($verbindung, $sqlUsernameCheck);
    $sqlUserCheckReihen = @mysqli_num_rows($sqlUserCheckErgebnis);
    console_log($sqlUsernameCheck);
    console_log($sqlUserCheckErgebnis);



    if($sqlUserCheckReihen > 0)
    {
        echo '<script type="text/javascript" src="/scripts/scripts.js">abortRegister()</scripts>';
        console_log("Username schon vergeben Bitte nutzen Sie einen anderen Username.");
        $_SESSION['login'] = 0;
        exit;
    }

    #Select query für die Adress Id vorbereiten
    $sqlSelectAdressID = "SELECT `Adresse_ID` FROM `adresse` WHERE (
                            `Straße` = '$strasse' AND 
                            `PLZ` = '$plz' AND
                            `Stadt` = '$stadt' AND
                            `Stadtteil` = '$stadtteil' AND
                            `Bundesland` = '$bundesland' AND
                            `Land` = '$land' )
                            ";

    #überprüfen ob die Adresse schon vorhanden ist
    $adressIDergebnis = mysqli_query($verbindung, $sqlSelectAdressID);
    $adressIDergebnisCheck = @mysqli_num_rows($adressIDergebnis);
    #wenn die query kein ergebnis zurück liefert die neue Adrese pushen
    if($adressIDergebnisCheck < 1)
    {
        $sqlAdresse = "INSERT INTO `adresse`(`Straße`, `PLZ`, `Stadt`, `Stadtteil`, `Bundesland`, `Land`)
                        VALUES ('$strasse','$plz','$stadt','$stadtteil','$bundesland','$land')";
        console_log($sqlAdresse);
        $adressIDInsertErgebnis = mysqli_query($verbindung, $sqlAdresse);
        #neue Adress ID abholen
        console_log($sqlSelectAdressID);
        $adressIDergebnis = mysqli_query($verbindung, $sqlSelectAdressID);
        console_log($adressIDergebnis);
    }
    #adresse ist schon vorhanden oder nun vorhanden,also AdressId filtern
    $adressIDergebnisDaten = mysqli_fetch_assoc($adressIDergebnis);
    $adressID = $adressIDergebnisDaten["Adresse_ID"];
    console_log($adressID); 
        
    
    

    $sqlKunde = "INSERT INTO `kunde`(`Name`, `Vorname`, `Telefon`, `Email`, `Adresse_ID`, `Kundentyp_ID`, `Passwort`, `Loginname`)
                    VALUES ('$vorname','$nachname','$telefon','$email','$adressID','$firmenkunde','$passwort', '$loginname')";

    console_log($sqlKunde);

    $sqlKundeErgebnis = mysqli_query($verbindung, $sqlKunde);
    console_log($sqlKundeErgebnis);    
    
    # User korrekt in der Datenbank eingetragen?

    $sqlUserCheck = "SELECT `Loginname` FROM `kunde` WHERE `Loginname` = '$loginname'
                LIMIT 1";

    console_log($sqlUserCheck);
   
    $sqlUserCheckErgebnis = mysqli_query($verbindung, $sqlUserCheck);
    console_log($sqlUserCheckErgebnis);
    $anzahlReihen = @mysqli_num_rows($sqlUserCheckErgebnis);

    if($anzahlReihen > 0)
    {
        console_log("Registrierung und anschliessender Login erfolgreich.");
         $_SESSION["login"] = 1;

         $_SESSION["user"] = "$loginname,$passwort";

         console_log($_SESSION);
         #Loginzeitpunkt abspeichern?
    }
    else
    {
        console_log("Fehler bei der Registrierung");
    }

    if(!isset($_SESSION["login"]))
    {
        
        mysqli_close($verbindung);
        console_log("Fehler bei der Session");
        exit;
    }
    else
    {
    console_log("Registrierung und Anmeldung erfolgreich.");
    mysqli_close($verbindung);
    header('location: /index.php');    
    exit;
    }    
}


console_log("php durchgelaufen");
mysqli_close($verbindung);

?>
 