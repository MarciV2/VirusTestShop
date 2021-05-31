<?php

if(!isset($_GET))
{
	console_log("Fehler bei _GET_VARIABLE");
	header('location: ../index.php');
}
console_log($_GET);
#Zum Schutz vor SQL-Injections
#und Vorbereitung der Adressdaten
mysqli_real_escape_string($verbindung,$_GET['altVorname']);
$empfaengerVorname = $_GET['altVorname'];
mysqli_real_escape_string($verbindung,$_GET['altNachname']);
$empfaengerNachname = $_GET['altNachname'];
mysqli_real_escape_string($verbindung,$_GET['altEmail']);
$empfaengerEmail = $_GET['altEmail'];
mysqli_real_escape_string($verbindung,$_GET['altStrasse']);
$lieferStrasse = $_GET['altStrasse'];
mysqli_real_escape_string($verbindung,$_GET['altHausnummer']);
$lieferHausnummer = $_GET['altHausnummer'];
mysqli_real_escape_string($verbindung,$_GET['altPLZ']);
$lieferPlz = $_GET['altPLZ'];
mysqli_real_escape_string($verbindung,$_GET['altStadt']);
$lieferStadt = $_GET['altStadt'];
mysqli_real_escape_string($verbindung,$_GET['altLand']);
$lieferLand = $_GET['altLand'];
mysqli_real_escape_string($verbindung,$_GET['altBundesland']);
$lieferBundesland = $_GET['altBundesland'];


#Überprüfen ob Lieferadress schon in der Datenbank vorhanden ist#
$sqlAdressUeberpruefung = "SELECT `Adresse_ID` FROM `adresse` WHERE (
							`Strasse` = '$lieferStrasse' AND
							`Hausnummer` = '$lieferHausnummer' AND
							`PLZ` = '$lieferPlz' AND
							`Stadt` = '$lieferStadt' AND
							`Bundesland` = '$lieferBundesland' AND
							`Land` = '$lieferLand')";

$adressUeberpruefungErgebnis = mysqli_query($verbindung, $sqlAdressUeberpruefung);
$adressUeberpruefungErgebnisReihen = @mysqli_num_rows($adressUeberpruefungErgebnis);

if($adressUeberpruefungErgebnisReihen > 0) #Adresse gefunden
{
	$adressUeberpruefungErgebnisDaten = mysqli_fetch_assoc($adressUeberpruefungErgebnis);
	$lieferadresseID = $adressUeberpruefungErgebnisDaten["Adresse_ID"];
	console_log("Adresse gefunden?");
}
else if($adressUeberpruefungErgebnisReihen <= 0)
{
	#Neue Adresse Eintragen
	$sqlAdresse =	"INSERT INTO `adresse` (`Strasse`, `Hausnummer`, `PLZ`, `Stadt`, `Bundesland`, `Land`)
					VALUES ('$lieferStrasse', '$lieferHausnummer', '$lieferPlz', '$lieferStadt', '$lieferBundesland', '$lieferLand')";
	console_log($sqlAdresse);
	$sqlAdressCheck = mysqli_query($verbindung, $sqlAdresse);

	if(!$sqlAdressCheck)
	{
		console_log("Fehler beim erstellen der neuen Adresse");
	}
	else 
	{
		$sqlAdressID = "SELECT `Adresse_ID` FROM `adresse` WHERE (
							`Strasse` = '$lieferStrasse' AND
							`Hausnummer` = '$lieferHausnummer' AND
							`PLZ` = '$lieferPlz' AND
							`Stadt` = '$lieferStadt' AND
							`Bundesland` = '$lieferBundesland' AND
							`Land` = '$lieferLand')";
							console_log($sqlAdressID);
		$sqlAdressIDErgebnis = mysqli_query($verbindung, $sqlAdressID);
		$sqlAdressIDErgebnisReihen = @mysqli_num_rows($sqlAdressIDErgebnis);
		$adressIDErgebnis = mysqli_fetch_assoc($sqlAdressIDErgebnis);
		$lieferadresseID = $adressIDErgebnis["Adresse_ID"];	}
}
else
{
	console_log("Fehler beim erstellen der LieferadressID");
}

$sqlEmpfaenger = "SELECT `Empfaenger_ID` FROM `empfaenger` WHERE (
				`Vorname` = '$empfaengerVorname' AND
				`Nachname`= '$empfaengerNachname' AND
				`Email` = '$empfaengerEmail' )";
				console_log($sqlEmpfaenger);
$sqlEmpfaengerErgebnis = mysqli_query($verbindung, $sqlEmpfaenger);
$sqlEmpfaengerErgebnisReihen = @mysqli_num_rows($sqlEmpfaengerErgebnis);
if($sqlEmpfaengerErgebnisReihen > 0) #Empfaenger ist vorhanden
{
	$empfaengerDaten = mysqli_fetch_assoc($sqlEmpfaengerErgebnis);
	$empfaengerID = $empfaengerDaten["Empfaenger_ID"];
}
else #Neuer Empfaenger muss eingetragen werden
{
	$sqlEmpfaenger = "INSERT INTO `empfaenger`(`Vorname`, `Nachname`, `Email`)
						VALUES ('$empfaengerVorname', '$empfaengerNachname', '$empfaengerEmail')";
	$sqlEmpfaengerErgebnis = mysqli_query($verbindung, $sqlEmpfaenger);
	console_log($sqlEmpfaenger);
	if(!$sqlEmpfaengerErgebnis)
	{
		console_log("Fehler beim Eintragen des Empfaengers");
	}
	$sqlEmpfaenger = "SELECT `Empfaenger_ID` FROM `empfaenger` WHERE (  #gerade eingetragene Empfaenger_ID auslesen
				`Vorname` = '$empfaengerVorname' AND
				`Nachname`= '$empfaengerNachname' AND
				`Email` = '$empfaengerEmail' )";
				console_log($sqlEmpfaenger);
	$sqlEmpfaengerErgebnis = mysqli_query($verbindung, $sqlEmpfaenger);
	$sqlEmpfaengerErgebnisReihen = @mysqli_num_rows($sqlEmpfaengerErgebnis);
	$empfaengerDaten = mysqli_fetch_assoc($sqlEmpfaengerErgebnis);
	$empfaengerID = $empfaengerDaten["Empfaenger_ID"];
}
?>