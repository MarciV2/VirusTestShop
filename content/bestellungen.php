﻿<!DOCTYPE html>
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
                              <a class="nav-link" href="./termine.html" style="color: white">Schulungstermine</a>
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
                      <a class="text-reset me-4" href="./warenkorb.html">
                          <i class="fas fa-shopping-cart" style="color: #ffffff"></i>
                          <span id="product_counter" class="badge rounded-pill badge-notification bg-danger" style="display: none">11</span>
                      </a>
                      <!-- Account icon -->
                      <a class="text-reset me-3"
                         href="#"
                         id="navbarDropdownMenuLink"
                         role="button"
                         data-mdb-toggle="dropdown"
                         aria-expanded="false">
                          <i class="fas fa-user-circle" style="color: #ffffff"></i>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                          <li>
                              <a class="dropdown-item" href="#">Profil</a>
                          </li>
                          <li>
                              <a class="dropdown-item" href="./bestellungen.php">Bestellungen</a>
                          </li>
                          <li><hr class="dropdown-divider" /></li>
                          <li>
                              <a class="dropdown-item" href="#">Logout</a>
                          </li>
                      </ul>
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
                      



                      <div class="accordion accordion-flush" id="accordionFlushExample">
                          <div class="accordion-item">
                              <h2 class="accordion-header" id="flush-headingOne">
                                  <button class="accordion-button collapsed"
                                          type="button"
                                          data-mdb-toggle="collapse"
                                          data-mdb-target="#flush-collapseOne"
                                          aria-expanded="false"
                                          aria-controls="flush-collapseOne">
                                      <div class="row" style="width: 100%">
                                          <div class="col-8">
                                              Bestellung vom 26.05.2021
                                          </div>
                                          <div class="col-4 d-flex justify-content-end">
                                              9999,99 €
                                          </div>
                                      </div>
                                  </button>
                              </h2>
                              <div id="flush-collapseOne"
                                   class="accordion-collapse collapse"
                                   aria-labelledby="flush-headingOne">
                                  <div class="accordion-body">

                                      <div class="row">
                                          <div class="col-lg-8 col-sm-8 col-7">
                                              <h6 style="padding-top: 10px; padding-left: 20px">Produkt </h6>
                                          </div>
                                          <div class="col-lg-2 col-sm-2 col-3">
                                              <h6 style="padding-top: 10px">Anzahl </h6>
                                          </div>
                                          <div class="col-lg-2 col-sm-2 col-2 d-flex justify-content-end">
                                              <h6 style="padding-top: 10px; padding-right: 20px">Preis</h6>
                                          </div>
                                      </div>

                                      <div style="height: 2px; background-color: gainsboro"></div>

                                      <ul class="list-group list-group-flush" id="list_of_elements_in_cart">

                                          <li class="list-group-item">
                                              <div class="row">
                                                  <div class="col-lg-8 col-sm-8 col-7">
                                                      <div class="row">
                                                          <div class="col-lg-2 col-3 d-md-block d-none">
                                                              <img src="https://www.disapo.de/documents/products/Detailansicht/17295755-coronatest.jpeg" height="60px" />
                                                          </div>
                                                          <div class="col-lg-10 col-md-9 col-12 d-flex align-items-center">
                                                              <h5 style="padding-top: 7px">1x Corona Schnelltest </h5>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-2 col-sm-2 col-3 d-flex align-items-center">
                                                      <h6 style="padding-top: 7px; margin-left: 5%">999</h6>
                                                  </div>
                                                  <div class="col-lg-2 col-sm-2 col-2 d-flex align-items-center justify-content-end">
                                                      <h6 style="padding-top: 7px; margin-left: 5%">9999.99€</h6>
                                                  </div>
                                              </div>
                                          </li>

                                          <li class="list-group-item">
                                              <div class="row">
                                                  <div class="col-lg-8 col-sm-8 col-7">
                                                      <div class="row">
                                                          <div class="col-lg-2 col-3 d-md-block d-none">
                                                              <img src="https://www.disapo.de/documents/products/Detailansicht/17295755-coronatest.jpeg" height="60px" />
                                                          </div>
                                                          <div class="col-lg-10 col-md-9 col-12 d-flex align-items-center">
                                                              <h5 style="padding-top: 7px">1x Corona Schnelltest </h5>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-2 col-sm-2 col-3 d-flex align-items-center">
                                                      <h6 style="padding-top: 7px; margin-left: 5%">999</h6>
                                                  </div>
                                                  <div class="col-lg-2 col-sm-2 col-2 d-flex align-items-center justify-content-end">
                                                      <h6 style="padding-top: 7px; margin-left: 5%">9999.99€</h6>
                                                  </div>
                                              </div>
                                          </li>

                                          <li class="list-group-item">
                                              <div class="row">
                                                  <div class="col-lg-8 col-sm-8 col-7">
                                                      <div class="row">
                                                          <div class="col-lg-2 col-3 d-md-block d-none">
                                                              <img src="https://www.disapo.de/documents/products/Detailansicht/17295755-coronatest.jpeg" height="60px" />
                                                          </div>
                                                          <div class="col-lg-10 col-md-9 col-12 d-flex align-items-center">
                                                              <h5 style="padding-top: 7px">1x Corona Schnelltest </h5>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-2 col-sm-2 col-3 d-flex align-items-center">
                                                      <h6 style="padding-top: 7px; margin-left: 5%">999</h6>
                                                  </div>
                                                  <div class="col-lg-2 col-sm-2 col-2 d-flex align-items-center justify-content-end">
                                                      <h6 style="padding-top: 7px; margin-left: 5%">9999.99€</h6>
                                                  </div>
                                              </div>
                                          </li>

                                          <li class="list-group-item">
                                              <div class="row">
                                                  <div class="col-lg-8 col-sm-8 col-7">
                                                      <div class="row">
                                                          <div class="col-lg-2 col-3 d-md-block d-none">
                                                              <img src="https://www.disapo.de/documents/products/Detailansicht/17295755-coronatest.jpeg" height="60px" />
                                                          </div>
                                                          <div class="col-lg-10 col-md-9 col-12 d-flex align-items-center">
                                                              <h5 style="padding-top: 7px">1x Corona Schnelltest </h5>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-2 col-sm-2 col-3 d-flex align-items-center">
                                                      <h6 style="padding-top: 7px; margin-left: 5%">999</h6>
                                                  </div>
                                                  <div class="col-lg-2 col-sm-2 col-2 d-flex align-items-center justify-content-end">
                                                      <h6 style="padding-top: 7px; margin-left: 5%">9999.99€</h6>
                                                  </div>
                                              </div>
                                          </li>

                                      </ul>

                                      <div style="height: 1px; background-color: gainsboro"></div>


                                      <div class="row" style="padding: 2% 2%; font-size: small">
                                          <div class="col-md-3">
                                              <div class="row">
                                                  <div class="col-6">
                                                      Bestelldatum:
                                                  </div>
                                                  <div class="col-6 d-flex justify-content-end">
                                                      26.05.2021
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-6">
                                                      Versanddatum:
                                                  </div>
                                                  <div class="col-6 d-flex justify-content-end">
                                                      26.05.2021
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-6">
                                                      Bestell-Nr:
                                                  </div>
                                                  <div class="col-6 d-flex justify-content-end">
                                                      9999-9999-999-2
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
                                                      Hauptstraße 1
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-6">
                                                  </div>
                                                  <div class="col-6 d-flex justify-content-end">
                                                      80999 München
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-6">
                                                  </div>
                                                  <div class="col-6 d-flex justify-content-end">
                                                      Deutschland
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
                                                      9999,99 €
                                                  </div>
                                                  <div class="col-6">
                                                      Davon MwSt (19%):
                                                  </div>
                                                  <div class="col-6 d-flex justify-content-end">
                                                      1999,99 €
                                                  </div>
                                                  <div class="col-6">
                                                      Versandkosten:
                                                  </div>
                                                  <div class="col-6 d-flex justify-content-end">
                                                      99,99 €
                                                  </div>
                                              </div>
                                          </div>
                                      </div>

                                      <div style="height: 1px; background-color: gainsboro"></div>

                                      <div style="font-size: small; padding: 1% 2%">
                                          Probleme mit der Bestellung? Schreiben Sie uns eine Email an corona-testshop@example.com oder rufen Sie uns an unter + 01 234 567 89
                                      </div>
                                  </div>


                              </div>
                          </div>
                          <div class="accordion-item">
                              <h2 class="accordion-header" id="flush-headingTwo">
                                  <button class="accordion-button collapsed"
                                          type="button"
                                          data-mdb-toggle="collapse"
                                          data-mdb-target="#flush-collapseTwo"
                                          aria-expanded="false"
                                          aria-controls="flush-collapseTwo">
                                      <div class="row" style="width: 100%">
                                          <div class="col-8">
                                              Bestellung vom 26.05.2021
                                          </div>
                                          <div class="col-4 d-flex justify-content-end">
                                              9999,99 €
                                          </div>
                                      </div>
                                  </button>
                              </h2>
                              <div id="flush-collapseTwo"
                                   class="accordion-collapse collapse"
                                   aria-labelledby="flush-headingTwo">
                                  <div class="accordion-body">

                                      <div class="row">
                                          <div class="col-lg-8 col-sm-8 col-7">
                                              <h6 style="padding-top: 10px; padding-left: 20px">Produkt </h6>
                                          </div>
                                          <div class="col-lg-2 col-sm-2 col-3">
                                              <h6 style="padding-top: 10px">Anzahl </h6>
                                          </div>
                                          <div class="col-lg-2 col-sm-2 col-2 d-flex justify-content-end">
                                              <h6 style="padding-top: 10px; padding-right: 20px">Preis</h6>
                                          </div>
                                      </div>

                                      <div style="height: 2px; background-color: gainsboro"></div>

                                      <ul class="list-group list-group-flush" id="list_of_elements_in_cart">

                                          <li class="list-group-item">
                                              <div class="row">
                                                  <div class="col-lg-8 col-sm-8 col-7">
                                                      <div class="row">
                                                          <div class="col-lg-2 col-3 d-md-block d-none">
                                                              <img src="https://www.disapo.de/documents/products/Detailansicht/17295755-coronatest.jpeg" height="60px" />
                                                          </div>
                                                          <div class="col-lg-10 col-md-9 col-12 d-flex align-items-center">
                                                              <h5 style="padding-top: 7px">1x Corona Schnelltest </h5>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-2 col-sm-2 col-3 d-flex align-items-center">
                                                      <h6 style="padding-top: 7px; margin-left: 5%">999</h6>
                                                  </div>
                                                  <div class="col-lg-2 col-sm-2 col-2 d-flex align-items-center justify-content-end">
                                                      <h6 style="padding-top: 7px; margin-left: 5%">9999.99€</h6>
                                                  </div>
                                              </div>
                                          </li>

                                          <li class="list-group-item">
                                              <div class="row">
                                                  <div class="col-lg-8 col-sm-8 col-7">
                                                      <div class="row">
                                                          <div class="col-lg-2 col-3 d-md-block d-none">
                                                              <img src="https://www.disapo.de/documents/products/Detailansicht/17295755-coronatest.jpeg" height="60px" />
                                                          </div>
                                                          <div class="col-lg-10 col-md-9 col-12 d-flex align-items-center">
                                                              <h5 style="padding-top: 7px">1x Corona Schnelltest </h5>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-2 col-sm-2 col-3 d-flex align-items-center">
                                                      <h6 style="padding-top: 7px; margin-left: 5%">999</h6>
                                                  </div>
                                                  <div class="col-lg-2 col-sm-2 col-2 d-flex align-items-center justify-content-end">
                                                      <h6 style="padding-top: 7px; margin-left: 5%">9999.99€</h6>
                                                  </div>
                                              </div>
                                          </li>

                                          <li class="list-group-item">
                                              <div class="row">
                                                  <div class="col-lg-8 col-sm-8 col-7">
                                                      <div class="row">
                                                          <div class="col-lg-2 col-3 d-md-block d-none">
                                                              <img src="https://www.disapo.de/documents/products/Detailansicht/17295755-coronatest.jpeg" height="60px" />
                                                          </div>
                                                          <div class="col-lg-10 col-md-9 col-12 d-flex align-items-center">
                                                              <h5 style="padding-top: 7px">1x Corona Schnelltest </h5>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-2 col-sm-2 col-3 d-flex align-items-center">
                                                      <h6 style="padding-top: 7px; margin-left: 5%">999</h6>
                                                  </div>
                                                  <div class="col-lg-2 col-sm-2 col-2 d-flex align-items-center justify-content-end">
                                                      <h6 style="padding-top: 7px; margin-left: 5%">9999.99€</h6>
                                                  </div>
                                              </div>
                                          </li>

                                          <li class="list-group-item">
                                              <div class="row">
                                                  <div class="col-lg-8 col-sm-8 col-7">
                                                      <div class="row">
                                                          <div class="col-lg-2 col-3 d-md-block d-none">
                                                              <img src="https://www.disapo.de/documents/products/Detailansicht/17295755-coronatest.jpeg" height="60px" />
                                                          </div>
                                                          <div class="col-lg-10 col-md-9 col-12 d-flex align-items-center">
                                                              <h5 style="padding-top: 7px">1x Corona Schnelltest </h5>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-2 col-sm-2 col-3 d-flex align-items-center">
                                                      <h6 style="padding-top: 7px; margin-left: 5%">999</h6>
                                                  </div>
                                                  <div class="col-lg-2 col-sm-2 col-2 d-flex align-items-center justify-content-end">
                                                      <h6 style="padding-top: 7px; margin-left: 5%">9999.99€</h6>
                                                  </div>
                                              </div>
                                          </li>

                                      </ul>

                                      <div style="height: 1px; background-color: gainsboro"></div>


                                      <div class="row" style="padding: 2% 2%; font-size: small">
                                          <div class="col-md-3">
                                              <div class="row">
                                                  <div class="col-6">
                                                      Bestelldatum:
                                                  </div>
                                                  <div class="col-6 d-flex justify-content-end">
                                                      26.05.2021
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-6">
                                                      Versanddatum:
                                                  </div>
                                                  <div class="col-6 d-flex justify-content-end">
                                                      26.05.2021
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-6">
                                                      Bestell-Nr:
                                                  </div>
                                                  <div class="col-6 d-flex justify-content-end">
                                                      9999-9999-999-2
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
                                                      Hauptstraße 1
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-6">
                                                  </div>
                                                  <div class="col-6 d-flex justify-content-end">
                                                      80999 München
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-6">
                                                  </div>
                                                  <div class="col-6 d-flex justify-content-end">
                                                      Deutschland
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
                                                      9999,99 €
                                                  </div>
                                                  <div class="col-6">
                                                      Davon MwSt (19%):
                                                  </div>
                                                  <div class="col-6 d-flex justify-content-end">
                                                      1999,99 €
                                                  </div>
                                                  <div class="col-6">
                                                      Versandkosten:
                                                  </div>
                                                  <div class="col-6 d-flex justify-content-end">
                                                      99,99 €
                                                  </div>
                                              </div>
                                          </div>
                                      </div>

                                      <div style="height: 1px; background-color: gainsboro"></div>

                                      <div style="font-size: small; padding: 1% 2%">
                                          Probleme mit der Bestellung? Schreiben Sie uns eine Email an corona-testshop@example.com oder rufen Sie uns an unter + 01 234 567 89
                                      </div>
                                  </div>

                              </div>
                          </div>
                          <div class="accordion-item">
                              <h2 class="accordion-header" id="flush-headingThree">
                                  <button class="accordion-button collapsed"
                                          type="button"
                                          data-mdb-toggle="collapse"
                                          data-mdb-target="#flush-collapseThree"
                                          aria-expanded="false"
                                          aria-controls="flush-collapseThree">
                                      Accordion Item #3
                                  </button>
                              </h2>
                              <div id="flush-collapseThree"
                                   class="accordion-collapse collapse"
                                   aria-labelledby="flush-headingThree">
                                  <div class="accordion-body">

                                      <div class="row">
                                          <div class="col-lg-8 col-sm-8 col-7">
                                              <h6 style="padding-top: 10px; padding-left: 20px">Produkt </h6>
                                          </div>
                                          <div class="col-lg-2 col-sm-2 col-3">
                                              <h6 style="padding-top: 10px">Anzahl </h6>
                                          </div>
                                          <div class="col-lg-2 col-sm-2 col-2 d-flex justify-content-end">
                                              <h6 style="padding-top: 10px; padding-right: 20px">Preis</h6>
                                          </div>
                                      </div>

                                      <div style="height: 2px; background-color: gainsboro"></div>

                                      <ul class="list-group list-group-flush" id="list_of_elements_in_cart">

                                          <li class="list-group-item">
                                              <div class="row">
                                                  <div class="col-lg-8 col-sm-8 col-7">
                                                      <div class="row">
                                                          <div class="col-lg-2 col-3 d-md-block d-none">
                                                              <img src="https://www.disapo.de/documents/products/Detailansicht/17295755-coronatest.jpeg" height="60px" />
                                                          </div>
                                                          <div class="col-lg-10 col-md-9 col-12 d-flex align-items-center">
                                                              <h5 style="padding-top: 7px">1x Corona Schnelltest </h5>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-2 col-sm-2 col-3 d-flex align-items-center">
                                                      <h6 style="padding-top: 7px; margin-left: 5%">999</h6>
                                                  </div>
                                                  <div class="col-lg-2 col-sm-2 col-2 d-flex align-items-center justify-content-end">
                                                      <h6 style="padding-top: 7px; margin-left: 5%">9999.99€</h6>
                                                  </div>
                                              </div>
                                          </li>

                                          <li class="list-group-item">
                                              <div class="row">
                                                  <div class="col-lg-8 col-sm-8 col-7">
                                                      <div class="row">
                                                          <div class="col-lg-2 col-3 d-md-block d-none">
                                                              <img src="https://www.disapo.de/documents/products/Detailansicht/17295755-coronatest.jpeg" height="60px" />
                                                          </div>
                                                          <div class="col-lg-10 col-md-9 col-12 d-flex align-items-center">
                                                              <h5 style="padding-top: 7px">1x Corona Schnelltest </h5>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-2 col-sm-2 col-3 d-flex align-items-center">
                                                      <h6 style="padding-top: 7px; margin-left: 5%">999</h6>
                                                  </div>
                                                  <div class="col-lg-2 col-sm-2 col-2 d-flex align-items-center justify-content-end">
                                                      <h6 style="padding-top: 7px; margin-left: 5%">9999.99€</h6>
                                                  </div>
                                              </div>
                                          </li>

                                          <li class="list-group-item">
                                              <div class="row">
                                                  <div class="col-lg-8 col-sm-8 col-7">
                                                      <div class="row">
                                                          <div class="col-lg-2 col-3 d-md-block d-none">
                                                              <img src="https://www.disapo.de/documents/products/Detailansicht/17295755-coronatest.jpeg" height="60px" />
                                                          </div>
                                                          <div class="col-lg-10 col-md-9 col-12 d-flex align-items-center">
                                                              <h5 style="padding-top: 7px">1x Corona Schnelltest </h5>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-2 col-sm-2 col-3 d-flex align-items-center">
                                                      <h6 style="padding-top: 7px; margin-left: 5%">999</h6>
                                                  </div>
                                                  <div class="col-lg-2 col-sm-2 col-2 d-flex align-items-center justify-content-end">
                                                      <h6 style="padding-top: 7px; margin-left: 5%">9999.99€</h6>
                                                  </div>
                                              </div>
                                          </li>

                                          <li class="list-group-item">
                                              <div class="row">
                                                  <div class="col-lg-8 col-sm-8 col-7">
                                                      <div class="row">
                                                          <div class="col-lg-2 col-3 d-md-block d-none">
                                                              <img src="https://www.disapo.de/documents/products/Detailansicht/17295755-coronatest.jpeg" height="60px" />
                                                          </div>
                                                          <div class="col-lg-10 col-md-9 col-12 d-flex align-items-center">
                                                              <h5 style="padding-top: 7px">1x Corona Schnelltest </h5>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-2 col-sm-2 col-3 d-flex align-items-center">
                                                      <h6 style="padding-top: 7px; margin-left: 5%">999</h6>
                                                  </div>
                                                  <div class="col-lg-2 col-sm-2 col-2 d-flex align-items-center justify-content-end">
                                                      <h6 style="padding-top: 7px; margin-left: 5%">9999.99€</h6>
                                                  </div>
                                              </div>
                                          </li>

                                      </ul>

                                      <div style="height: 1px; background-color: gainsboro"></div>


                                      <div class="row" style="padding: 2% 2%; font-size: small">
                                          <div class="col-md-3">
                                              <div class="row">
                                                  <div class="col-6">
                                                      Bestelldatum:
                                                  </div>
                                                  <div class="col-6 d-flex justify-content-end">
                                                      26.05.2021
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-6">
                                                      Versanddatum:
                                                  </div>
                                                  <div class="col-6 d-flex justify-content-end">
                                                      26.05.2021
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-6">
                                                      Bestell-Nr:
                                                  </div>
                                                  <div class="col-6 d-flex justify-content-end">
                                                      9999-9999-999-2
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
                                                      Hauptstraße 1
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-6">
                                                  </div>
                                                  <div class="col-6 d-flex justify-content-end">
                                                      80999 München
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-6">
                                                  </div>
                                                  <div class="col-6 d-flex justify-content-end">
                                                      Deutschland
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
                                                      9999,99 €
                                                  </div>
                                                  <div class="col-6">
                                                      Davon MwSt (19%):
                                                  </div>
                                                  <div class="col-6 d-flex justify-content-end">
                                                      1999,99 €
                                                  </div>
                                                  <div class="col-6">
                                                      Versandkosten:
                                                  </div>
                                                  <div class="col-6 d-flex justify-content-end">
                                                      99,99 €
                                                  </div>
                                              </div>
                                          </div>
                                      </div>

                                      <div style="height: 1px; background-color: gainsboro"></div>

                                      <div style="font-size: small; padding: 1% 2%">
                                          Probleme mit der Bestellung? Schreiben Sie uns eine Email an corona-testshop@example.com oder rufen Sie uns an unter + 01 234 567 89
                                      </div>
                                  </div>

                              </div>
                          </div>
                      </div>



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

      <!-- End your project here-->
      <!-- MDB -->
      <script type="text/javascript" src="../js/mdb.min.js"></script>
      <script src="../js/cartNumber.js"></script>

  </body>
</html>