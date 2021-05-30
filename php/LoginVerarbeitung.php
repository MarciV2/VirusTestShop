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
    $loginname = $_POST["LoginName"];
    $cryptLoginname = md5($loginname);
    mysqli_real_escape_string($verbindung, $_POST["LoginPasswort"]);
    $loginpasswort = md5($_POST["LoginPasswort"]);

    $sql = "SELECT `Kundentyp_ID` FROM `kunde` WHERE 
            `LoginName` = '$cryptLoginname' AND
            `Passwort` = '$loginpasswort' 
            LIMIT 1";
    

    $queryErgebnis = mysqli_query($verbindung, $sql);
    $anzahlReihen = @mysqli_num_rows($queryErgebnis);

    $userDaten = mysqli_fetch_assoc($queryErgebnis);
    $kundentypID = $userDaten['Kundentyp_ID'];
    

    $userDatenArray = array();
    array_push($userDatenArray, $loginname);
    array_push($userDatenArray, $loginpasswort);

    if ($anzahlReihen > 0 && $kundentypID == 1)
    {
        $_SESSION['login'] = 1;
		$_SESSION['newLog'] = 2;
        $_SESSION['user'] = $userDatenArray;
       
       
    }
    else if($anzahlReihen > 0 && $kundentypID == 2)
    {
        $_SESSION['login'] = 2;
        $_SESSION['user'] = $userDatenArray;
       
		$_SESSION['newLog'] = 3;
    }
    else 
    {  $_SESSION['newLog'] = 1;
       console_log("Login Schiefgegangen");
       header("location: /index.php");
    }
    

    #User eingeloggt?

    if($_SESSION["login"] == 0)
    {
        $cookie_LoginValue = $_SESSION['login'];
        header('location: /index.php');
        mysqli_close($verbindung);
        exit;
    }
    
}

console_log("Login erfolgreich");
mysqli_close($verbindung);
header('location: /index.php');
?>