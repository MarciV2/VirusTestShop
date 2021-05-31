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