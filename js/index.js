//Zum überprüfen
function checkLogin(login) {
    console.log("Test checkLogin" + login);
}
//Weiterleitung auf AGB von dem Registrierungsform
function clickAGBs() {
    window.location = "/content/agb.html";
}
//Funktion prüft ob passwort bei Registrierung gleich ist wenn nicht werden die Felder gereinigt und ein alert "Passwörter müssen gleich sein!" wird angezeigt
function pwpruefen() {
    var pw1 = document.getElementById("passwort").value;
    var pw2 = document.getElementById("wdhlg-passwort").value;
    var result = pw1.localeCompare(pw2);

    if (result) {
        alert("Passwörter müssen gleich sein!");
        pw1 = document.getElementById("passwort").value = null;
        pw2 = document.getElementById("wdhlg-passwort").value = null;
        document.getElementById("passwort").focus();
        return false;
    }
}
//Funktion prüft ob mail bei Registrierung gleich ist wenn nicht werden die Felder gereinigt und ein alert "Emails müssen gleich sein!" wird angezeigt
function emailchecken() {
    var email1 = document.getElementById("email").value;
    var email2 = document.getElementById("wdhlg-email").value;
    var result = email1.localeCompare(email2);

    if (result) {

        alert("Emails müssen gleich sein!");
        email1 = document.getElementById("email").value = null;
        email2 = document.getElementById("wdhlg-email").value = null;
        document.getElementById("email").focus();
        return false;
    }
}
//Logout script löscht user session somit muss sich neu angemeldet werden
function logout() {
    document.cookie = "PHPSESSID=; path=/";
    location.reload();
    document.cookie = "cart_cookie={}; path=/";
}

