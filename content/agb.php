<?php SESSION_START();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Corona Shop</title>
    <!-- MDB icon -->
    <link rel="icon" href="../img/logo.png" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="../css/mdb.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../src/simple-notify/simple-notify.min.css" />
</head>
<!--Register Form begin -->
<div class="RegisterForm" id="RegisterForm" onmouseout="">
    <form action="/php/RegistrierungsVerarbeitung.php" method="POST">
        <div class="regForm" id="regForm">
            <center><h><b>Registrierung</b></h></center>
            <div class="registrierung" id="registrierung"> 
            <center>
            <table>
              
                <tr>
                  <td><input class="big" type="text" placeholder="Login-Name" name="regloginname" id="RegLoginname" required /></td>
                </tr>
                <tr>
                  <td><input class="big" type="password" placeholder="Passwort" name="passwort" id="passwort" minlength="8" required /><br></td>
                  <td><input class="big" type="password" placeholder="Passwort wiederholen" name="wdhlg-passwort" id="wdhlg-passwort" minlength="8" onchange="pwprüfen()" required /></td>
                </tr>
                <tr>
                  <td><input class="big" type="text" placeholder="Vorname" name="vorname" required></td>
                  <td><input class="big" type="text" placeholder="Nachname" name="nachname" required></td>
                </tr>
                <tr>
                  <td><input class="big" type="text" placeholder="Straße" name="strasse" required></td>
                  <td><input class="hausnummer" type="text" name="hausnummer" placeholder="Nr."  required> <input type="number" placeholder="PLZ" name="plz" min="1000" max="99999" required></td>
                </tr>
                <tr>
                  <td><input class="big" type="text" placeholder="Stadt" name="stadt" required></td>
                  <td><input class="big" type="text" placeholder="Stadtteil" name="stadtteil" required></td>
                </tr>
                <tr>
                  <td><input class="big" type="text" placeholder="Land" name="land" required></td>
                  <td><input class="big" type="text" placeholder="Bundesland" name="bundesland" required></td>
                </tr>
                <tr>
                  <td><input class="big" type="email" placeholder="E-Mail" name="email" id="email" required></td>
                  <td><input class="big" type="email" placeholder="E-Mail wiederholen" name="wdhlg-email" id="wdhlg-email" onchange="emailchecken()" required></td>
                </tr>
                <tr>
                  <td><input class="big" type="number" placeholder="Telefon: Vorwahl + Nummer" name="telefon" required></td>
                  <td><label>Firmenkunde: </label><select name="firmenkunde"><option value="1">Nein</option><option value="2">Ja</option></select></td>
                </tr>
            </table>
            
            <br>
            <label class="agb" id="AGB" onmouseover="hoverAGBs('grey')" onmouseout="hoverAGBs('black')" onclick="clickAGBs()">Akzeptieren Sie unsere AGBs</label><input type ="checkbox" name="agb" required><br>
            <input type="submit" name="submitReg" value="Abschicken" >
            <br>
            </center>
            </div>
        </div>
    </form>
</div>
<!--Register Form Ende -->
<!-- Begin LoginForm -->
<div class="LandingLogin" id="LandingLogin">
            <form action="../php/LoginVerarbeitung.php" method="POST">
                <label id="Loginname" class="LabelLogin">Login:</label><center><input type="text" placeholder="Login" name="LoginName" id="LogLoginname" required></center>
                <label id="LoginPasswort" class="LabelLogin">Passwort:</label><center><input type="password" placeholder="Passwort" name="LoginPasswort" id="LoginPasswort" minlength="8" required></center>
                <label class="LabelChkbox" for id="LoginCheckbox">Anmeldedaten merken</label><input class="chkbox" type="checkbox" name="LoginCheckbox" id="LoginCheckbox">
		<input type="submit" class="login" id="login" value=Login>
                <a class="cancel"  id="cancel" onclick="einAusblendenLoginRegForm()">Cancel</a>
                
                <label onclick="nichtRegistriertHandler()" class="NotRegistered">Noch keinen Account?</label>
            </form>
        </div>
<body>
    <div class="windowedPage">
        <!-- Start your project here-->
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top windowedPageNavbar">
            <div class="container-fluid">
                <button class="navbar-toggler"
                        type="button"
                        data-mdb-toggle="collapse"
                        data-mdb-target="#navbarExample01"
                        aria-controls="navbarExample01"
                        aria-expanded="false"
                        aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarExample01" margin="200px">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" aria-current="page" href="../index.php" style="color: white">Startseite</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./produktangebot.php" style="color: white">Produktangebot</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./termine.php" style="color: white">Schulungstermine</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle"
                               style="color: white"
                               href="#"
                               id="navbarDropdownMenuLink"
                               role="button"
                               data-mdb-toggle="dropdown"
                               aria-expanded="false">
                                Anleitungen
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="https://www.stuttgarter-nachrichten.de/inhalt.corona-schnelltest-anleitung-mhsd.1c6201bd-dc78-4b03-b7d8-cf7d324b9b77.html">Corona Schnelltest</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./produktangebot.php?orderBy=Preis%20ASC&kategorie=Schulungen">Corona PCR-Test</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.bundesregierung.de/breg-de/themen/coronavirus" style="color: white">Über Corona</a>
                        </li>
                    </ul>
                </div>

                <!-- Right elements -->
                <div class="d-flex align-items-center">
                    <!-- Shopping icon -->
                    <a class="text-reset me-4" href="./warenkorb.php">
                        <i class="fas fa-shopping-cart" style="color: #ffffff"></i>
                        <span id="product_counter" class="badge rounded-pill badge-notification bg-danger" style="display: none">11</span>
                    </a>
                    <!-- Account icon -->
                    <?php
			//Prüfen ob Session Variable gesetzt ist falls nicht soll diese 0 sein
				if(!isset($_SESSION['login']))
				{
					$_SESSION['login']=0;
				}
			//Sessionvariable an PHP Variable übergeben um später in js darauf zugreifen zu können
                        $variablephp = $_SESSION['login'];
						
                    ?>
                                   <!-- Script bestimmt ob Menü mit logout/profil/bestellungen oder login prompt dargestellt wird -->
                    <script>
						//Umwandeln der PHP variable in js variable
                        var variablejs = "<?php echo $variablephp; ?>";
                        variablejs = parseInt(variablejs);
                        if(variablejs > 0){
							//logout/profil/bestellungen Darstellung
                            var account_icon = '<a class="text-reset me-3" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">';
                            account_icon = account_icon + '<i class="fas fa-user-circle" style="color: #ffffff"></i>';
                            account_icon = account_icon + '</a>';
                            account_icon = account_icon + '<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">';
                            account_icon = account_icon + '<li><a class="dropdown-item" href="./content/profil.php">Profil</a></li>';
                            account_icon = account_icon + '<li><a class="dropdown-item" href="./content/bestellungen.php">Bestellungen</a></li>';
                            account_icon = account_icon + '<li><hr class="dropdown-divider" /></li>';
                            account_icon = account_icon + '<li><a class="dropdown-item" href="#" onclick="logout()">Logout</a></li>';
                            account_icon = account_icon + '</ul>';
                            document.write(account_icon);
                        } else {
							//Login prompt Aufruf
                            var account_icon = '<a onclick="einAusblendenLoginRegForm()" class="text-reset me-3">';
                            account_icon = account_icon + '<i class="fas fa-user-circle" id="LoginButton"  style="color: #ffffff"></i>';
                            account_icon = account_icon + '</a>';
                            document.write(account_icon);
                        }
                    </script>
                </div>
                <!-- Right elements -->
            </div>
        </nav>
        <!-- Navbar -->
        <!-- Background image -->
        <div class="p-5 text-center bg-image" style="background-image: url('../img/corona.jpg'); height: 350px">
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.4);">
                <div class="d-flex justify-content-center align-items-center h-100">
                </div>
            </div>
        </div>
        <!-- Background image -->
	<!-- AGB Text-->
        <div class="agb" style="margin-left:50px;margin-right:50px;">
            <p><h1>Allgemeinene Verkaufsbedingungen</h1></p>
            <p><strong>Geltungsbereich</strong></p>
            <p>Diese Gesch&auml;ftsbedingungen gelten f&uuml;r alle K&auml;ufe bei Virustestshop <a href="impressum.php">Impressum</a>, die von Privatkunden get&auml;tigt werden.</p>
            <p>Privatkunden in diesem Sinne sind Personen mit Wohnsitz und Lieferadresse in der Bundesrepublik Deutschland, soweit die von ihnen bestellten Waren weder ihrer gewerblichen noch ihrer selbstst&auml;ndigen beruflichen T&auml;tigkeit zugerechnet werden k&ouml;nnen.</p>
            <p><strong>&nbsp;</strong></p>
            <p><strong>Vertragsabschluss </strong></p>
            <p>Die Pr&auml;sentation unserer Waren und der Einr&auml;umung der M&ouml;glichkeit zur Bestellung stellt unsererseits ein konkretes Angebot zum Abschluss eines Kaufvertrages dar.</p>
            <p>Durch Ihre Bestellung nehmen Sie das Angebot an und der Kaufvertrag ist zustande gekommen.</p>
            <p>Hier&uuml;ber erhalten Sie eine Bestellbest&auml;tigung per E-Mail an die von Ihnen angegebene E-Mail-Adresse.</p>
            <p>&nbsp;</p>
            <p><strong>Preise und Versandkosten</strong></p>
            <p>Die ausgezeichneten Preise sind Endpreise inkl. Umsatzsteuer. Es gilt der Betrag, der jeweils zum Zeitpunkt der verbindlichen Bestellung ausgewiesen ist. Hinzu kommen Versandkosten, die von der Versandart und der Gr&ouml;&szlig;e und dem Gewicht der von Ihnen bestellten Ware(n) abh&auml;ngig sind. Die regelm&auml;&szlig;igen Kosten der R&uuml;cksendung, die im Falle einer R&uuml;ckgabe der Ware durch Sie in Aus&uuml;bung Ihres Widerrufsrechts entstehen, tragen wir. Bei Aus&uuml;bung Ihres Widerrufsrechts erstatten wir Ihnen auch die Versandkosten zur&uuml;ck.</p>
            <p>&nbsp;</p>
            <p><strong>Zahlung</strong></p>
            <p>Die Bezahlung erfolgt bei Lieferung mittels</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Rechnung</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - PayPal</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Klarna</p>
            <p>&nbsp;</p>
            <p><strong>Zahlungsverzug</strong></p>
            <p>Kommen Sie in Zahlungsverzug, so ist Virustestshop berechtigt, Verzugszinsen in H&ouml;he von 5 Prozentpunkten &uuml;ber dem von der Deutschen Bundesbank f&uuml;r den Zeitpunkt der Bestellung bekannt gegebenen Basiszinssatz p.a. zu fordern. Falls Virustestshop ein h&ouml;herer Verzugsschaden nachweisbar entstanden ist, ist Virustestshop berechtigt, diesen geltend zu machen.</p>
            <p>&nbsp;</p>
            <p><strong>Zur&uuml;ckbehaltungsrecht</strong></p>
            <p>Zur Aus&uuml;bung eines Zur&uuml;ckbehaltungsrechts ist der Kunde nur insoweit befugt, als sein Gegenanspruch auf demselben Vertragsverh&auml;ltnis beruht.</p>
            <p>&nbsp;</p>
            <p><strong>Lieferung</strong></p>
            <p>(1) Die Lieferung erfolgt an die vom Kunden angegebene Lieferanschrift, innerhalb von</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Deutschland <br /> (2) Macht h&ouml;here Gewalt (Naturkatastrophen, Krieg, B&uuml;rgerkrieg, Terroranschlag) die Lieferung oder eine sonstige Leistung dauerhaft unm&ouml;glich, ist eine Leistungspflicht von Virustestshop ausgeschlossen. Bereits gezahlte Betr&auml;ge werden von Virustestshop unverz&uuml;glich erstattet.</p>
            <p>(3) Virustestshop kann au&szlig;erdem die Leistung verweigern, soweit diese einen Aufwand erfordert, der unter Beachtung des Inhalts des Kaufvertrages und der Gebote von Treu und Glauben in einem groben Missverh&auml;ltnis zu dem Interesse des Kunden an der Erf&uuml;llung des Kaufvertrages steht. Bereits gezahlte Betr&auml;ge werden von Virustestshop unverz&uuml;glich erstattet.</p>
            <p>(4) Sperrgut (Pakete mit einem gr&ouml;&szlig;eren Volumen als 1 qm) werden in der Regel per Spedition geliefert. Virustestshop weist ausdr&uuml;cklich darauf hin, dass diese Ware nicht ins Haus getragen wird.&nbsp;</p>
            <p>&nbsp;</p>
            <p><strong>G&uuml;nstige Versandart bei R&uuml;cksendung</strong></p>
            <p>(1) Bitte verwenden Sie bei der R&uuml;cksendung der Ware und des Zubeh&ouml;rs nach M&ouml;glichkeit die Originalverpackung, auch wenn diese durch eine &Ouml;ffnung zur Funktionspr&uuml;fung besch&auml;digt sein sollte.</p>
            <p>(2) Bitte verwenden Sie zur R&uuml;cksendung den der Warenlieferung beigef&uuml;gten, vollst&auml;ndig frankierten und adressierten R&uuml;cksendeaufkleber. Es handelt sich dabei um die einfachste und kosteng&uuml;nstigste Versandm&ouml;glichkeit. Sie trifft keine Verpflichtung zur Verwendung dieses R&uuml;cksendeverfahrens. Wenn Sie allerdings eine unn&ouml;tig teure Versandart w&auml;hlen, k&ouml;nnen Sie unter Umst&auml;nden verpflichtet sein, die gegen&uuml;ber einer g&uuml;nstigen Versandart erh&ouml;hten Kosten an uns zu zahlen.</p>
            <p>&nbsp;</p>
            <p><strong>Eigentumsvorbehalt</strong></p>
            <p>Bis zur vollst&auml;ndigen Begleichung aller gegen den Kunden bestehender Anspr&uuml;che aus dem Kaufvertrag bleibt die gelieferte Ware im Eigentum von Virustestshop. Solange dieser Eigentumsvorbehalt besteht, darf der Kunde die Ware weder weiterver&auml;u&szlig;ern noch &uuml;ber die Ware verf&uuml;gen; insbesondere darf der Kunde Dritten vertraglich keine Nutzung an der Ware einr&auml;umen.</p>
            <p><strong>&nbsp;</strong></p>
            <p><strong>M&auml;ngelrechte</strong></p>
            <p>(1) Ein bereits bei der Lieferung mangelhaftes Produkt (Gew&auml;hrleistungsfall) wird Virustestshop nach Wahl des Kunden auf Kosten von Virustestshop durch ein mangelfreies Ersetzen oder fachgerecht reparieren lassen (Nacherf&uuml;llung). Der Kunde wird darauf hingewiesen, dass kein Gew&auml;hrleistungsfall vorliegt, wenn das Produkt bei Gefahr&uuml;bergang die vereinbarte Beschaffenheit hatte. Ein Gew&auml;hrleistungsfall liegt insbesondere in folgenden F&auml;llen nicht vor:</p>
            <ol>
                <li>a) bei Sch&auml;den, die beim Kunden durch Missbrauch oder unsachgem&auml;&szlig;en Gebrauch entstanden sind,</li>
                <li>b) bei Sch&auml;den, die dadurch entstanden sind, dass die Produkte beim Kunden sch&auml;dlichen &auml;u&szlig;eren Einfl&uuml;ssen ausgesetzt worden sind (insbesondere extremen Temperaturen, Feuchtigkeit, au&szlig;ergew&ouml;hnlicher physikalischer oder elektrischer Beanspruchung, Spannungsschwankungen, Blitzschlag, statischer Elektrizit&auml;t, Feuer).</li>
            </ol>
            <p>(2) Virustestshop leistet ferner keine Gew&auml;hr f&uuml;r einen Fehler, der durch unsachgem&auml;&szlig;e Reparatur durch einen nicht vom Hersteller autorisierten Servicepartner entstanden ist.</p>
            <p>(3) Erfordert die vom Kunden gew&uuml;nschte Art&nbsp;der Nacherf&uuml;llung (Ersatzlieferung oder Reparatur) einen Aufwand, der in Anbetracht des Produktpreises unter Beachtung des Vertragsinhaltes und der Gebote von Treu und Glauben in einem groben Missverh&auml;ltnis zu dem Leistungsinteresse des Kunden steht &ndash; wobei insbesondere der Wert des Kaufgegenstandes im mangelfreien Zustand, die Bedeutung des Mangels und die Frage zu ber&uuml;cksichtigen sind, ob auf die andere Art&nbsp;der Nacherf&uuml;llung ohne erhebliche Nachteile f&uuml;r den Kunden zur&uuml;ckgegriffen werden kann &ndash; beschr&auml;nkt sich der Anspruch des Kunden auf die jeweils andere Art&nbsp;der Nacherf&uuml;llung. Das Recht von Virustestshop, auch diese andere Art&nbsp;der Nacherf&uuml;llung unter der vorgenannten Voraussetzung zu verweigern, bleibt unber&uuml;hrt.&nbsp;</p>
            <p>(4) Sowohl f&uuml;r den Fall der Reparatur als auch f&uuml;r den Fall der Ersatzlieferung ist der Kunde verpflichtet, das Produkt auf Kosten von Virustestshop unter Angabe der Auftragsnummer an die von ihr angegebene R&uuml;cksendeadresse einzusenden. Vor der Einsendung hat der Kunde von ihm eingef&uuml;gte Gegenst&auml;nde aus dem Produkt zu entfernen. Virustestshop ist nicht verpflichtet, das Produkt auf den Einbau solcher Gegenst&auml;nde zu untersuchen. F&uuml;r den Verlust solcher Gegenst&auml;nde haftet Virustestshop nicht, es sei denn, es war bei R&uuml;cknahme des Produktes f&uuml;r Virustestshop ohne weiteres erkennbar, dass ein solcher Gegenstand in das Produkt eingef&uuml;gt worden ist (in diesem Fall informiert Virustestshop den Kunden und h&auml;lt den Gegenstand f&uuml;r den Kunden zur Abholung bereit; der Kunde tr&auml;gt die dabei entstehenden Kosten). Der Kunde hat zudem, bevor er ein Produkt zur Reparatur oder zum Austausch einsendet, gegebenenfalls separate Sicherungskopien der auf dem Produkt befindlichen Systemsoftware, der Anwendungen und aller Daten auf einem separaten Datentr&auml;ger zu erstellen und alle Passw&ouml;rter zu deaktivieren. Eine Haftung f&uuml;r Datenverlust wird nicht &uuml;bernommen. Ebenso obliegt es dem Kunden, nachdem ihm das reparierte Produkt oder das Ersatzprodukt zur&uuml;ckgesandt worden ist, die Software und Daten zu installieren und die Passw&ouml;rter zu reaktivieren.&nbsp;</p>
            <p>(5) Sendet der Kunde die Ware ein, um ein Austauschprodukt zu bekommen, richtet sich die R&uuml;ckgew&auml;hr des mangelhaften Produktes nach folgender Ma&szlig;gabe: Sofern der Kunde die Ware zwischen Lieferung und R&uuml;cksendung in mangelfreiem Zustand benutzen konnte, hat dieser den Wert der von ihm gezogenen Nutzungen zu erstatten. F&uuml;r einen nicht durch den Mangel eingetretenen Untergang oder die weitere Verschlechterung der Ware sowie f&uuml;r die nicht durch den Mangel eingetretene Unm&ouml;glichkeit der Herausgabe der Ware im Zeitraum zwischen Lieferung der Ware und R&uuml;cksendung der Ware hat der Kunde Wertersatz zu leisten. Der Kunde hat keinen Wertersatz f&uuml;r die durch den bestimmungsgem&auml;&szlig;en Gebrauch der Ware entstandene Verschlechterung der Ware zu leisten. Die Pflicht zum Wertersatz entf&auml;llt f&uuml;r die R&uuml;cksendung eines mangelhaften Produktes im Gew&auml;hrleistungsfall ferner,</p>
            <ol>
                <li>a) wenn sich der zum R&uuml;cktritt berechtigende Mangel erst w&auml;hrend der Verarbeitung oder Umgestaltung gezeigt hat,</li>
                <li>b) wenn Virustestshop die Verschlechterung oder den Untergang zu vertreten hat oder der Schaden auch bei Virustestshop eingetreten w&auml;re,</li>
                <li>c) wenn die Verschlechterung oder der Untergang beim Kunden eingetreten ist, obwohl dieser diejenige Sorgfalt beachtet hat, die er in eigenen Angelegenheiten anzuwenden pflegt.</li>
            </ol>
            <p>(6) Die Schadensersatzpflicht des Kunden bei einer vom Kunden zu vertretenden Verletzung der R&uuml;cksendungspflicht richtet sich nach Ma&szlig;gabe der gesetzlichen Bestimmungen.</p>
            <p>(7) Der Kunde kann nach seiner Wahl vom Vertrag zur&uuml;cktreten oder den Kaufpreis mindern, wenn die Reparatur oder Ersatzlieferung innerhalb einer angemessenen Frist nicht zu einem vertragsgerechten Zustand des Produktes gef&uuml;hrt hat.&nbsp;</p>
            <p>(8) Dar&uuml;ber hinaus k&ouml;nnen auch Anspr&uuml;che gegen den Hersteller im Rahmen einer von diesem einger&auml;umten Garantie bestehen, die sich nach den entsprechenden Garantiebedingungen richten.&nbsp;</p>
            <p>(9) Die gesetzliche Gew&auml;hrleistung von Virustestshop endet zwei Jahre ab Lieferung der Ware. Die Frist beginnt mit dem Erhalt der Ware.</p>
            <p>&nbsp;</p>
            <p><strong>Haftung</strong></p>
            <p>(1) Bei leichter Fahrl&auml;ssigkeit haftet Virustestshop nur bei der Verletzung vertragswesentlicher Pflichten und beschr&auml;nkt auf den vorhersehbaren Schaden. Diese Beschr&auml;nkung gilt nicht bei der Verletzung von Leben, K&ouml;rper und Gesundheit. F&uuml;r sonstige leicht fahrl&auml;ssig durch einen Mangel des Kaufgegenstandes verursachte Sch&auml;den haftet Virustestshop nicht.</p>
            <p>(2) Unabh&auml;ngig von einem Verschulden von Virustestshop bleibt eine Haftung von Virustestshop bei arglistigem Verschweigen des Mangels oder aus der &Uuml;bernahme einer Garantie unber&uuml;hrt. Die Herstellergarantie ist eine Garantie des Herstellers und stellt keine &Uuml;bernahme einer Garantie durch Virustestshop dar.</p>
            <p>(3) Virustestshop ist auch f&uuml;r die w&auml;hrend ihres Verzugs durch Zufall eintretende Unm&ouml;glichkeit der Lieferung verantwortlich, es sei denn, dass der Schaden auch bei rechtzeitiger Lieferung eingetreten w&auml;re.</p>
            <p>(4) Ausgeschlossen ist die pers&ouml;nliche Haftung der gesetzlichen Vertreter, Erf&uuml;llungsgehilfen und Betriebsangeh&ouml;rigen von Virustestshop f&uuml;r von ihnen durch leichte Fahrl&auml;ssigkeit verursachte Sch&auml;den.</p>
            <p>&nbsp;</p>
            <p><strong>Anwendbares Recht</strong></p>
            <p>Der zwischen Ihnen und Virustestshop abgeschlossene Vertrag unterliegt ausschlie&szlig;lich dem Recht der Bundesrepublik Deutschland unter ausdr&uuml;cklichem Ausschluss des UN-Kaufrechts. Unber&uuml;hrt davon bleiben die zwingenden Bestimmungen des Staates, in dem Sie Ihren gew&ouml;hnlichen Aufenthalt haben.</p>
            <p>&nbsp;</p>
            <p><strong>Gerichtsstand</strong></p>
            <p>Sofern Sie entgegen Ihren Angaben bei der Bestellung keinen Wohnsitz in der Bundesrepublik Deutschland haben oder nach Vertragsabschluss Ihren Wohnsitz ins Ausland verlegen oder Ihr Wohnsitz zum Zeitpunkt der Klageerhebung nicht bekannt ist, ist Gerichtsstand f&uuml;r alle Streitigkeiten aus und im Zusammenhang mit dem Vertragsverh&auml;ltnis Musterweg 12345 Musterstadt Deutschland.</p>
            <p>&nbsp;</p>
            <p><strong>Streitbeilegung</strong></p>
            <p>Allgemeine Informationspflichten zur alternativen Streitbeilegung nach Art. 14 Abs. 1 ODR-VO und &sect; 36 VSBG (Verbraucherstreitbeilegungsgesetz):</p>
            <p>Die europ&auml;ische Kommission stellt eine Plattform zur Online-Streitbelegung (OS) zur Verf&uuml;gung, die Sie unter dieser Adresse finden: <a href="http://ec.europa.eu/consumers/odr/">http://ec.europa.eu/consumers/odr/</a> . Zur Teilnahme an einem Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle sind wir nicht verpflichtet und auch nicht bereit.</p>
            <p><strong>Schlussbestimmungen</strong></p>
            <p>(1) Sollten einzelne Bestimmungen dieses Vertrages ganz oder teilweise unwirksam oder nichtig sein oder werden, so wird dadurch die Wirksamkeit des Vertrages im &Uuml;brigen nicht ber&uuml;hrt, insoweit ein Vertragspartner hierdurch nicht unangemessen benachteiligt wird.</p>
            <p>(2) &Auml;nderungen oder Erg&auml;nzungen dieses Vertrages bed&uuml;rfen der Schriftform.</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
        </div>


        <!-- Footer -->
        <footer class="text-center text-lg-start bg-light text-muted">
            <hr style="margin-top: 0" />
            <!-- Section: Links  -->
            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h4 class="text-uppercase fw-bold mb-4">
                                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><img src="../img/logo.png" height="40" style="margin-right: 15px"></a>VirusTestShop
                            </h4>
                            <p>
                                Deutschlands führender Shop für Corona Tests und Schulungen
                            </p>
                        </div>
                        <!-- Grid column -->
                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Produkte
                            </h6>
                            <p>
                                <a href="./produktangebot.php?orderBy=Preis%20ASC&kategorie=Corona%20Schnelltests" class="text-reset">Corona Schnelltests</a>
                            </p>
                            <!--Nur für Medizinische Kunden sichtbar-->
                           <?php
						   if($_SESSION["login"]==2) echo "<p> <a href=\"./produktangebot.php?orderBy=Preis%20ASC&kategorie=Corona%20PCR-Tests\" class=\"text-reset\">Corona PCR-Tests</a>
                              </p>"
                           ?>
                            <p>
                                <a href="./produktangebot.php?orderBy=Preis%20ASC&kategorie=Schulungen" class="text-reset">Schulungen</a>
                            </p>
                        </div>
                        <!-- Grid column -->
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Nützliche Links
                            </h6>
                            <p>
                                <a href="agb.php" class="text-reset">AGB</a>
                            </p>
                            <p>
                                <a href="impressum.php" class="text-reset">Impressum</a>
                            </p>
                            <p>
                                <a href="datenschutz.php" class="text-reset">Datenschutz</a>
                            </p>
                        </div>
                        <!-- Grid column -->
                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Kontakt
                            </h6>
                            <p><i class="fas fa-home me-3"></i> Heidenheim an der Brenz, DE 89518</p>
                            <p>
                                <i class="fas fa-envelope me-3"></i>
                                corona-testshop@example.com
                            </p>
                            <p><i class="fas fa-phone me-3"></i> + 01 234 567 89</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->
            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                © 2021 Copyright:
                <a class="text-reset fw-bold" href="#">virustestshop.de</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </div>
    <br />
    <br />

    <!-- End your project here-->
    <!-- MDB -->
    <script type="text/javascript" src="../js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>

    <script src="../src/simple-notify/simple-notify.min.js"></script>

    <script src="../js/produktangebote.js"></script>

    <script src="../js/cartNumber.js"></script>
	<script type="text/javascript" src="../js/functionScripts.js"></script>
   
    <script type=text/javascript src=../js/index.js><?php echo "checkLogin($_SESSION[login])</script>"?>;
    <script type="text/javascript" src="../js/index.js"></script>

</body>
</html>

