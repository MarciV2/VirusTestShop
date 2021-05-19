function addProductToChart(product_name, product_id) {
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

    var amount_of_this_product_in_chart = parseInt(getCookie("product_id_" + product_id));
    
    document.cookie = "product_id_" + product_id + "=" + (amount_of_this_product_in_chart + 1);

    setTotalAmountOfProductsInChart();
}

function setTotalAmountOfProductsInChart() {
    var product_counter = document.getElementById('product_counter');
    product_counter.innerHTML = getSumOfProductsInChart();
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
    return 0;
}

function getSumOfProductsInChart() {
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');

    var total_amount = 0;
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        var cookie = c.split('=');
        var number = parseInt(cookie[1]);
        total_amount = total_amount + number;
    }

    return total_amount;
}

setTotalAmountOfProductsInChart();