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
    <link rel="icon" href="./img/logo.png" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="./css/mdb.min.css" />
    <link rel="stylesheet" href="./css/style.css" />

   
    
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
                  <td><input class="big" type="password" placeholder="Passwort" name="passwort" required/><br></td>
                  <td><input class="big" type="password" placeholder="Passwort wiederholen" name="wdhlg-passwort" required/></td>
                </tr>
                <tr>
                  <td><input class="big" type="text" placeholder="Vorname" name="vorname" required></td>
                  <td><input class="big" type="text" placeholder="Nachname" name="nachname" required></td>
                </tr>
                <tr>
                  <td><input class="big" type="text" placeholder="Straße" name="strasse" required></td>
                  <td><input type="number" name="hausnummer" placeholder="Nr." min="1" max = "999" required><input type="number" placeholder="PLZ" name="plz" min="1000" max="99999" required></td>
                </tr>
                <tr>
                  <td><input class="big" tyoe="text" placeholder="Stadt" name="stadt" required></td>
                  <td><input class="big" type="text" placeholder="Stadtteil" name="stadtteil" required></td>
                </tr>
                <tr>
                  <td><input class="big" type="text" placeholder="Land" name="land" required></td>
                  <td><input class="big" type="text" placeholder="Bundesland" name="bundesland" required></td>
                </tr>
                <tr>
                  <td><input class="big" type="email" placeholder="E-Mail" name="email" required></td>
                  <td><input class="big" type="email" placeholder="E-Mail wiederholen" name="wdhlg-email" required></td>
                </tr>
                <tr>
                  <td><input class="big" type="text" placeholder="Telefon: Vorwahl + Nummer" name="telefon" required></td>
                  <td><label>Firmenkunde: </label><select name="firmenkunde"><option value="0">Nein</option><option value="1">Ja</option></select></td>
                </tr>
            </table>
            
            <br>
            <label class="agb" id="AGB" onmouseover="hoverAGBs('grey')" onmouseout="hoverAGBs('black')" onclick="clickAGBs()">Akzeptieren Sie unsere AGBs</label><input type ="checkbox" name="agb"><br>
            <input type="submit" name="submitReg" value="Abschicken">
            <br>
            </center>
            </div>
        </div>
    </form>
</div>
<!--Register Form Ende -->
<!-- Begin LoginForm -->
<div class="LandingLogin" id="LandingLogin">
            <form action="/php/LoginVerarbeitung.php" method="POST">
                <label id="Loginname" class="LabelLogin">Login:</label><center><input type="text" placeholder="Login" name="LoginName" id="LogLoginname" required></center>
                <label id="LoginPasswort" class="LabelLogin">Passwort:</label><center><input type="text" placeholder="Passwort" name="LoginPasswort" id="LoginPasswort" require></center>
                <input type="submit" class="login" id="login" value=Login>
                <a class="cancel"  id="cancel" onclick="einAusblendenLoginRegForm()">Cancel</a>
                <label class="LabelChkbox" for id="LoginCheckbox">Anmeldedaten merken</label><input class="chkbox" type="checkbox" name="LoginCheckbox" id="LoginCheckbox">
                <label onclick="nichtRegistriertHandler()" class="NotRegistered">Noch keinen Account?</label>
            </form>
        </div>

<body>
    <div class="windowedPage">
        <!-- Start your project here-->
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top windowedPageNavbar" id="navbar">
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
                            <a class="nav-link" aria-current="page" href="./index.php" style="color: white; font-weight: 900">Startseite</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./content/produktangebot.php" style="color: white">Produktangebot</a>
                        </li>
			    <li class="nav-item">
                            <a class="nav-link" href="content/termine.html" style="color: white">Schulungstermine</a>
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
                                    <a class="dropdown-item" href="./content/produktangebot.php?orderBy=Preis%20ASC&kategorie=Schulungen">Corona PCR-Test</a>
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
                    <a class="text-reset me-4" href="./content/warenkorb.html">
                        <i class="fas fa-shopping-cart" style="color: #ffffff"></i>
                        <span id="product_counter" class="badge rounded-pill badge-notification bg-danger">11</span>
                    </a>
                    <!-- Bell icon -->
                    <a class="text-reset me-4" href="#">
                        <i class="fas fa-bell" style="color: #ffffff"></i>
                    </a>
                    <!-- Account icon -->
                    <a onclick="einAusblendenLoginRegForm()" class="text-reset me-3"  >
                        <i class="fas fa-user-circle" id="LoginButton"  style="color: #ffffff"></i>
                    </a>


                </div>
                <!-- Right elements -->
            </div>
        </nav>
        <!-- Ende Navbar -->
        <!-- Background image -->
        <div class="p-5 text-center bg-image" style="background-image: url('./img/vts_logo_anim.gif'); height: 350px">
            <div class="mask" style="background-color: rgba(0, 0, 0, 0);">
                <div class="d-flex justify-content-center align-items-center h-100">
                </div>
            </div>
        </div>
        <!-- Background image -->

        <br />
        <br />
        <br />
        <h1 style="text-align: center">
            Get yourself tested!
        </h1>
        <br />
        <br />
        <h3 style="text-align: center">
            Herzlich Willkommen bei Ihren Virus Testern!
        </h3>
        <br />
        <br />
        <p style="text-align: center">
            Bei uns finden sie Produkte für Ihre Lieben zu Hause und für Ihr Unternehmen zum angenehmen Testen des Corona-Viruses.<br />
            Seit 2021 sind wir für Sie da, sowohl mit Tests als auch mit Schulungen für Tester.<br />
            Schauen Sie sich unsere Produkte gerne an.
            Bei Fragen stehen wir Ihnen gerne zur Verfügung
        </p>

      
        <br />

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
                                <a href="./content/produktangebot.php" class="text-reset">Corona Schnelltests</a>
                            </p>
                            <p>
                                <a href="./content/produktangebot.php" class="text-reset">Corona PCR-Tests</a>
                            </p>
                            <p>
                                <a href="./content/produktangebot.php" class="text-reset">Schulungen</a>
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
                                <a href="./content/agb.html" class="text-reset">ABG</a>
                            </p>
                            <p>
                                <a href="./content/impressum.html" class="text-reset">Impressum</a>
                            </p>
                            <p>
                                <a href="./content/datenschutz.html" class="text-reset">Datenschutz</a>
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

    <script>
        function setTotalAmountOfProductsInCart() {
            var product_counter = document.getElementById('product_counter');
            if (getSumOfProductsInCart() <= 0) {
                product_counter.setAttribute("style", "display: none");
            } else {
                product_counter.setAttribute("style", "display: block");
                product_counter.innerHTML = getSumOfProductsInCart();
            }
        }


        function getCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "{}";
        }

        function getSumOfProductsInCart() {
            var cart_cookie = JSON.parse(getCookie("cart_cookie"));
            var sum = 0;

            if (cart_cookie != null) {
                Object.keys(cart_cookie).forEach(function (k) {
                    sum = sum + cart_cookie[k];
                });
            }
            return sum;
        }

        setTotalAmountOfProductsInCart();
    
    </script>



    <!-- End your project here-->
    <!-- MDB -->
    <script type="text/javascript" src="./js/mdb.min.js"></script>
    <!-- Custom scripts -->
	
    <?php
        if(isset($_SESSION))
        {
            if(isset($_SESSION["login"]))
            {
            echo "<script type=text/javascript>console.log($_SESSION[login]);</script>";
            switch($_SESSION["login"])
            {
                case 0 : break;
                case 1 : break;
                default : break;
            }
            }
            else
            {
                $_SESSION["login"] = 0;
            }
        }

    ?>
    
   <!-- <script type="text/javascript" src="./src/simple-notify/simple-notify.min.js"></script>-->
    <script type="text/javascript" src="/js/functionScripts.js"></script>
    <script type=text/javascript src=./js/index.js><?php echo "checkLogin($_SESSION[login])</script>"?>;

</body>
</html>


