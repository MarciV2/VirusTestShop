<?php SESSION_START();
    error_reporting(0);

    include_once '../php/BestellungHistorieVerarbeitung.php';

    $logged_in = $_SESSION['login'];
    if($logged_in > 0){
        $user = $_SESSION['user'][0];
        $sql_login = "SELECT * FROM `kunde` WHERE `kunde`.`LoginName`='" . (md5($user)) . "';";
        $result_login = mysqli_query($verbindung, $sql_login);
        $row_login = mysqli_fetch_assoc($result_login);
        $kunden_id = $row_login['Kunde_ID'];
    }
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
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="../css/mdb.min.css" />
    <link rel="stylesheet" href="../css/style.css"/>

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
                            account_icon = account_icon + '<li><a class="dropdown-item" href="./profil.php">Profil</a></li>';
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

          <div style="padding: 25px; background-color: #f9f9f9">


              <div class="card itemCard">
                  <h4 style="padding: 10px; margin-top: 10px; margin-left: 20px">Bisherige Bestellungen</h4>
              </div>

              <div class="card itemCard" style="padding: 1%">
                  <div>
                      
                      <?php
                      if($logged_in > 0){
                          $sql = "SELECT * FROM `bestellung` WHERE `bestellung`.`Kunde_ID` = " . ($kunden_id) . " ORDER BY `bestellung`.`Bestelldatum` DESC;";
                          $result = mysqli_query($verbindung, $sql);
                          $resultCheck =  mysqli_num_rows($result);

                          if($resultCheck > 0){
                              #while schleife füllt akkordeon mit bestellungen
                              while($row = mysqli_fetch_assoc($result)){
                                  $bestellung_id = $row['Bestellung_ID'];
                                  $bestelldatum = substr($row['Bestelldatum'], 0, 16);
                                  $versanddatum = $row['Versanddatum'];
                                  if($versanddatum){
                                        $versanddatum = substr($row['Bestelldatum'], 0, 10);
                                  } else {
                                        $versanddatum = "ausstehend";
                                  }

                                  #Bestellstatus abfragen
                                  $bestellstatus = $row['Bestellstatus_ID'];
                                  $sql_bestellstatus_text = "SELECT * FROM `bestellstatus` WHERE `bestellstatus`.`Bestellstatus_ID` = " . ($bestellstatus) . ";";
                                  $result_bestellstatus = mysqli_query($verbindung, $sql_bestellstatus_text);
                                  $row_bestellstatus = mysqli_fetch_assoc($result_bestellstatus);
                                  $bestellstatus_text = $row_bestellstatus['Bezeichnung'];

                                  #Lieferadresse abfragen
                                  $lieferadresse = $row['Lieferdresse_ID'];
                                  $sql_lieferadresse = "SELECT * FROM `adresse` WHERE `adresse`.`Adresse_ID` = " . ($lieferadresse) . ";";
                                  $result_lieferadresse = mysqli_query($verbindung, $sql_lieferadresse);
                                  $row_lieferadresse = mysqli_fetch_assoc($result_lieferadresse);
                                  $lieferadresse_strasse = $row_lieferadresse['Strasse'];
                                  $lieferadresse_hausnummer = $row_lieferadresse['Hausnummer'];
                                  $lieferadresse_strasse_hausnummer = $lieferadresse_strasse . " " . $lieferadresse_hausnummer;
                                  $lieferadresse_plz = $row_lieferadresse['PLZ'];
                                  $lieferadresse_stadt = $row_lieferadresse['Stadt'];
                                  $lieferadresse_plz_stadt = $lieferadresse_plz . " " . $lieferadresse_stadt;
                                  $lieferadresse_land = $row_lieferadresse['Land'];


                                    echo '<div class="accordion-item">';
                                    echo '<h2 class="accordion-header" id="flush-heading' . ($bestellung_id) . '">
                                              <button class="accordion-button collapsed"
                                                      type="button"
                                                      data-mdb-toggle="collapse"
                                                      data-mdb-target="#flush-collapse' . ($bestellung_id) . '"
                                                      aria-expanded="false"
                                                      aria-controls="flush-collapse' . ($bestellung_id) . '">
                                                  <div class="row" style="width: 100%">
                                                      <div class="col-8">
                                                          Bestellung vom ' . ($bestelldatum) . '
                                                      </div>
                                                      <div class="col-4 d-flex justify-content-end">
                                                          Status: ' . ($bestellstatus_text) . '
                                                      </div>
                                                  </div>
                                              </button>
                                          </h2>';
                                    echo '<div id="flush-collapse' . ($bestellung_id) . '" class="accordion-collapse collapse" aria-labelledby="flush-heading' . ($bestellung_id) . '">';
                                    echo '<div class="accordion-body">';
                                    #heading of each accorion element (Produkt    Anzahl     Preis)
                                    echo '<div class="row"> 
                                            <div class="col-lg-8 col-sm-8 col-7">
                                                <h6 style="padding-top: 10px; padding-left: 20px">Produkt </h6>
                                            </div>
                                            <div class="col-lg-2 col-sm-2 col-3">
                                                <h6 style="padding-top: 10px">Anzahl </h6>
                                            </div>
                                            <div class="col-lg-2 col-sm-2 col-2 d-flex justify-content-end">
                                                <h6 style="padding-top: 10px; padding-right: 20px">Preis</h6>
                                            </div>
                                        </div>';
                                    echo '<div style="height: 2px; background-color: gainsboro"></div>';
                                    echo '<ul class="list-group list-group-flush" id="list_of_elements_in_cart">';


                                    $sql_bestellposition = "SELECT * FROM `bestellungsposition` WHERE `bestellungsposition`.`Bestellung_ID` = " . ($bestellung_id) . ";";
                                    $result_bestellposition = mysqli_query($verbindung, $sql_bestellposition);
                                    
                                    $preis_summe = 0;

                                    #while schleife füllt bestellung des akkordeons mit bestellten artikeln
                                    while($row_bestellposition = mysqli_fetch_assoc($result_bestellposition)){
                                        $preis =  $row_bestellposition['Preis'];
                                        $preis_summe = $preis_summe + $preis;
                                        $preis = number_format($preis, 2, ',', '.');
                                        $anzahl = $row_bestellposition['Anzahl'];

                                        #Packungsinformationen abfragen (Name, Hersteller, ...)
                                        $packung_id = $row_bestellposition['Packung_ID'];
                                        $sql_packung = "SELECT 
                                                        `packung`.`Packungsgroessee` as groesse,
                                                        `hersteller`.Name as hersteller,
                                                        `artikel`.Artikelname as name
                                                        FROM 
                                                        `bestellungsposition`
                                                        LEFT JOIN `packung` ON `bestellungsposition`.Packung_ID=`packung`.Packung_ID
                                                        LEFT JOIN `artikel` ON `packung`.Artikel_ID=`artikel`.Artikel_ID
                                                        LEFT JOIN `hersteller` ON `artikel`.Hersteller_ID=`hersteller`.Hersteller_ID
                                                        WHERE `bestellungsposition`.`Bestellung_ID`=" . ($bestellung_id) . " AND `packung`.Packung_ID=" . ($packung_id) . ";";
                                        $result_packung = mysqli_query($verbindung, $sql_packung);

                                        $row_packung = mysqli_fetch_assoc($result_packung);
                                        $packungsgroesse = $row_packung['groesse'];
                                        $hersteller = $row_packung['hersteller'];
                                        $name = $row_packung['name'];

                                        $produktbezeichnung = $packungsgroesse . "x " . $hersteller . " - " . $name;


                                        echo '<li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-lg-8 col-sm-8 col-7">
                                                        <div class="row">
                                                            <div class="col-lg-2 col-3 d-md-block d-none">
                                                                <img src="../img/' . ($packung_id) . '.png" height="60px" />
                                                            </div>
                                                            <div class="col-lg-10 col-md-9 col-12 d-flex align-items-center">
                                                                <h5 style="padding-top: 7px">' . ($produktbezeichnung) . '</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-2 col-3 d-flex align-items-center">
                                                        <h6 style="padding-top: 7px; margin-left: 5%">' . ($anzahl) . '</h6>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-2 col-2 d-flex align-items-center justify-content-end">
                                                        <h6 style="padding-top: 7px; margin-left: 5%">' . ($preis) . ' €</h6>
                                                    </div>
                                                </div>
                                            </li>';
                                    }

                                    $preis_mwst = $preis_summe * 0.19;
                                    $preis_mwst = number_format($preis_mwst, 2, ',', '.');
                                    $preis_summe = number_format($preis_summe, 2, ',', '.');
                                    $versandkosten = $row['Lieferkosten'];
                                    $versandkosten = number_format($versandkosten, 2, ',', '.');

                                    echo '</ul>';

                                    echo '<div style="height: 1px; background-color: gainsboro"></div>';


                                    echo '<div class="row" style="padding: 2% 2%; font-size: small">
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-6">
                                                        Bestelldatum:
                                                    </div>
                                                    <div class="col-6 d-flex justify-content-end">
                                                        ' . (substr($row['Bestelldatum'], 0, 10)) . '
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        Versanddatum:
                                                    </div>
                                                    <div class="col-6 d-flex justify-content-end">
                                                        ' . ($versanddatum) . '
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        Bestell-Nr:
                                                    </div>
                                                    <div class="col-6 d-flex justify-content-end">
                                                        ' . ($bestellung_id) . '
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 d-flex justify-content-center">
                                                <div style="height: 100%; width: 1px; background-color: gainsboro"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-6">
                                                        Lieferadresse:
                                                    </div>
                                                    <div class="col-6 d-flex justify-content-end">
                                                        ' . ($lieferadresse_strasse_hausnummer) . '
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                    </div>
                                                    <div class="col-6 d-flex justify-content-end">
                                                        ' . ($lieferadresse_plz_stadt) . '
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                    </div>
                                                    <div class="col-6 d-flex justify-content-end">
                                                        ' . ($lieferadresse_land) . '
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 d-flex justify-content-center">
                                                <div style="height: 100%; width: 1px; background-color: gainsboro"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-6">
                                                        Gesamtpreis:
                                                    </div>
                                                    <div class="col-6 d-flex justify-content-end">
                                                        ' . ($preis_summe) . ' €
                                                    </div>
                                                    <div class="col-6">
                                                        Davon MwSt (19%):
                                                    </div>
                                                    <div class="col-6 d-flex justify-content-end">
                                                        ' . ($preis_mwst) . ' €
                                                    </div>
                                                    <div class="col-6">
                                                        Versandkosten:
                                                    </div>
                                                    <div class="col-6 d-flex justify-content-end">
                                                        ' . ($versandkosten) . ' €
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';


                                    echo '<div style="height: 1px; background-color: gainsboro"></div>';

                                    echo '<div style="font-size: small; padding: 1% 2%">
                                            Probleme mit der Bestellung? Schreiben Sie uns eine Email an corona-testshop@example.com oder rufen Sie uns an unter + 01 234 567 89
                                        </div>';

                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                              }

                              echo '<div class="accordion accordion-flush" id="accordionFlush">';
                          echo '</div>';

                          } else {
                                echo "<h4 style='text-align:center; margin: 20px'>Sie haben bisher noch keine Bestellung getätigt.</h4>";
                          }
                      } else {
                            echo "<h4 style='text-align:center; margin: 20px'>Sie müssen angemeldet sein, um sich Ihren Bestellverlauf anzeigen zu lassen.</h4>";
                      }

                      ?>

                  </div>

              </div>



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
                                  <a href="./agb.php" class="text-reset">AGB</a>
                              </p>
                              <p>
                                  <a href="./impressum.php" class="text-reset">Impressum</a>
                              </p>
                              <p>
                                  <a href="./datenschutz.php" class="text-reset">Datenschutz</a>
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

      <!-- End your project here-->
      <!-- MDB -->
      <script type="text/javascript" src="../js/mdb.min.js"></script>
      <script src="../js/cartNumber.js"></script>
      <script type="text/javascript" src="../js/functionScripts.js"></script>
   
    <script type=text/javascript src=../js/index.js><?php echo "checkLogin($_SESSION[login])</script>"?>;
    <script type="text/javascript" src="../js/index.js"></script>
  </body>
</html>
