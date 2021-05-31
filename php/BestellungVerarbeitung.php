<?php
#Vorbereitung Serverdaten
$servername = 'localhost';
$dbname = 'vts';
$dbusername = 'root';
$dbpasswort = '';
$serverdaten = "mysql:host=$servername;dbname=$dbname";

SESSION_START();

#Fehlermeldung in der Konsole
function console_log( $data ){
    echo '<script>';
    echo 'console.log('.json_encode($data).')';
    echo '</script><br>';
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
    echo "Kann die Datenbank nicht verwenden" . mysqli_error($mysqlError);
    mysqli_close($verbindung);      # Verbindung schliessen bei vorangegagenem Zugriffsfehler
    header('location: ../index.php');      
}

include_once './BestellungEintragen.php';
include_once './BestellungspositionenEintragen.php';

mysqli_close($verbindung);
console_log("Bestellung und Bestellungspositionen sind korrekt eingetragen");
$_SESSION["bestellung"] = 1;

header("location: ../index.php");

?>