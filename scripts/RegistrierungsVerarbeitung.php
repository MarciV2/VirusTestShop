<?php
$servername = 'localhost';
$dbname = 'vts';
$dbusername = 'root';
$dbpasswort = '';
$serverdaten = "mysql:host=$servername;dbname=$dbname";
SESSION_START();

# Datenbankverbindung herstellen
$verbindung = mysqli_connect($servername, $dbusername, $dbpasswort);

# Verbindung hergestellt?
if(!$verbindung)
{
    die("Keine Verbindung hergestellt: ". mysqli_error($mysqlError));
}

#konkrete Datenbank auf dem dem Server auswählen
$datenbank = mysqli_select_db($verbindung, $dbname);


if(!$datenbank)
{
    echo "Kann die Datenbank nicht verwenden" . mysqli_error($mysqlError);
    mysqli_close($verbindung);      # Verbindung schliessen bei vorangegagenem Zugriffsfehler
    exit;                           # Programm beenden
}


if(!empty($_POST["submit"]))
{
    mysqli_real_escape_string($verbindung,$_POST['loginname']);
    $loginname = $_POST['loginname'];
    mysqli_real_escape_string($verbindung,$_POST['passwort']);
    $passwort = md5($_POST['passwort']);
    mysqli_real_escape_string($verbindung,$_POST['wdhlg-passwort']);
    mysqli_real_escape_string($verbindung,$_POST['vorname']);
    $vorname = $_POST['vorname'];
    mysqli_real_escape_string($verbindung,$_POST['nachname']);
    $vorname = $_POST['nachname'];
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
    


    $sqlUsernameCheck = "SELECT FROM 'kunde' WHERE 'Kunde_ID' = $loginname";
    $sqlUserCheckErgebnis = mysqli_query($verbindung, $sqlUsernameCheck);
    $sqlUserCheckReihen = @mysqli_num_rows($sqlUserCheckErgebnis);

    if($sqlUserCheckReihen > 0)
    {
        echo "Username schon vergeben Bitte nutzen Sie einen anderen Username.<br>";
        exit;
    }

    $adressID = $loginname + $strasse;    
   

    $sqlAdresse = "INSERT INTO `adresse`(`Adresse_ID`, `Straße`, `PLZ`, `Stadt`, `Stadtteil`, `Bundesland`, `Land`)
                    VALUES ('{'$adressID','$strasse','$plz','$stadt','$stadtteuk','$bundesland','$land')";

    $sqlKunde = "INSERT INTO `kunde`(`Kunde_ID`, `Name`, `Vorname`, `Telefon`, `Email`, `Adresse_ID`, `Kundentyp_ID`, `Passwort`)
                    VALUES ('$loginname','$vorname','$nachname','$telefon','$email','$adressID','$firmenkunde','$passwort')";

    $sqlErgbenisPush = mysqli_query($verbindung, $sqlAdresse);
    
    # User korrekt in der Datenbank eingetragen?

    $sqlCheck = "SELECT FROM 'kunde' WHERE 'Kunde_ID'='$loginname' AND 'Passwort'='$passwort'
                LIMIT 1";
    $sqlCheckErgebnis = mysqli_query($verbindung, $sqlCheck);
    $anzahlReihen = @mysqli_num_rows($sqlCheckErgebnis);

    if($anzahlReihen > 0)
    {
        echo "Registrierung und anschliessender Login erfolgreich.<br>";
         $_SESSION["login"] = 1;

         $_SESSION["user"] = mysqli_fetch_array($sqlCheckErgebnis, MYSQLI_ASSOC);

         #Loginzeitpunkt abspeichern?
    }
    else
    {
        echo "Fehler bei der Registrierung";
    }

    if($_SESSION["Login"] == 0)
    {
        include("index.html");
        mysqli_close($verbindung);
        exit;
    }

    echo "Registrierung und Anmeldung erfolgreich.";
    
    mysqli_close($verbindung);      
}
?>
 
