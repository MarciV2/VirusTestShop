<?php
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
                                    <a class="dropdown-item" href="#">Corona PCR-Test</a>
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
                    <a class="text-reset me-4" href="./warenkorb.html">
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
            <div class="row">
                <div class="col-xl-2">
                    <div class="card itemCard" style="padding: 5px; height: 100%">
                        <h4 style="padding-top: 20px; padding-left: 10px; color: #1E90FF">
                            Kategorien
                        </h4>
                        <div style="padding-left: 20px">
                            <a href="#">
                                <div>Corona Schnelltests</div>
                            </a>
                            <a href="#">
                                <div>Corona PCR-Tests</div>
                            </a>
                            <a href="#">
                                <div>Schulungen</div>
                            </a>
                        </div>


                    </div>
                </div>
                <div class="col-xl-10" id="product_container">

                    <div class="card itemCard" style="padding: 5px">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex justify-content-start">
                                    <h6 style="padding-top: 12px; padding-left: 10px; padding-right: 10px; color: #1E90FF"> Sortierung: </h6>
                                    <select class="select" style="width: 100%">
                                        <option value="price_asc">Preis aufsteigend</option>
                                        <option value="price_desc">Preis absteigend</option>
                                        <option value="amount_asc">Menge aufsteigend</option>
                                        <option value="amount_desc">Menge absteigend</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">

                            </div>

                            <div class="col-md-4">
                                <div style="text-align: right; padding-top: 10px; padding-right: 10px; padding-right: 10px; color: #1E90FF">
                                    16 Artikel gefunden
                                </div>
                            </div>
                        </div>
                    </div>
                  

                    <script>
                        var product_names = ["1x Corona Schnelltest", "10x Corona Schnelltest", "100x Corona Schnelltest", "500x Corona Schnelltest", "1000x Corona Schnelltest", "3000x Corona Schnelltest"];
                        var product_descriptions = ["test"];
                        var product_ids = [0, 1, 2, 3, 4, 5];



                        for (var i = 0; i < 2; i++) {

                            var new_item_row = document.createElement('div');
                            new_item_row.setAttribute("class", "row no-gutters");
                            new_item_row.setAttribute("id", "item_row" + i);

                            for (var j = 1; j < 4; j++) {

                                var product_name = product_names[(3 * i) + j - 1];
                                var product_description = "ANBIO CORONA SPUCK SCHNELLTEST COVID-19 (Einzelverpackt für die Eigenanwendung)";
                                var product_id = product_ids[(3 * i) + j - 1];

                                var newChild = "<div class='card itemCard'>";
                                newChild = newChild + "<div class='p-5 text-center bg-image' style=\"background-image: url('https://www.disapo.de/documents/products/Detailansicht/17295755-coronatest.jpeg'); height: 350px; background-size : contain\">";
                                newChild = newChild + "<div style='position:absolute; top: 0; right: 0; margin: 20px'>";
                                newChild = newChild + "<span class='badge' style='background-color: #1E90FF; float: right; font-size:larger'>4,99€</span>";
                                newChild = newChild + "</div>";
                                newChild = newChild + "</div>";
                                newChild = newChild + "<div class='card-body'>";
                                newChild = newChild + "<h5 class='card-title'>" + product_name + "</h5>";
                                newChild = newChild + "<p>";
                                newChild = newChild + product_description;
                                newChild = newChild + "</p>";
                                newChild = newChild + "<div class='row no-gutters'>";
                                newChild = newChild + "<div class='col-md-7'>";
                                newChild = newChild + "<a class='btn btn-primary btn-rounded buttonToChartMarginBottom' onclick=\"addProductToChart(\'" + product_name + "\', " + product_id + ")\" style='display: block; background-color: #1E90FF'>In den Warenkorb</a>";
                                newChild = newChild + "</div>";
                                newChild = newChild + "<div class='col-md-5'>";
                                newChild = newChild + "<a href='./produkt.html' class='btn btn-primary btn-rounded' style='display: block; background-color: #1E90FF'>Details</a>";
                                newChild = newChild + "</div>";
                                newChild = newChild + "</div>";
                                newChild = newChild + "</div>";
                                newChild = newChild + "</div>";

                                var htmlObject = document.createElement('div');
                                htmlObject.setAttribute("class", "col-lg-4 col-md-6");
                                htmlObject.innerHTML = newChild;
                                new_item_row.appendChild(htmlObject);
                            }

                            document.getElementById('product_container').appendChild(new_item_row);

                        }


                    </script>



                </div>
            </div>

            <br />

            <div class="card" style="margin: 10px; padding-top: 15px">
                <nav aria-label="...">
                    <ul class="pagination pagination-circle justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Vorherige Seite</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Nächste Seite</a>
                        </li>
                    </ul>
                </nav>
            </div>
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
                                <a href="./produktangebot.php" class="text-reset">Corona Schnelltests</a>
                            </p>
                            <p>
                                <a href="./produktangebot.php" class="text-reset">Corona PCR-Tests</a>
                            </p>
                            <p>
                                <a href="./produktangebot.php" class="text-reset">Schulungen</a>
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
                                <a href="./agb.html" class="text-reset">ABG</a>
                            </p>
                            <p>
                                <a href="./impressum.html" class="text-reset">Impressum</a>
                            </p>
                            <p>
                                <a href="./datenschutz.html" class="text-reset">Datenschutz</a>
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
</body>
</html>
