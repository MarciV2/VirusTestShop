<?php
$servername = 'localhost';
$dbname = 'testdatenbank';
$username = 'root';
$passwort = '';
$serverdaten = "mysql:host=$servername;dbname=$dbname";

require

try{
$verbindung = new PDO($serverdaten,$username,$passwort);
}
catch(Exception $FehlerPDO){
    print $FehlerPDO->getMessage();
    echo '<script>alert("WaitWaitWaitWhat?")</script>';
}

if(isset ($verbindung))
{
    $verbindung->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $strLoginNutzerJSON = file_get_contents("nutzer.json");
    $arrayLoginNutzerJSON = json_decode($strLoginNutzerJSON, true);
    foreach($arrayLoginNutzerJSON as $key)
    {
        echo $key<br>;
    }
    //$sqlStatement = "SELECT `NutzerName`, `NutzerPasswort` FROM `registriertenutzer` WHERE NutzerName='b4stY' && NutzerPasswort='sfasd2' ";
}

if(true)
{
    echo '<script type="text/javascript">
    alert("Sollte funktioniert haben");
    </script>';
}
else{
    
}
?>