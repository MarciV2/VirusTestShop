<?php

#Vorbereitungen für die Tabelle Bestellung
# Bestellungstabelle 
# Bestellung_ID(AI)	 Bestelldatum-	 Versanddatum-	 Lieferkosten-5
# Kunde_ID-	 Bezahlmethode_ID-	 Rechnungsadresse_ID-	Lieferdresse_ID-	Bestellstatus_ID-

#LoginName abfragen über die SESSID Info
$loginname = $_SESSION["user"][0];
console_log($loginname);
$cryptLoginname = md5($loginname);
#Kunde_auslesen
$sqlKunde = "SELECT `Kunde_ID` , `Name`, `Vorname`, `Email`  FROM `kunde` WHERE `LoginName` = '$cryptLoginname'";
$sqlKundeErgebnis = mysqli_query($verbindung, $sqlKunde);
$kundeCheck = @mysqli_num_rows($sqlKundeErgebnis);
#Der Fehler, dass der Kunde nicht in der Datenbank vorhanden ist kann nicht vorkommen.

#Daten aus der $sqlKundeErgebnis auslesen
$kundeIDErgebnisDaten = mysqli_fetch_assoc($sqlKundeErgebnis);
$kundeID = $kundeIDErgebnisDaten["Kunde_ID"];

#Bezahlmethode vorbereiten
$cookiePayMethod = "pay";
$bezahlmethodeID = $_COOKIE[$cookiePayMethod];
setcookie($cookiePayMethod, '', time()-1);

#Bestelldatum als Befehl für die Datenbank das jetzige Datum einzutragen
$bestellDatum = "now()";

#Bestellstatu ist 1 = bestellt
$bestellStatusID = 1;

# gespeicherte Rechnungsadresse auslesen
$sqlRechnungsadresseID = "SELECT `Adresse_ID` FROM `kunde` WHERE `Kunde_ID` = '$kundeID'";
#Rechnungsadresse bereitstellen
$sqlRechnungsadresseIDErgebnis = mysqli_query($verbindung, $sqlRechnungsadresseID);
$rechnungsadresseIDCheck = @mysqli_num_rows($sqlRechnungsadresseIDErgebnis);
if($rechnungsadresseIDCheck > 0)
{
	$rechnungsadresseIDErgebnisDaten = mysqli_fetch_assoc($sqlRechnungsadresseIDErgebnis);
	$rechnungsadresseID = $rechnungsadresseIDErgebnisDaten['Adresse_ID']; 
}
#Lieferadresse bestimmen
$cookieAltLiefer = "altAdresse";
if(!isset($_COOKIE[$cookieAltLiefer]))
{
    $lieferadresseID = $rechnungsadresseID;
    $empfaengerID = 0;
}
else
{
    setcookie($cookieAltLiefer,'',time()-1);
	include_once './BestellungAlternativeAdresse.php';
}


$lieferKosten = 5.00;



#Bestellung eintragen
#Bestellung einpflegen
$sqlBestellung = "INSERT INTO `bestellung`
                    (`Bestelldatum`, `Lieferkosten`, `Kunde_ID`, `Bezahlmethode_ID`, `Rechnungsadresse_ID`, `Lieferdresse_ID`, `Bestellstatus_ID`, `Empfaenger_ID`)
                    VALUES ($bestellDatum, $lieferKosten, '$kundeID' , '$bezahlmethodeID', '$rechnungsadresseID' , '$lieferadresseID' , '$bestellStatusID', '$empfaengerID' )";
$sqlBestellungErgebnis = mysqli_query($verbindung, $sqlBestellung);
if(!$sqlBestellungErgebnis)
{
    console_log("Fehler bei der Query:");
    console_log($sqlBestellung);
    header("location: ../index.php");
}


#BestellungID der gerade gepushten Bestellung für die Bestellpostionen auslesen
$sqlBestellungID = "SELECT `Bestellung_ID` FROM `bestellung`
                    WHERE `Bestelldatum` = (SELECT MAX(`Bestelldatum`) FROM `bestellung` WHERE `Kunde_ID`= '$kundeID')";
$sqlBestellungIDErgebnis = mysqli_query($verbindung, $sqlBestellungID);
$sqlBestellungIDErgebnisReihe = @mysqli_num_rows($sqlBestellungIDErgebnis);
if($sqlBestellungIDErgebnisReihe < 1)
{
    console_log("Fehler bei Select letzte Bestellung");
    mysqli_close($verbindung);
    exit;
    header("location: ../index.php");
}
$bestellungIDErgebnis = mysqli_fetch_assoc($sqlBestellungIDErgebnis);
$bestellungID = $bestellungIDErgebnis["Bestellung_ID"];
console_log("Bestellung ID:".$bestellungID);

?>