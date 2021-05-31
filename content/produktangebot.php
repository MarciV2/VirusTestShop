<?php
SESSION_START();
error_reporting(0);
include_once("../php/ProduktBereitstellung.php");
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
              
                <!-- Registrierung-Felder -->
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
    <!-- Login Felder-->
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
                              <a class="nav-link" href="./produktangebot.php" style="color: white; font-weight: 900">Produktangebot</a>
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
                      //Einlogstatus abfragen, default: nicht eingeloggt
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
                            //Nur anzeigen wenn eingeloggt (profil, Bestellungen,...)
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
                            //nur anzeigen wenn nicht eingeloggt (Einloggen/Registrieren)
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
        <script>

        //GET-Parameter an URL anhängen
        function URL_add_parameter(url, param, value){
            var hash       = {};
            var parser     = document.createElement('a');
            parser.href    = url;
            var parameters = parser.search.split(/\?|&/);

            for(var i=0; i < parameters.length; i++) {
                if(!parameters[i]) continue;
            var ary      = parameters[i].split('=');
                hash[ary[0]] = ary[1];
            }
            hash[param] = value;
            var list = [];  
            Object.keys(hash).forEach(function (key) {
                list.push(key + '=' + hash[key]);
            });
            parser.search = '?' + list.join('&');
                return parser.href;
            }
                                   
        </script>
        <div style="padding: 1%; background-color: #f9f9f9">
            <div class="row">
                <div class="col-xl-2">
                    <div class="card itemCard" style="padding: 5px; height: 100%">
                        <h4 style="padding-top: 20px; padding-left: 10px; color: #1E90FF">
                            Kategorien
                        </h4>
                        <!-- Liste an Kategorien links, gesuchte kategorien mithilfe von HTTP-Get -->
                        <div style="padding-left: 20px">
                         <a href="#">
                                <div onclick="location.href = URL_add_parameter(location.href, 'kategorie', ' ');">Alle anzeigen</div>
                            </a>
                            <a href="#">
                                <div onclick="location.href = URL_add_parameter(location.href, 'kategorie', 'Corona Schnelltests');">Corona Schnelltests</div>
                            </a>
                            <!--Nur für Medizinische Kunden sichtbar-->
                            <?php
							if($_SESSION["login"]==2) echo "<a href=\"#\">
                                <div onclick=\"location.href = URL_add_parameter(location.href, 'kategorie', 'Corona PCR-Tests');\">Corona PCR-Tests</div>         </a>";
                            ?>
                            
                            <a href="#">
                                <div onclick="location.href = URL_add_parameter(location.href, 'kategorie', 'Schulungen');">Schulungen</div>
                            </a>
                        </div>


                    </div>
                </div>
                <div class="col-xl-10" id="product_container">

                    <div class="card itemCard" style="padding: 5px">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex justify-content-start">
                                    <!-- Sortierungsparameter -->
                                    <h6 style="padding-top: 12px; padding-left: 10px; padding-right: 10px; color: #1E90FF"> Sortierung: </h6>
                                    <select class="select" style="width: 100%" id="selectOrderBy" onchange="onOrderChange()">
                                        <option value="Preis ASC">Preis aufsteigend</option>
                                        <option value="Preis DESC">Preis absteigend</option>
                                        <option value="Packungsgroesse ASC">Packungsgroesse aufsteigend</option>
                                        <option value="Packungsgroesse DESC">Packungsgroesse absteigend</option>
                                    </select>
                                    <script>
                                    function get(name) {
                                        if (name = (new RegExp('[?&]' + encodeURIComponent(name) + '=([^&]*)')).exec(location.search))
                                        return decodeURIComponent(name[1]);
                                    }
                                     if(!get("kategorie")) location.href = URL_add_parameter(location.href, 'kategorie', ' ');
                                    if(!get("orderBy")) location.href = URL_add_parameter(location.href, 'orderBy', document.getElementById("selectOrderBy").value);
                                    else{
                                    var index=0;
                                    switch(get("orderBy")){
                                        case "Preis ASC"  : index=0; break;
                                        case "Preis DESC" : index=1; break;
                                        case "Packungsgroesse ASC"  : index=2; break;
                                        case "Packungsgroesse DESC" : index=3; break;
                                        default : break;

                                    }
                                    document.getElementById("selectOrderBy").selectedIndex=index;
                                    }

                                    

                                    function onOrderChange(){
                                    location.href = URL_add_parameter(location.href, 'orderBy', document.getElementById("selectOrderBy").value);
                                       }
                                    </script>
                                </div>
                            </div>
                            <div class="col-md-4">

                            </div>

                            <div class="col-md-4">
                                <div  id="artikel_count" style="text-align: right; padding-top: 10px; padding-right: 10px; padding-right: 10px; color: #1E90FF">
                                    0 Artikel gefunden
                                </div>
                            </div>
                        </div>
                    </div>
                    


                   <script>

                   function readCookie(name) {
                        var nameEQ = name + "=";
                        var ca = document.cookie.split(';');
                        for(var i=0;i < ca.length;i++) {
                            var c = ca[i];
                            while (c.charAt(0)==' ') c = c.substring(1,c.length);
                            if (c.indexOf(nameEQ) == 0) return decodeURIComponent(c.substring(nameEQ.length,c.length)).replaceAll("+"," ");
                        }
                        return null;
                   }


                   var packungen = JSON.parse(readCookie("PackungCookie"));
                   console.log(packungen);
                   //Anzeige gefundene Artikel aktualisieren
                   document.getElementById("artikel_count").innerText = packungen.length+ " Artikel gefunden";

                   var new_item_row = document.createElement('div');
                            new_item_row.setAttribute("class", "row no-gutters");
                            new_item_row.setAttribute("id", "item_row" + i);

                   for(var i=0; i<packungen.length;i++){
                       var packung=packungen[i].split(";");

                       //String für Item-Kachel mit dynamischen Werten aus cookie
                      var itemCard = "<div class='card itemCard' style=\"height: 95%\">";

                      var product_id=packung[0];
                      var product_name="";
                    if(packung[1]!="") product_name=packung[4] + "x "+packung[1] + " - " + packung[2];
                    else  product_name=packung[4]+"x "+packung[2];
                    var product_description="";
                    if(packung[3].length<=64)product_description=packung[3];
                    else {
                        product_description=packung[3].substring(0,54)+"... <a href='./produkt.php?product_id="+product_id+"'>weiter lesen</a>";
                    }
                    var product_preis=packung[5].replace(".", ",")+"€";

                    itemCard = itemCard + "<div class='p-5 text-center bg-image' style=\"background-image: url('../img/"+product_id+".png'); height: 350px; background-size : contain\">";
                    itemCard = itemCard + "<div style='position:absolute; top: 0; right: 0; margin: 20px'>";
                    itemCard = itemCard + "<span class='badge' style='background-color: #1E90FF; float: right; font-size:larger'>"+product_preis+"</span>";
                    itemCard = itemCard + "</div>";
                    itemCard = itemCard + "</div>";
                    itemCard = itemCard + "<div class='card-body'>";
                    itemCard = itemCard + "<h5 class='card-title'>" + product_name + "</h5>";
                    itemCard = itemCard + "<p>";
                    itemCard = itemCard + product_description;
                    itemCard = itemCard + "</p>";
                    itemCard = itemCard + "<div class='row no-gutters'>";
                    itemCard = itemCard + "<div class='col-md-7'>";
                    itemCard = itemCard + "<a class='btn btn-primary btn-rounded buttonToCartMarginBottom' onclick=\"addProductToCart(\'" + product_name + "\', " + product_id + ", 1)\" style='display: block; background-color: #1E90FF; margin-bottom: 2%'>In den Warenkorb</a>";
                    itemCard = itemCard + "</div>";
                    itemCard = itemCard + "<div class='col-md-5'>";
                    itemCard = itemCard + "<a href='./produkt.php?product_id=" + product_id + "' class='btn btn-primary btn-rounded' style='display: block; background-color: #1E90FF'>Details</a>";
                    itemCard = itemCard + "</div>";
                    itemCard = itemCard + "</div>";
                    itemCard = itemCard + "</div>";
                    itemCard = itemCard + "</div>";

                    var htmlObject = document.createElement('div');
                    htmlObject.setAttribute("class", "col-lg-4 col-md-6");
                    htmlObject.innerHTML = itemCard;
                    new_item_row.appendChild(htmlObject);
                    }

                    document.getElementById('product_container').appendChild(new_item_row);

                    </script>


                </div>
            </div>

            <br />

            
        </div>


        <!-- Footer -->
        <footer class="text-center text-lg-start bg-light text-muted">
            <hr style="margin-top: 0"/>
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
