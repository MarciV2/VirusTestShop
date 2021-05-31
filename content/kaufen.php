<?php 
    SESSION_START();
    $logged_in = $_SESSION['login'];
	if($logged_in < 1){
		header('location: ../index.php');
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

          <div style="padding: 25px; background-color: #f9f9f9">






              <div class="card itemCard" id="kaufenDiv">

                  <div class="stepper-wrapper">
                      <div class="stepper-item active" id="stepper_step_1" onclick="goToStep1()">
                          <div class="step-counter">1</div>
                          <div class="step-name">Lieferadresse</div>
                      </div>
                      <div class="stepper-item" id="stepper_step_2" onclick="goToStep2()">
                          <div class="step-counter">2</div>
                          <div class="step-name">Zahlungsmethode</div>
                      </div>
                      <div class="stepper-item" id="stepper_step_3" onclick="goToStep3()">
                          <div class="step-counter">3</div>
                          <div class="step-name">Bestellung abgeschlossen</div>
                      </div>
                  </div>

                  <hr />

                  <!-- Lieferadresse Tab -->
                      <div id="tab_lieferadresse" style="display: block">
                          <div class="buyContainer">
                              <div class="form-check" style="margin-bottom: 35px">
                                  <input name="useAlternativeAdresse"
                                         class="form-check-input"
                                         type="checkbox"
                                         value=""
                                         id="useAlternativeAddress"
                                         onclick="useAlternativeAddress()"
                                         checked />
                                  <label class="form-check-label" for="flexCheckChecked">
                                      In diesem Account hinterlegte Adresse verwenden
                                  </label>
                              </div>
                              <form name="KaufForm" id="KaufForm" action="../php/BestellungVerarbeitung.php">
                                  <h2>Alternative Lieferadresse</h2>
                                  <h4 style="margin-top: 25px">Persönliche Angaben</h4>
                                  <div class="row">
                                      <div class="col-sm-6">
                                          <div class="form-outline" style="margin-bottom: 15px">
                                              <input type="text" id="vorname" name="altVorname" class="form-control" disabled />
                                              <label class="form-label" for="typeText">Vorname*</label>
                                          </div>
                                      </div>
                                      <div class="col-sm-6">
                                          <div class="form-outline" style="margin-bottom: 15px">
                                              <input type="text" id="nachname" name="altNachname" class="form-control" disabled />
                                              <label class="form-label" for="typeText">Nachname*</label>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-outline">
                                      <input type="text" id="altemail" name="altEmail" class="form-control" disabled />
                                      <label class="form-label" for="typeText">E-Mail-Adresse*</label>
                                  </div>
                                  <h4 style="margin-top: 25px">Adressangaben</h4>
                                  <div class="row">
                                      <div class="col-sm-7">
                                          <div class="form-outline" style="margin-bottom: 15px">
                                              <input type="text" id="strasse" name="altStrasse" class="form-control" disabled />
                                              <label class="form-label" for="typeText">Straße*</label>
                                          </div>
                                      </div>
                                      <div class="col-sm-5">
                                          <div class="form-outline" style="margin-bottom: 15px">
                                              <input type="text" id="hausnummer" name="altHausnummer" class="form-control" disabled />
                                              <label class="form-label" for="typeText">Hausnummer*</label>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-sm-5">
                                          <div class="form-outline" style="margin-bottom: 15px">
                                              <input type="text" id="plz" name="altPLZ" class="form-control" disabled />
                                              <label class="form-label" for="typeText">Postleitzahl*</label>
                                          </div>
                                      </div>
                                      <div class="col-sm-7">
                                          <div class="form-outline" style="margin-bottom: 15px">
                                              <input type="text" id="stadt" name="altStadt" class="form-control" disabled />
                                              <label class="form-label" for="typeText">Stadt*</label>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-sm-6">
                                          <div class="form-outline" style="margin-bottom: 15px">
                                              <input type="text" id="land" name="altLand" class="form-control" disabled />
                                              <label class="form-label" for="typeText">Land*</label>
                                          </div>
                                      </div>
                                      <div class="col-sm-6">
                                          <div class="form-outline" style="margin-bottom: 15px">
                                              <input type="text" id="bundesland" name="altBundesland" class="form-control" disabled />
                                              <label class="form-label" for="typeText">Bundesland</label>
                                          </div>
                                      </div>
                                  </div>
                              </form>

                              <div id="lieferadresse_alert" style="background-color: #ff9c9c; color: #6e0000; padding: 15px; margin-top: 20px; border-radius: 4px; display: none">
                                  Bitte vervollständige deine Angaben.
                              </div>
                          </div>
                      </div>
              
                  <!-- Zahlungsart Tab -->
                  <div id="tab_zahlungsart" style="display: none">
                      <div class="buyContainer">

                          <div class="card itemCard">
                              <ul class="list-group list-group-flush" id="list_of_elements_in_chart">


                                  <li class="list-group-item itemCardPayment" id="payment_paypal" onclick="selectPaypal()">
                                      <div class="row">
                                          <div class="col-md-5 col-10">
                                              <img src="https://rgblog.exali.de/wp-content/uploads/2018/01/paypal-784404_1280.png" height="60px" />
                                          </div>
                                          <div class="col-6 d-flex align-items-center d-md-block d-none">
                                              <h4 style="padding-top: 17px; margin-left: 3%">PayPal</h4>
                                          </div>
                                          <div class="col-1 d-flex align-items-center">
                                              <i id="checkmark_paypal" class="fas fa-check" style="padding-top: 7px; margin-right: 3%; display: none"></i>
                                          </div>
                                      </div>
                                  </li>

                                  <li class="list-group-item itemCardPayment" id="payment_credit" onclick="selectCreditcard()">
                                      <div class="row">
                                          <div class="col-md-5 col-10">
                                              <img src="../img/kreditkarte.png" height="60px" width="210px" />
                                          </div>
                                          <div class="col-6 d-flex align-items-center d-md-block d-none">
                                              <h4 style="padding-top: 17px; margin-left: 3%">Kreditkarte</h4>
                                          </div>
                                          <div class="col-1 d-flex align-items-center">
                                              <i id="checkmark_credit" class="fas fa-check" style="padding-top: 7px; margin-right: 3%; display: none"></i>
                                          </div>
                                      </div>
                                  </li>

                                  <li class="list-group-item itemCardPayment" id="payment_giro" onclick="selectGiropay()">
                                      <div class="row">
                                          <div class="col-md-5 col-10">
                                              <img src="https://www.giropay.de/fileadmin/user_upload/giropay/logos/giropay_960px_color_rgb.png" height="60px" />
                                          </div>
                                          <div class="col-6 d-flex align-items-center d-md-block d-none">
                                              <h4 style="padding-top: 17px; margin-left: 3%">GiroPay</h4>
                                          </div>
                                          <div class="col-1 d-flex align-items-center">
                                              <i id="checkmark_giro" class="fas fa-check" style="padding-top: 7px; margin-right: 3%; display: none"></i>
                                          </div>
                                      </div>
                                  </li>
                              </ul>
                          </div>

                          <div id="payment_alert" style="background-color: #ff9c9c; color: #6e0000; padding: 15px; margin-top: 20px; border-radius: 4px; display: none">
                              Bitte wähle eine Zahlungsmethode aus.
                          </div>

                      </div>
                   </div>
                    
                  <!-- Bestellung abgeschlossen Tab -->
                  <div id="tab_abgeschlossen" style="display: none">
                      <div class="buyContainer">
                          <div class="d-flex justify-content-center">
                              <i class="far fa-check-circle fa-6x" style="color: #07b31b"></i>
                          </div>
                          <div class="d-flex justify-content-center" style="margin-top: 30px">
                              <h3 style="text-align: center; color: #07b31b">Ihre Bestellung ist erfolgreich eingegangen!</h3>
                          </div>
                          <div class="d-flex justify-content-center" style="margin-top: 10px">
                              <h5 style="text-align: center; color: #07b31b">Die bestellten Produkte werden innerhalb der nächsten 5 Werktage bei Ihnen ankommen.</h5>
                          </div>
                      </div>
                  </div>

                  <hr />


                  <div class="buyContainer">

                      <div class="row">
                          <div class="col-6">
                              <button type="button" id="button_previous" onclick="previousStep()" class="btn btn-primary btn-lg btn-rounded btn-block" style="display: none; background-color: #1E90FF; margin-bottom: 20px">Zurück</button>
                          </div>
                          <div class="col-6 d-flex justify-content-end">
                              <button type="button" id="button_next" onclick="nextStep()" class="btn btn-primary btn-lg btn-rounded btn-block" style="display: block; background-color: #1E90FF; margin-bottom: 20px">Weiter</button>
                          </div>
                      </div>
                  </div>
              </div>


              <?php
              $variablephp = $_SESSION['login'];
              ?>
              <script>
                  var variablejs = "<?php echo $variablephp; ?>";
                  variablejs = 1;
                  variablejs = parseInt(variablejs);
                  if (variablejs <= 0) {
                      document.getElementById("kaufenDiv").innerHTML = "<h4 style='padding: 60px; padding-top: 70px'>Sie müssen eingeloggt sein, um Produkte kaufen zu können.</h4>";
                  }
              </script>
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
      <script type="text/javascript" src="../js/kaufen.js"></script>
      <script src="../js/cartNumber.js"></script>
	<script type="text/javascript" src="../js/functionScripts.js"></script>
   
    <script type=text/javascript src=../js/index.js><?php echo "checkLogin($_SESSION[login])</script>"?>;
    <script type="text/javascript" src="../js/index.js"></script>
  </body>
</html>
