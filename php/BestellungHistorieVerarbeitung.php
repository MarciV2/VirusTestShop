<?php

$servername = 'localhost';
$dbusername = 'root';
$dbpasswort = '';
$dbname = 'vts';
$serverdaten = "mysql:host=$servername;dbname=$dbname";


function console_log( $data ){
    echo '<script>';
    echo 'console.log('.json_encode($data).')';
    echo '</script><br>';
}

# Datenbankverbindung herstellen
$verbindung = mysqli_connect($servername, $dbusername, $dbpasswort, $dbname);

# Verbindung hergestellt?
if(!$verbindung)
{
    console_log("Error Verbindung");
} else {
    console_log("Verbindung  erfolgreich");
}
