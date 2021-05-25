function addProductToCart(product_name, product_id) {
    new Notify({
        title: unescape("Zu Einkaufswagen hinzugef%FCgt"),
        text: product_name,
        effect: 'slide',
        speed: 300,
        status: 'success',
        autoclose: true,
        autotimeout: 3500,
        position: 'right bottom',
        gap: 20,
        distance: 70
    })

    var cart_cookie = JSON.parse(getCookie("cart_cookie"));
    var current_number_of_product = cart_cookie[product_id];

    if (!current_number_of_product) {
        current_number_of_product = 0;
    }

    current_number_of_product = current_number_of_product + 1;
    cart_cookie[product_id] = current_number_of_product;

    document.cookie = "cart_cookie=" + JSON.stringify(cart_cookie) + "; path=/";


    setTotalAmountOfProductsInCart();
}

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