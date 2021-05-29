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
						if(!isset($_SESSION['login']))
						{
							$_SESSION['login']=0;
						}
                        $variablephp = $_SESSION['login'];
						
                    ?>
                    <script>
                        var variablejs = "<?php echo $variablephp; ?>";
                        variablejs = parseInt(variablejs);
                        if(variablejs > 0){
                            var account_icon = '<a class="text-reset me-3" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">';
                            account_icon = account_icon + '<i class="fas fa-user-circle" style="color: #ffffff"></i>';
                            account_icon = account_icon + '</a>';
                            account_icon = account_icon + '<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">';
                            account_icon = account_icon + '<li><a class="dropdown-item" href="#">Profil</a></li>';
                            account_icon = account_icon + '<li><a class="dropdown-item" href="./bestellungen.php">Bestellungen</a></li>';
                            account_icon = account_icon + '<li><hr class="dropdown-divider" /></li>';
                            account_icon = account_icon + '<li><a class="dropdown-item" href="#" onclick="logout()">Logout</a></li>';
                            account_icon = account_icon + '</ul>';
                            document.write(account_icon);
                        } else {
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

        <div class="agb" style="margin-left:50px;margin-right:50px; margin-top:25px; margin-bottom:25px">
            <h1>Datenschutzerkl&auml;rung</h1>
            <p>Verantwortlicher im Sinne der Datenschutzgesetze, insbesondere der EU-Datenschutzgrundverordnung (DSGVO), ist:</p>
            <p>Max Muster</p>
            <h2>Ihre Betroffenenrechte</h2>
            <p>Unter den angegebenen Kontaktdaten unseres Datenschutzbeauftragten k&ouml;nnen Sie jederzeit folgende Rechte aus&uuml;ben:</p>
            <ul>
                <li>Auskunft &uuml;ber Ihre bei uns gespeicherten Daten und deren Verarbeitung (Art. 15 DSGVO),</li>
                <li>Berichtigung unrichtiger personenbezogener Daten (Art. 16 DSGVO),</li>
                <li>L&ouml;schung Ihrer bei uns gespeicherten Daten (Art. 17 DSGVO),</li>
                <li>Einschr&auml;nkung der Datenverarbeitung, sofern wir Ihre Daten aufgrund gesetzlicher Pflichten noch nicht l&ouml;schen d&uuml;rfen (Art. 18 DSGVO),</li>
                <li>Widerspruch gegen die Verarbeitung Ihrer Daten bei uns (Art. 21 DSGVO) und</li>
                <li>Daten&uuml;bertragbarkeit, sofern Sie in die Datenverarbeitung eingewilligt haben oder einen Vertrag mit uns abgeschlossen haben (Art. 20 DSGVO).</li>
            </ul>
            <p>Sofern Sie uns eine Einwilligung erteilt haben, k&ouml;nnen Sie diese jederzeit mit Wirkung f&uuml;r die Zukunft widerrufen.</p>
            <p>Sie k&ouml;nnen sich jederzeit mit einer Beschwerde an eine Aufsichtsbeh&ouml;rde wenden, z. B. an die zust&auml;ndige Aufsichtsbeh&ouml;rde des Bundeslands Ihres Wohnsitzes oder an die f&uuml;r uns als verantwortliche Stelle zust&auml;ndige Beh&ouml;rde.</p>
            <p>Eine Liste der Aufsichtsbeh&ouml;rden (f&uuml;r den nicht&ouml;ffentlichen Bereich) mit Anschrift finden Sie unter: <a href="https://www.bfdi.bund.de/DE/Infothek/Anschriften_Links/anschriften_links-node.html" target="_blank" rel="nofollow noopener">https://www.bfdi.bund.de/DE/Infothek/Anschriften_Links/anschriften_links-node.html</a>.</p>
            <p></p><h2>Erfassung allgemeiner Informationen beim Besuch unserer Website</h2>
            <h3>Art und Zweck der Verarbeitung:</h3>
            <p>Wenn Sie auf unsere Website zugreifen, d.h., wenn Sie sich nicht registrieren oder anderweitig Informationen &uuml;bermitteln, werden automatisch Informationen allgemeiner Natur erfasst. Diese Informationen (Server-Logfiles) beinhalten etwa die Art des Webbrowsers, das verwendete Betriebssystem, den Domainnamen Ihres Internet-Service-Providers, Ihre IP-Adresse und &auml;hnliches. </p>
            <p>Sie werden insbesondere zu folgenden Zwecken verarbeitet:</p>
            <ul>
                <li>Sicherstellung eines problemlosen Verbindungsaufbaus der Website,</li>
                <li>Sicherstellung einer reibungslosen Nutzung unserer Website,</li>
                <li>Auswertung der Systemsicherheit und -stabilit&auml;t sowie</li>
                <li>zur Optimierung unserer Website.</li>
            </ul>
            <p>Wir verwenden Ihre Daten nicht, um R&uuml;ckschl&uuml;sse auf Ihre Person zu ziehen. Informationen dieser Art werden von uns ggfs. anonymisiert statistisch ausgewertet, um unseren Internetauftritt und die dahinterstehende Technik zu optimieren. </p>
            <h3>Rechtsgrundlage und berechtigtes Interesse:</h3>
            <p>Die Verarbeitung erfolgt gem&auml;&szlig; Art. 6 Abs. 1 lit. f DSGVO auf Basis unseres berechtigten Interesses an der Verbesserung der Stabilit&auml;t und Funktionalit&auml;t unserer Website.</p>
            <h3>Empf&auml;nger:</h3>
            <p>Empf&auml;nger der Daten sind ggf. technische Dienstleister, die f&uuml;r den Betrieb und die Wartung unserer Webseite als Auftragsverarbeiter t&auml;tig werden.</p>
            <p></p><h3>Speicherdauer:</h3>
            <p>Die Daten werden gel&ouml;scht, sobald diese f&uuml;r den Zweck der Erhebung nicht mehr erforderlich sind. Dies ist f&uuml;r die Daten, die der Bereitstellung der Website dienen, grunds&auml;tzlich der Fall, wenn die jeweilige Sitzung beendet ist. </p>
            <p></p><h3>Bereitstellung vorgeschrieben oder erforderlich:</h3>
            <p>Die Bereitstellung der vorgenannten personenbezogenen Daten ist weder gesetzlich noch vertraglich vorgeschrieben. Ohne die IP-Adresse ist jedoch der Dienst und die Funktionsf&auml;higkeit unserer Website nicht gew&auml;hrleistet. Zudem k&ouml;nnen einzelne Dienste und Services nicht verf&uuml;gbar oder eingeschr&auml;nkt sein. Aus diesem Grund ist ein Widerspruch ausgeschlossen. </p>
            <p></p><h2>Cookies</h2>
            <p>Wie viele andere Webseiten verwenden wir auch so genannte „Cookies“. Bei Cookies handelt es sich um kleine Textdateien, die auf Ihrem Endger&auml;t (Laptop, Tablet, Smartphone o.&auml;.) gespeichert werden, wenn Sie unsere Webseite besuchen. </p>
            <p>Sie k&ouml;nnen Sie einzelne Cookies oder den gesamten Cookie-Bestand l&ouml;schen. Dar&uuml;ber hinaus erhalten Sie Informationen und Anleitungen, wie diese Cookies gel&ouml;scht oder deren Speicherung vorab blockiert werden k&ouml;nnen. Je nach Anbieter Ihres Browsers finden Sie die notwendigen Informationen unter den nachfolgenden Links:</p>
            <ul>
                <li>Mozilla Firefox: <a href="https://support.mozilla.org/de/kb/cookies-loeschen-daten-von-websites-entfernen" target="_blank" rel="nofollow noopener">https://support.mozilla.org/de/kb/cookies-loeschen-daten-von-websites-entfernen</a></li>
                <li>Internet Explorer: <a href="https://support.microsoft.com/de-de/help/17442/windows-internet-explorer-delete-manage-cookies" target="_blank" rel="nofollow noopener">https://support.microsoft.com/de-de/help/17442/windows-internet-explorer-delete-manage-cookies</a></li>
                <li>Google Chrome: <a href="https://support.google.com/accounts/answer/61416?hl=de" target="_blank" rel="nofollow noopener">https://support.google.com/accounts/answer/61416?hl=de</a></li>
                <li>Opera: <a href="http://www.opera.com/de/help" target="_blank" rel="nofollow noopener">http://www.opera.com/de/help</a></li>
                <li>Safari: <a href="https://support.apple.com/kb/PH17191?locale=de_DE&viewlocale=de_DE" target="_blank" rel="nofollow noopener">https://support.apple.com/kb/PH17191?locale=de_DE&viewlocale=de_DE</a></li>
            </ul>
            <h3>Speicherdauer und eingesetzte Cookies:</h3>
            <p>Soweit Sie uns durch Ihre Browsereinstellungen oder Zustimmung die Verwendung von Cookies erlauben, k&ouml;nnen folgende Cookies auf unseren Webseiten zum Einsatz kommen:</p>
            <p>1 Monat</p>
            <h2>Technisch notwendige Cookies </h2>
            <h3>Art und Zweck der Verarbeitung: </h3>
            <p>Wir setzen Cookies ein, um unsere Website nutzerfreundlicher zu gestalten. Einige Elemente unserer Internetseite erfordern es, dass der aufrufende Browser auch nach einem Seitenwechsel identifiziert werden kann.</p>
            <p>Der Zweck der Verwendung technisch notwendiger Cookies ist, die Nutzung von Websites f&uuml;r die Nutzer zu vereinfachen. Einige Funktionen unserer Internetseite k&ouml;nnen ohne den Einsatz von Cookies nicht angeboten werden. F&uuml;r diese ist es erforderlich, dass der Browser auch nach einem Seitenwechsel wiedererkannt wird.</p>
            <p>F&uuml;r folgende Anwendungen ben&ouml;tigen wir Cookies:</p>
            <p>Warenkorb</p>
            <h3>Rechtsgrundlage und berechtigtes Interesse: </h3>
            <p>Die Verarbeitung erfolgt gem&auml;&szlig; Art. 6 Abs. 1 lit. f DSGVO auf Basis unseres berechtigten Interesses an einer nutzerfreundlichen Gestaltung unserer Website.</p>
            <h3>Empf&auml;nger: </h3>
            <p>Empf&auml;nger der Daten sind ggf. technische Dienstleister, die f&uuml;r den Betrieb und die Wartung unserer Website als Auftragsverarbeiter t&auml;tig werden.</p>
            <p></p><h3>Bereitstellung vorgeschrieben oder erforderlich:</h3>
            <p>Die Bereitstellung der vorgenannten personenbezogenen Daten ist weder gesetzlich noch vertraglich vorgeschrieben. Ohne diese Daten ist jedoch der Dienst und die Funktionsf&auml;higkeit unserer Website nicht gew&auml;hrleistet. Zudem k&ouml;nnen einzelne Dienste und Services nicht verf&uuml;gbar oder eingeschr&auml;nkt sein.</p>
            <h3>Widerspruch</h3>
            <p>Lesen Sie dazu die Informationen &uuml;ber Ihr Widerspruchsrecht nach Art. 21 DSGVO weiter unten.</p>
            <p></p><h2>Registrierung auf unserer Website</h2>
            <h3>Art und Zweck der Verarbeitung:</h3>
            <p>F&uuml;r die Registrierung auf unserer Website ben&ouml;tigen wir einige personenbezogene Daten, die &uuml;ber eine Eingabemaske an uns &uuml;bermittelt werden. </p>
            <p>Zum Zeitpunkt der Registrierung werden zus&auml;tzlich folgende Daten erhoben:</p>
            <p>
                Name
                <br>Adresse
                <br>Email
            </p>
            <p>Ihre Registrierung ist f&uuml;r das Bereithalten bestimmter Inhalte und Leistungen auf unserer Website erforderlich.</p>
            <h3>Rechtsgrundlage:</h3>
            <p>Die Verarbeitung der bei der Registrierung eingegebenen Daten erfolgt auf Grundlage einer Einwilligung des Nutzers (Art. 6 Abs. 1 lit. a DSGVO).</p>
            <h3>Empf&auml;nger:</h3>
            <p>Empf&auml;nger der Daten sind ggf. technische Dienstleister, die f&uuml;r den Betrieb und die Wartung unserer Website als Auftragsverarbeiter t&auml;tig werden.</p>
            <p></p><h3>Speicherdauer:</h3>
            <p>Daten werden in diesem Zusammenhang nur verarbeitet, solange die entsprechende Einwilligung vorliegt. </p>
            <h3>Bereitstellung vorgeschrieben oder erforderlich:</h3>
            <p>Die Bereitstellung Ihrer personenbezogenen Daten erfolgt freiwillig, allein auf Basis Ihrer Einwilligung. Ohne die Bereitstellung Ihrer personenbezogenen Daten k&ouml;nnen wir Ihnen keinen Zugang auf unsere angebotenen Inhalte gew&auml;hren. </p>
            <p></p><h2>Erbringung kostenpflichtiger Leistungen</h2>
            <h3>Art und Zweck der Verarbeitung:</h3>
            <p>Zur Erbringung kostenpflichtiger Leistungen werden von uns zus&auml;tzliche Daten erfragt, wie z.B. Zahlungsangaben, um Ihre Bestellung ausf&uuml;hren zu k&ouml;nnen.</p>
            <h3>Rechtsgrundlage:</h3>
            <p>Die Verarbeitung der Daten, die f&uuml;r den Abschluss des Vertrages erforderlich ist, basiert auf Art. 6 Abs. 1 lit. b DSGVO.</p>
            <h3>Empf&auml;nger:</h3>
            <p>Empf&auml;nger der Daten sind ggf. Auftragsverarbeiter.</p>
            <p></p><h3>Speicherdauer:</h3>
            <p>Wir speichern diese Daten in unseren Systemen bis die gesetzlichen Aufbewahrungsfristen abgelaufen sind. Diese betragen grunds&auml;tzlich 6 oder 10 Jahre aus Gr&uuml;nden der ordnungsm&auml;&szlig;igen Buchf&uuml;hrung und steuerrechtlichen Anforderungen.</p>
            <h3>Bereitstellung vorgeschrieben oder erforderlich:</h3>
            <p>Die Bereitstellung Ihrer personenbezogenen Daten erfolgt freiwillig. Ohne die Bereitstellung Ihrer personenbezogenen Daten k&ouml;nnen wir Ihnen keinen Zugang auf unsere angebotenen Inhalte und Leistungen gew&auml;hren.</p>
            <p></p><h2>Kontaktformular</h2>
            <h3>Art und Zweck der Verarbeitung:</h3>
            <p>Die von Ihnen eingegebenen Daten werden zum Zweck der individuellen Kommunikation mit Ihnen gespeichert. Hierf&uuml;r ist die Angabe einer validen E-Mail-Adresse sowie Ihres Namens erforderlich. Diese dient der Zuordnung der Anfrage und der anschlie&szlig;enden Beantwortung derselben. Die Angabe weiterer Daten ist optional.</p>
            <h3>Rechtsgrundlage:</h3>
            <p>Die Verarbeitung der in das Kontaktformular eingegebenen Daten erfolgt auf der Grundlage eines berechtigten Interesses (Art. 6 Abs. 1 lit. f DSGVO).</p>
            <p>Durch Bereitstellung des Kontaktformulars m&ouml;chten wir Ihnen eine unkomplizierte Kontaktaufnahme erm&ouml;glichen. Ihre gemachten Angaben werden zum Zwecke der Bearbeitung der Anfrage sowie f&uuml;r m&ouml;gliche Anschlussfragen gespeichert.</p>
            <p>Sofern Sie mit uns Kontakt aufnehmen, um ein Angebot zu erfragen, erfolgt die Verarbeitung der in das Kontaktformular eingegebenen Daten zur Durchf&uuml;hrung vorvertraglicher Ma&szlig;nahmen (Art. 6 Abs. 1 lit. b DSGVO).</p>
            <h3>Empf&auml;nger:</h3>
            <p>Empf&auml;nger der Daten sind ggf. Auftragsverarbeiter.</p>
            <p></p><h3>Speicherdauer:</h3>
            <p>Daten werden sp&auml;testens 6 Monate nach Bearbeitung der Anfrage gel&ouml;scht.</p>
            <p>Sofern es zu einem Vertragsverh&auml;ltnis kommt, unterliegen wir den gesetzlichen Aufbewahrungsfristen nach HGB und l&ouml;schen Ihre Daten nach Ablauf dieser Fristen. </p>
            <h3>Bereitstellung vorgeschrieben oder erforderlich:</h3>
            <p>Die Bereitstellung Ihrer personenbezogenen Daten erfolgt freiwillig. Wir k&ouml;nnen Ihre Anfrage jedoch nur bearbeiten, sofern Sie uns Ihren Namen, Ihre E-Mail-Adresse und den Grund der Anfrage mitteilen.</p>
            <p></p><h2>Verwendung von Google Analytics</h2>
            <p>Soweit Sie ihre Einwilligung gegeben haben, wird auf dieser Website Google Analytics eingesetzt, ein Webanalysedienst der Google LLC, 1600 Amphitheatre Parkway, Mountain View, CA 94043 USA (nachfolgend: „Google“). Google Analytics verwendet sog. „Cookies“, also Textdateien, die auf Ihrem Computer gespeichert werden und die eine Analyse der Benutzung der Webseite durch Sie erm&ouml;glichen. Die durch das Cookie erzeugten Informationen &uuml;ber Ihre Benutzung dieser Webseite werden in der Regel an einen Server von Google in den USA &uuml;bertragen und dort gespeichert. Aufgrund der Aktivierung der IP-Anonymisierung auf diesen Webseiten, wird Ihre IP-Adresse von Google jedoch innerhalb von Mitgliedstaaten der Europ&auml;ischen Union oder in anderen Vertragsstaaten des Abkommens &uuml;ber den Europ&auml;ischen Wirtschaftsraum zuvor gek&uuml;rzt. Nur in Ausnahmef&auml;llen wird die volle IP-Adresse an einen Server von Google in den USA &uuml;bertragen und dort gek&uuml;rzt. Die im Rahmen von Google Analytics von Ihrem Browser &uuml;bermittelte IP-Adresse wird nicht mit anderen Daten von Google zusammengef&uuml;hrt. </p>
            <p>N&auml;here Informationen zu Nutzungsbedingungen und Datenschutz finden Sie unter <a href="https://www.google.com/analytics/terms/de.html und unter https://policies.google.com/?hl=de" rel="noopener" target="_blank">https://www.google.com/analytics/terms/de.html und unter https://policies.google.com/?hl=de</a>. </p>
            <p>Im Auftrag des Betreibers dieser Website wird Google diese Informationen benutzen, um Ihre Nutzung der Webseite auszuwerten, um Reports &uuml;ber die Webseitenaktivit&auml;ten zusammenzustellen und um weitere mit der Websitenutzung und der Internetnutzung verbundene Dienstleistungen gegen&uuml;ber dem Webseitenbetreiber zu erbringen. </p>
            <p>Die von uns gesendeten und mit Cookies, Nutzerkennungen (z. B. User-ID) oder Werbe-IDs verkn&uuml;pften Daten werden nach 14 Monaten automatisch gel&ouml;scht. Die L&ouml;schung von Daten, deren Aufbewahrungsdauer erreicht ist, erfolgt automatisch einmal im Monat.</p>
            <h3>Widerruf der Einwilligung:</h3>
            <p>Sie k&ouml;nnen das Tracking durch Google Analytics auf unserer Website unterbinden, indem Sie <a title="Google Analytics Opt-Out-Cookie setzen" onClick="gaOptout();alert('Google Analytics wurde deaktiviert');" href="#">diesen Link anklicken</a>. Dabei wird ein Opt-out-Cookie auf Ihrem Ger&auml;t installiert. Damit wird die Erfassung durch Google Analytics f&uuml;r diese Website und f&uuml;r diesen Browser zuk&uuml;nftig verhindert, solange das Cookie in Ihrem Browser installiert bleibt.</p>
            <p>Sie k&ouml;nnen dar&uuml;ber hinaus die Speicherung der Cookies durch eine entsprechende Einstellung Ihrer Browser-Software verhindern; wir weisen Sie jedoch darauf hin, dass Sie in diesem Fall gegebenenfalls nicht s&auml;mtliche Funktionen dieser Website vollumf&auml;nglich werden nutzen k&ouml;nnen. </p>
            <p>Sie k&ouml;nnen dar&uuml;ber hinaus die Erfassung der durch das Cookie erzeugten und auf Ihre Nutzung der Webseite bezogenen Daten (inkl. Ihrer IP-Adresse) an Google sowie die Verarbeitung dieser Daten durch Google verhindern, indem sie das unter dem folgenden Link verf&uuml;gbare Browser-Plugin herunterladen und installieren: <a href="http://tools.google.com/dlpage/gaoptout?hl=de" rel="noopener" target="_blank">Browser Add On zur Deaktivierung von Google Analytics</a>.</p>
            <p></p><hr>
            <h2>Information &uuml;ber Ihr Widerspruchsrecht nach Art. 21 DSGVO</h2>
            <h3>Einzelfallbezogenes Widerspruchsrecht</h3>
            <p>Sie haben das Recht, aus Gr&uuml;nden, die sich aus Ihrer besonderen Situation ergeben, jederzeit gegen die Verarbeitung Sie betreffender personenbezogener Daten, die aufgrund Art. 6 Abs. 1 lit. f DSGVO (Datenverarbeitung auf der Grundlage einer Interessenabw&auml;gung) erfolgt, Widerspruch einzulegen; dies gilt auch f&uuml;r ein auf diese Bestimmung gest&uuml;tztes Profiling im Sinne von Art. 4 Nr. 4 DSGVO.</p>
            <p>Legen Sie Widerspruch ein, werden wir Ihre personenbezogenen Daten nicht mehr verarbeiten, es sei denn, wir k&ouml;nnen zwingende schutzw&uuml;rdige Gr&uuml;nde f&uuml;r die Verarbeitung nachweisen, die Ihre Interessen, Rechte und Freiheiten &uuml;berwiegen, oder die Verarbeitung dient der Geltendmachung, Aus&uuml;bung oder Verteidigung von Rechtsanspr&uuml;chen.</p>
            <h3>Empf&auml;nger eines Widerspruchs</h3>
            <p>Max Muster / max@muster.de</p>
            <hr>
            <h2>&Auml;nderung unserer Datenschutzbestimmungen</h2>
            <p>Wir behalten uns vor, diese Datenschutzerkl&auml;rung anzupassen, damit sie stets den aktuellen rechtlichen Anforderungen entspricht oder um &Auml;nderungen unserer Leistungen in der Datenschutzerkl&auml;rung umzusetzen, z.B. bei der Einf&uuml;hrung neuer Services. F&uuml;r Ihren erneuten Besuch gilt dann die neue Datenschutzerkl&auml;rung.</p>
            <h2>Fragen an den Datenschutzbeauftragten</h2>
            <p>Wenn Sie Fragen zum Datenschutz haben, schreiben Sie uns bitte eine E-Mail oder wenden Sie sich direkt an die f&uuml;r den Datenschutz verantwortliche Person in unserer Organisation:</p>
            <p></p><p><em>Die Datenschutzerkl&auml;rung wurde mithilfe der activeMind AG erstellt, den Experten f&uuml;r <a href="https://www.activemind.de/datenschutz/datenschutzbeauftragter/" target="_blank" rel="noopener">externe Datenschutzbeauftragte</a> (Version #2020-09-30).</em></p>
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
                                <img src="../img/logo.png" height="40" style="margin-right: 15px">VirusTestShop
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
                            <p>
                                <a href="./produktangebot.php?orderBy=Preis%20ASC&kategorie=Corona%20PCR-Tests" class="text-reset">Corona PCR-Tests</a>
                            </p>
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
                                <a href="agb.php" class="text-reset">ABG</a>
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

