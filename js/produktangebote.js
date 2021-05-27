function addProductToCart(product_name, product_id, product_count) {

    console.log(product_id);
    console.log(product_name);
    console.log(product_count);

    var notifyPName = product_name;
    if (product_count != 1) notifyPName = "(" + product_count + "x) " + product_name;

    new Notify({
        title: unescape("Zu Einkaufswagen hinzugef%FCgt"),
        text: notifyPName,
        effect: 'slide',
        speed: 300,
        status: 'success',
        autoclose: true,
        autotimeout: 3500,
        position: 'right bottom',
        gap: 20,
        distance: 70
    })
}
   

function setTotalAmountOfProductsInCart() {
    var product_counter = document.getElementById("product_counter");
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
    var cart_cookie = JSON.parse(readCookie("cart_cookie"));
    var sum = 0;

    if (cart_cookie != null) {
        Object.keys(cart_cookie).forEach(function (k) {
            sum = sum + cart_cookie[k];
        });
    }
    return sum;
}

setTotalAmountOfProductsInCart();