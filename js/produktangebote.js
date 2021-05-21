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

    var chart_cookie = JSON.parse(getCookie("chart_cookie"));
    var current_number_of_product = chart_cookie[product_id];

    if (!current_number_of_product) {
        current_number_of_product = 0;
    }

    current_number_of_product = current_number_of_product + 1;
    chart_cookie[product_id] = current_number_of_product;

    document.cookie = "chart_cookie=" + JSON.stringify(chart_cookie) + "; path=/";


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
    return "{}";
}

function getSumOfProductsInChart() {
    var chart_cookie = JSON.parse(getCookie("chart_cookie"));
    var sum = 0;

    Object.keys(chart_cookie).forEach(function (k) {
        sum = sum + chart_cookie[k];
    });

    return sum;
}

setTotalAmountOfProductsInChart();