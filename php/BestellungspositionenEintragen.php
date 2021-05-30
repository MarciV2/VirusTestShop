<?php
#Warenkorbinhalt bereitstellen

$cookieCart = "cart_cookie";
if(!isset($_COOKIE[$cookieCart]))
{
    console_log("kein Warenkorb vorhanden");
    mysqli_close($verbindung);
    header('location: ../index.php');
}
else
{
    $warenkorbInhalt = json_decode($_COOKIE[$cookieCart], true);
    setcookie($cookieCart,'',time()-1);
}

### Preise bestimmen ###

$warenkorbLaenge = 0;
foreach($warenkorbInhalt as $value)
{
    $warenkorbLaenge ++;
}
unset($value);


$sqlAnzahlProdukte = 'SELECT count(*) AS `Anzahl` FROM `packung`';
$anzahlProdukteErgebnis = mysqli_query($verbindung, $sqlAnzahlProdukte);
$anzahlProdukteReihen = @mysqli_num_rows($anzahlProdukteErgebnis);

if($anzahlProdukteReihen < 0)
{
    mysqli_close($verbindung);
    console_log("Fehler bei der Bestimmung der vorhandenen Produkte");
    header("location: ../index.php");
}
$anzahlProdukteSQL = mysqli_fetch_assoc($anzahlProdukteErgebnis);   
$anzahlProdukte = $anzahlProdukteSQL["Anzahl"];

$packungsAnzahlArray = array();
$packungsIDArray = array();
$i=0; #zaehlvarable
$obergrenzeVerschPackungen = 0; #Ergibgt nach der While Schleife die obergrenze für die Anzahl an verschiedenen Packungen im Warenkorb.
while($i <= $anzahlProdukte)
{
    if(isset($warenkorbInhalt[$i]))
    {
        $packungsAnzahlArray[$obergrenzeVerschPackungen] = $warenkorbInhalt[$i];   #Gleichstellung der Array Indizes
        $packungsIDArray[$obergrenzeVerschPackungen] = $i;                         #für die PackungsID und die Anzahl
        $obergrenzeVerschPackungen++;
    }
    $i++; 
}
$i=0;

#ArtikelPreise auslesen
$preise = array();
while($i < $obergrenzeVerschPackungen)
{
    $sqlPreis = "SELECT `Verkaufspreis` FROM `packung` WHERE `Packung_ID` = '$packungsIDArray[$i]'";
    $sqlPreisErgebnis = mysqli_query($verbindung, $sqlPreis);
    console_log("sqlPreis: " . $sqlPreis);
    $sqlPreisErgebnisReihe = @mysqli_num_rows($sqlPreisErgebnis);
    if($sqlPreisErgebnisReihe < 0)
    {
        console_log("Probleme bei der Bestimmung des Preises eines Produkts");
        header("location: ../index.php");
    }
    $preis = mysqli_fetch_assoc($sqlPreisErgebnis);
    array_push($preise, $preis["Verkaufspreis"]*$packungsAnzahlArray[$i]);
    $i++;
}

#Bestellpositionen eintragen
#Bestellpositionsnummer array erstellen
$i = 0;
while($i < $obergrenzeVerschPackungen)
{
    $bestellpositionsnummer = $i+1;
    $sqlBestellungsposition = "INSERT INTO `bestellungsposition`(`Preis`, `Anzahl`, `Bestellpositionsnummer`, `Bestellung_ID`, `Packung_ID`)
                        VALUES ('$preise[$i]', '$packungsAnzahlArray[$i]', '$bestellpositionsnummer', '$bestellungID', '$packungsIDArray[$i]')";
    console_log($sqlBestellungsposition);
    $sqlBestellungspositionErgebnis = mysqli_query($verbindung, $sqlBestellungsposition);
        
    if(!$sqlBestellungspositionErgebnis)
    {
        console_log("Fehler beim Insert der Bestellungspositionen");
        mysqli_close($verbindung);
        header("location: ../index.php");
    }
    $i++;
}
?>