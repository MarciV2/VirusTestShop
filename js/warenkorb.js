function jetztKaufen() {
    var agb_isChecked = document.getElementById('checkbox_agb').checked;
    var datenschutz_isChecked = document.getElementById('checkbox_datenschutz').checked;

    if (!agb_isChecked) {
        document.getElementById('agb_alert').style.display = "block";
    } else if (!datenschutz_isChecked) {
        document.getElementById('datenschutz_alert').style.display = "block";
    } else if (getSumOfProductsInCart() <= 0) {

    } else {
        window.location.href = './kaufen.html';
    }
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

function hideAlert(alert_name) {
    document.getElementById(alert_name).style.display = "none";
}


function setNewPrice() {
    alert(document.getElementById(event.currentTarget));
}


function updatePriceForRow(element_changed, element_to_update, single_price) {

    var new_amount = document.getElementById(element_changed).value;
    var element = document.getElementById(element_to_update);
    element.innerHTML = ((new_amount * single_price).toFixed(2)).replace(".", ",");

    updateTotalPrice();
}



function removeCartRow(element_to_remove, name) {
    var product_counter = document.getElementById('product_counter');
    var current_amount = product_counter.innerHTML;
    product_counter.innerHTML = parseFloat(current_amount) - 1;

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
}


function updateTotalPrice() {
    var all_price_elements = document.querySelectorAll('*[id^="price"]');
    var sum = 0;

    var s = "";

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

updateTotalPrice();
