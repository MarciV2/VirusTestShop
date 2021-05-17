<?php
$servername = 'localhost';
$dbname = 'vts';
$dbusername = 'root';
$dbpasswort = '';
$serverdaten = "mysql:host=$servername;dbname=$dbname";
SESSION_START();

error_reporting(E_ALL);
# Datenbankverbindung herstellen
$verbindung = mysqli_connect($servername, $dbusername, $passwort);

# Verbindung hergestellt?
if(!$verbindung)
{
    die("Keine Verbindung hergestellt: ". mysqli_error($mysqlError));
}

$datenbank = mysqli_select_db($verbindung, $dbname);

if(!$datenbank)
{
    echo "Kann die Datenbank nicht verwenden" . mysqli_error($mysqlError);
    mysqli_close($verbindung);      # Verbindung schliessen bei vorangegagenem Zugriffsfehler
    include("datenbankverbindungfehler.php");                           # Programm beenden
}

if(!empty($_POST["submit"]))
{
    # Um ANgriffen wie SQL-Injections vorzubeugen müssen die im Loginformular eingegebenen
    # Werte escapen
    $loginname = mysqli_real_escape_string($verbindung, $_POST["LoginName"]);
    $loginpasswort = mysqli_real_escape_string($verbindung, $_POST["LoginPasswort"]);

    $sql = "SELECT * FROM kunde WHERE 
            Kunde_ID ='$loginname' AND
            Passwort ='$loginpasswort' 
            LIMIT 1";

    $queryErgebnis = mysqli_query($verbindung, $sql);
    $anzahlReihen = @mysqli_num_rows($queryErgebnis);

    if ($anzahlReihen > 0)
    {
        $_SESSION["login"] = 1;

        $_SESSION["user"] = mysqli_fetch_array($queryErgebnis, MYSQLI_ASSOC);
    }
        #letzter LOGIN setzem`??
        else 
        {
            echo "Logindaten sind inkorrekt. <br>";
        }
    

    #User eingeloggt?

    if($_SESSION["login"] == 0)
    {
        includ("index.html");
        mysqli_close($verbindung);
        exit;
    }
    
}

echo "Login erfolgreich";

mysqli_close($verbindung);
?>