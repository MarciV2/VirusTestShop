// Funktion wird von Button "Jetzt Kaufen" auf warenkorb.php aufgerufen
// Prüft, ob AGBs und Datenschutz akzeptiert wurden oder Warenkorb leer ist und, ob User eingeloggt ist
// Ansonsten wird User zu kaufen.php weitergeleitet
function jetztKaufen(loggedIn) {
    if (loggedIn) {
        var agb_isChecked = document.getElementById('checkbox_agb').checked;
        var datenschutz_isChecked = document.getElementById('checkbox_datenschutz').checked;

        if (!agb_isChecked) {
            document.getElementById('agb_alert').style.display = "block";
        } else if (!datenschutz_isChecked) {
            document.getElementById('datenschutz_alert').style.display = "block";
        } else if (getSumOfProductsInCart() <= 0) {

        } else {
            window.location.href = './kaufen.php';
        }
    } else {
        new Notify({
            title: unescape("Sie m%FCssen angemeldet sein, um einen Kauf t%E4tigen zu k%F6nnen."),
            effect: 'slide',
            speed: 300,
            status: 'warning',
            autoclose: true,
            autotimeout: 3500,
            position: 'right bottom',
            gap: 20,
            distance: 70
        })
    }

    
}

// Setzt Sichtbarkeit eines alerts (alert_name) auf none
function hideAlert(alert_name) {
    document.getElementById(alert_name).style.display = "none";
}

// Setzt Anzahl eines bestimmten Produktes (packung_id) im Warenkorb neu
// Aktualisiert außerdem Preis des Produktes dieser Reihe neu
function updateAmountOfProduct(packung_id, element_changed, element_to_update, single_price) {

    var new_amount = document.getElementById(element_changed).value;
    new_amount = parseInt(new_amount);
    var element = document.getElementById(element_to_update);
    element.innerHTML = ((new_amount * single_price).toFixed(2)).replace(".", ",");

    var cart_cookie = JSON.parse(getCookie("cart_cookie"));
    cart_cookie[packung_id] = new_amount;

    document.cookie = "cart_cookie=" + JSON.stringify(cart_cookie) + "; path=/";

    updateTotalPrice();
    setTotalAmountOfProductsInCart();
}


// Löscht Produkt aus Warenkorb aus cart_cookie und aus der Seite selbst
// Gibt daraufhin ein Notify darüber aus
function removeCartRow(packung_id, element_to_remove, name) {
    var cart_cookie = JSON.parse(getCookie("cart_cookie"));
    delete cart_cookie[packung_id];
    document.cookie = "cart_cookie=" + JSON.stringify(cart_cookie) + "; path=/";

    document.getElementById(element_to_remove).remove();

    new Notify({
        title: "Aus Einkaufswagen entfernt",
        text: name,
        effect: 'slide',
        speed: 300,
        status: 'warning',
        autoclose: true,
        autotimeout: 3500,
        position: 'right bottom',
        gap: 20,
        distance: 70
    })

    updateTotalPrice();
    setTotalAmountOfProductsInCart();
}


// Funktion setzt Gesamtpreis im Warenkorb neu
// Wird aufgerufen, sobald Anzahl einer Reihe (-> eines Produktes) aktualisiert wird
function updateTotalPrice() {
    var all_price_elements = document.querySelectorAll('*[id^="price"]');
    var sum = 5;

    for (var i = 0; i < all_price_elements.length; i++) {
        sum = sum + parseFloat((all_price_elements[i].innerHTML).replace(",", "."));
    }

    sum_total = sum.toFixed(2) + " EUR";
    sum_total = sum_total.replace(".", ",");

    document.getElementById("total_price").innerHTML = sum_total;

    sum_mwst = sum * 0.19;
    sum_mwst = sum_mwst.toFixed(2) + " EUR";
    sum_mwst = sum_mwst.replace(".", ",");

    document.getElementById("mwst_price").innerHTML = sum_mwst;
}

// Setzt Anzahl der Produkte im Warenkorb (-> rotes Badge in Navbar am Warenkorb-Icon)
function setTotalAmountOfProductsInCart() {
    var product_counter = document.getElementById("product_counter");
    if (getSumOfProductsInCart() <= 0) {
        product_counter.setAttribute("style", "display: none");
    } else {
        product_counter.setAttribute("style", "display: block");
        product_counter.innerHTML = getSumOfProductsInCart();
    }
}

// Funktion gibt Cookie-Wert abhängig vom Cookie-Namen (cname) zurück
// Funktion ist speziell für cart_cookie, da im Falle eines leeren Warenkorbes ein leere JSON-String zurückgegeben wird (-> {})
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

// Funktion durchläuft JSON-String des cart_cookies summiert dabei alle Produkte auf
// -> gibt Summe aller Produkte im Warenkorb zurück 
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


//setzt Anzahl der Produkte im Warenkorb bei Seitenaufruf
setTotalAmountOfProductsInCart();

updateTotalPrice();
