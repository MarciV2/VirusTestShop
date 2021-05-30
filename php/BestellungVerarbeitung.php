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

$cookieCart = "cart_cookie";
if(!isset($_COOKIE[$cookieCart]))
{
    console_log("kein Warenkorb vorhanden");
    mysqli_close($verbindung);
    exit;
    
}
else
{
    $warenkorbInhalt = json_decode($_COOKIE[$cookieCart], true);
}



# Bestellungstabelle 
# Bestellung_ID	Bestelldatum	Versanddatum	Lieferkosten	Kunde_ID	Bezahlmethode_ID	Rechnungsadresse_ID	Lieferdresse_ID	Bestellstatus_ID	
# Bestellungsposition
# Bestellungsposition_ID	Preis	Anzahl	Bestellpositionsnummer	Bestellung_ID	Packung_ID

#UserID abfragen über die SESSID Info

$loginname = $_SESSION["user"][0];
console_log($loginname);

$sqlUser = "SELECT `Kunde_ID` , `Name`, `Vorname`, `Email`  FROM `kunde` WHERE `LoginName` = '$loginname'";
console_log($sqlUser);
$sqlUserErgebnis = mysqli_query($verbindung, $sqlUser);
$userCheck = @mysqli_num_rows($sqlUserErgebnis);
if($userCheck > 0)
{
    $userIDErgebnisDaten = mysqli_fetch_assoc($sqlUserErgebnis);
    $userID = $userIDErgebnisDaten["Kunde_ID"];
}

#Vorbereitungen für die Tabelle Bestellung 
#wichtige zuvor klärende Referenzen
#Ist die Form ausgefüllt?
if (!isset($_POST))
{
    
    console_log("Fehler bei der Übertragung des Formulars");
    mysqli_close($verbindung);
    header("location: /index.php");
}
else
{
    #Alternative Adresse angegeben?
    if(isset($_POST["useAlternativeAdresse"]))
    {
        $alternativeAdresse = true;
        #Zum Schutz vor SQL-Injections
        #und Vorbereitung der Adressdaten
        mysqli_real_escape_string($verbindung,$_POST['altVorname']);
        $vorname = $_POST['altVorname'];
        mysqli_real_escape_string($verbindung,$_POST['altNachname']);
        $nachname = $_POST['altNachname'];
        mysqli_real_escape_string($verbindung,$_POST['altEmail']);
        $email = $_POST['altEmail'];
        mysqli_real_escape_string($verbindung,$_POST['altStrasse']);
        $strasse = $_POST['altStrasse'];
        mysqli_real_escape_string($verbindung,$_POST['altPLZ']);
        $plz = $_POST['altPLZ'];
        mysqli_real_escape_string($verbindung,$_POST['altStadt']);
        $stadt = $_POST['altStadt'];
        mysqli_real_escape_string($verbindung,$_POST['altLand']);
        $land = $_POST['altLand'];
        mysqli_real_escape_string($verbindung,$_POST['altBundesland']);
        $bundesland = $_POST['altBundesland'];
    }
    #keine alternative Adresse
    #Vorbereitung der gespeicherten Lieferdaten
    else
    {
        $alternativeAdresse = false;
        $sqlLieferadresseID = "SELECT `Adresse_ID` FROM `kunde` WHERE `Kunde_ID` = '$userID'";
        $sqlLieferadresseIDErgebnis = mysqli_query($verbindung, $sqlLieferadresseID);
        $lieferadresseIDCheck = @mysqli_num_rows($sqlLieferadresseIDErgebnis);

        if($lieferadresseIDCheck > 0)
        {
            $lierferadresseIDErgebnisDaten = mysqli_fetch_assoc($sqlLieferadresseIDErgebnis);
            $lieferadresseID = $lierferadresseIDErgebnisDaten['Adresse_ID']; 
        }
        $sqlAdressdaten =  "SELECT * FROM `adresse` WHERE `Adresse_ID` = '$lieferadresseID'";
        $sqlAdressErgebnis = mysqli_query($verbindung, $sqlAdressdaten);
        $adressErgebnisCheck = @mysqli_num_rows($sqlAdressErgebnis);
        if($adressErgebnisCheck > 0)
        {
            $adressDaten = mysqli_fetch_assoc($sqlAdressErgebnis);
            console_log($adressDaten);

            $vorname = $userIDErgebnisDaten['Vorname'];            
            $nachname = $userIDErgebnisDaten['Name'];            
            $email = $userIDErgebnisDaten['Email'];            
            $strasse = $adressDaten['Strasse'];            
            $plz = $adressDaten['PLZ'];            
            $stadt = $adressDaten['Stadt'];            
            $land = $adressDaten['Land'];            
            $bundesland = $adressDaten['Bundesland'];
        }
    }
    #Adresse ist vorbereitet
}

    #Bezahlmethode_ID  vorbereiten 
$cookiePayMethod = "pay";
if(!isset($_COOKIE[$cookiePayMethod]))
{
    mysqli_close($verbindung);
    console_log("Fehler beim Lesen der Bezahlmethode_ID");
    exit;        
}
else
{
    $bezahlmethode = $_COOKIE[$cookiePayMethod];
    console_log($bezahlmethode);
}
    #Bestellstatus_ID
    $bestellstatus = 1;
    #Bestelldatum
    $bestellDatum = "now()";

    #Preis ermitteln
    $warenkorbLaenge = 0;
    foreach($warenkorbInhalt as $value)
    {


        $warenkorbLaenge ++;
    }

    

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
    $i = 0; #zaehlvariable
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
    
    console_log($anzahlProdukte);
    console_log($packungsAnzahlArray);
    console_log($packungsIDArray);
    $i = 0;

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
            exit;
            header("location: ../index.php");
        }
        $preis = mysqli_fetch_assoc($sqlPreisErgebnis);
       array_push($preise, $preis["Verkaufspreis"]*$packungsAnzahlArray[$i]);
       $i++;
    }
    console_log($preise);
      
    #Bestellung einpflegen
    $sqlBestellung = "INSERT INTO `bestellung`
                       (`Bestelldatum`, `Lieferkosten`, `Kunde_ID`, `Bezahlmethode_ID`, `Rechnungsadresse_ID`, `Lieferdresse_ID`, `Bestellstatus_ID`)
                        VALUES ($bestellDatum, 5.00, '$userID' , '$bezahlmethode', '$lieferadresseID' , '$lieferadresseID' , '$bestellstatus' )";
    
    $sqlBestellungErgebnis = mysqli_query($verbindung, $sqlBestellung);
    
    if(!$sqlBestellungErgebnis)
    {
        console_log("Fehler bei der Query");
        
        exit;
        header("location: ../index.php");
    }

    console_log("Query durchgelaufen");

    #BestellungID der gerade gepushten Bestellung für die Bestellpostionen

    $sqlBestellungID = "SELECT `Bestellung_ID` FROM `bestellung`
                        WHERE `Bestelldatum` = (SELECT MAX(`Bestelldatum`) FROM `bestellung` WHERE `Kunde_ID`= '$userID')";

    console_log($sqlBestellungID);     
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
    console_log($bestellungID);

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
            exit;
            header("location: ../index.php");
        }
        $i++;
    }

    console_log("Bestellung und Bestellungspositionen sind korrekt eingetragen");
    $_SESSION["bestellung"] = 1;
    header("location: ../index.php");
?>