<?php SESSION_START();

?>


<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type"text/css" href="style/style.css" />
<link rel="icon" type="image/png" href="/logo.png" >
</head>
<body>
<script type="text/javascript" src="/scripts/scripts.js"></script>

  

  <div class="LandingLogin" id="LandingLogin">
    <form action="../scripts/LoginVerarbeitung.php" method="POST">
      <label id="Loginname" class="LabelLogin">Login:</label><center><input type="text" placeholder="Login" name="LoginName" id="LogLoginname" required></center>
      <label id="LoginPasswort" class="LabelLogin">Passwort:</label><center><input type="text" placeholder="Passwort" name="LoginPasswort" id="LoginPasswort" require></center>
      <input type="submit" class="login" id="login" value=Login>
      <a class="cancel"  id="cancel" onclick="einAusblendenLoginForm('ausblenden')">Cancel</a>
      <label class="LabelChkbox" for id="LoginCheckbox">Anmeldedaten merken</label><input class="chkbox" type="checkbox" name="LoginCheckbox" id="LoginCheckbox">
      <label onclick="nichtRegistriertHandler()" class="NotRegistered">Noch keinen Account?</label>
    </form>
  </div>

  <div class="RegisterForm" id="RegisterForm" onmouseout="">
    <form action="../scripts/RegistrierungsVerarbeitung.php" method="POST">
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
                  <td><input class="big" type="text" placeholder="Stra�e" name="strasse" required></td>
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

<div class="header">
  <h1>Virus Test</h1>
  <p>Wir testen Sie!</p>
  <link rel="stylesheet" type"text/css" href="style/style.css" />
</div>

<div class="navbar">
  <a href="index.html">Startseite</a>
  <a href="content/produktangebote.html">Produktangebot</a>
  <a href="https://www.bundesregierung.de/breg-de/themen/coronavirus">Coronainformationen</a>
  <a onclick="einAusblendenLoginForm('toggle')" class="right" id="LoginButton">Login</a>
  <a href="content/Warenkorb.html" class="loggedInRight" id="WarenkorbButton">Warenkorb</a>
  
</div>

<div class="content">
<h1>Herzlich Willkommen bei Ihren Virus Testern</h1>

	<p onclick="performLogin()">
    Bei uns finden sie Produkte f�r Ihre lieben zu Hause und f�r Ihr Gesundheitsunternehmen zum angenehmen testen des Corona-Viruses.<br>
    Seit 2021 sind wir f�r Sie da, sowohl mit Tests als auch mit Schulungen f�r Tester.<br>
    Schauen Sie sich unsere Produkte gerne an.<br>
  </p>
</div>


<div class="footer">
	<p>
		<a href="content/impressum.html"> Impressum</a>
	</p>
</div>
</body>

</html>
<?php
if(isset($_SESSION))
{
    switch($_SESSION['login'])
    {
        case '0' : break;
        case '1' : echo '<script type="text/javascript" > 
        document.getElementById(\'WarenkorbButton\').style.visibility="visible";
        document.getElementById(\'LoginButton\').innerHTML = "Kundenbereich"</script>;'; break;
        default  : break;
    }
    
}

?>
