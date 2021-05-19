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
    exit; 
     
}

if(isset($_POST))
{
    # Um ANgriffen wie SQL-Injections vorzubeugen müssen die im Loginformular eingegebenen
    # Werte escapen
    mysqli_real_escape_string($verbindung, $_POST["LoginName"]);
    $loginname = md5($_POST["LoginName"]);
    mysqli_real_escape_string($verbindung, $_POST["LoginPasswort"]);
    $loginpasswort = md5($_POST["LoginPasswort"]);

    $sql = "SELECT `Loginname` FROM `kunde` WHERE 
            `Loginname` = '$loginname' AND
            `Passwort` = '$loginpasswort' 
            LIMIT 1";
    console_log($sql);

    $queryErgebnis = mysqli_query($verbindung, $sql);
    $anzahlReihen = @mysqli_num_rows($queryErgebnis);

    console_log($anzahlReihen);

    if ($anzahlReihen > 0)
    {
        $_SESSION['login'] = 1;

        $_SESSION['user'] = "$loginname,$loginpasswort";
       
    }
    else 
        {
            console_log("Login Schiefgegangen");
        }
    

    #User eingeloggt?

    if($_SESSION["login"] == 0)
    {
        $cookiename = $loginname;
        $cookie_LoginValue = $_SESSION['login'];
        header('location: /index.php');
        mysqli_close($verbindung);
        exit;
    }
    
}

echo "Login erfolgreich";
$cookiename = $loginname;
$cookie_LoginValue = $_SESSION['login'];
setcookie($cookiename, $cookie_LoginValue, time() + 86400, "/"); //86400 = 1 Tag
mysqli_close($verbindung);
header('location:/../index.php');
?>