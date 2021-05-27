var step = 1;

var step_1_passed = false;
var step_2_passed = false;
var step_3_passed = false;

var selectedPaymentMethod = null;

var use_alternative_address = false;

function useAlternativeAddress() {
    if (document.getElementById('useAlternativeAddress').checked) {
        document.getElementById('vorname').setAttribute("disabled", "");
        document.getElementById('nachname').setAttribute("disabled", "");
        document.getElementById('email').setAttribute("disabled", "");
        document.getElementById('strasse').setAttribute("disabled", "");
        document.getElementById('hausnummer').setAttribute("disabled", "");
        document.getElementById('plz').setAttribute("disabled", "");
        document.getElementById('stadt').setAttribute("disabled", "");
        document.getElementById('land').setAttribute("disabled", "");
        document.getElementById('bundesland').setAttribute("disabled", "");
    } else {
        document.getElementById('vorname').removeAttribute("disabled");
        document.getElementById('nachname').removeAttribute("disabled");
        document.getElementById('email').removeAttribute("disabled");
        document.getElementById('strasse').removeAttribute("disabled");
        document.getElementById('hausnummer').removeAttribute("disabled");
        document.getElementById('plz').removeAttribute("disabled");
        document.getElementById('stadt').removeAttribute("disabled");
        document.getElementById('land').removeAttribute("disabled");
        document.getElementById('bundesland').removeAttribute("disabled");
    }
}


function selectPaypal() {
    selectedPaymentMethod = "paypal";
    document.getElementById('payment_paypal').setAttribute("class", "list-group-item itemCardPaymentSelected");
    document.getElementById('checkmark_paypal').setAttribute("style", "padding-top: 3px; margin-right: 3%; display: block");
    document.getElementById('payment_credit').setAttribute("class", "list-group-item itemCardPayment");
    document.getElementById('checkmark_credit').setAttribute("style", "padding-top: 3px; margin-right: 3%; display: none");
    document.getElementById('payment_giro').setAttribute("class", "list-group-item itemCardPayment");
    document.getElementById('checkmark_giro').setAttribute("style", "padding-top: 3px; margin-right: 3%; display: none");
    document.getElementById('payment_alert').setAttribute("style", "background-color: #ff9c9c; color: #6e0000; padding: 15px; margin-top: 20px; border-radius: 4px; display: none");
    getPayMethodInt(selectedPaymentMethod);
}

function selectCreditcard() {
    selectedPaymentMethod = "credit";
    document.getElementById('payment_paypal').setAttribute("class", "list-group-item itemCardPayment");
    document.getElementById('checkmark_paypal').setAttribute("style", "padding-top: 3px; margin-right: 3%; display: none");
    document.getElementById('payment_credit').setAttribute("class", "list-group-item itemCardPaymentSelected");
    document.getElementById('checkmark_credit').setAttribute("style", "padding-top: 3px; margin-right: 3%; display: block");
    document.getElementById('payment_giro').setAttribute("class", "list-group-item itemCardPayment");
    document.getElementById('checkmark_giro').setAttribute("style", "padding-top: 3px; margin-right: 3%; display: none");
    document.getElementById('payment_alert').setAttribute("style", "background-color: #ff9c9c; color: #6e0000; padding: 15px; margin-top: 20px; border-radius: 4px; display: none");
    getPayMethodInt(selectedPaymentMethod);
}

function selectGiropay() {
    selectedPaymentMethod = "giro";
    document.getElementById('payment_paypal').setAttribute("class", "list-group-item itemCardPayment");
    document.getElementById('checkmark_paypal').setAttribute("style", "padding-top: 3px; margin-right: 3%; display: none");
    document.getElementById('payment_credit').setAttribute("class", "list-group-item itemCardPayment");
    document.getElementById('checkmark_credit').setAttribute("style", "padding-top: 3px; margin-right: 3%; display: none");
    document.getElementById('payment_giro').setAttribute("class", "list-group-item itemCardPaymentSelected");
    document.getElementById('checkmark_giro').setAttribute("style", "padding-top: 3px; margin-right: 3%; display: block");
    document.getElementById('payment_alert').setAttribute("style", "background-color: #ff9c9c; color: #6e0000; padding: 15px; margin-top: 20px; border-radius: 4px; display: none");
    getPayMethodInt(selectedPaymentMethod);
}

function goToStep1() {
    step = 1;
    document.getElementById('button_previous').setAttribute("style", "display: none; background-color: #1E90FF; margin-bottom: 20px");
    document.getElementById('button_next').setAttribute("style", "display: block; background-color: #1E90FF; margin-bottom: 20px");
    setStepperColors();
}

function goToStep2() {
    if (step_2_passed) {
        step = 2;
        document.getElementById('button_previous').setAttribute("style", "display: block; background-color: #1E90FF; margin-bottom: 20px");
        document.getElementById('button_next').setAttribute("style", "display: block; background-color: #1E90FF; margin-bottom: 20px");
        setStepperColors();
    }
}

function goToStep3() {
    if (step_3_passed) {
        step = 3;
        document.getElementById('button_previous').setAttribute("style", "display: block; background-color: #1E90FF; margin-bottom: 20px");
        document.getElementById('button_next').setAttribute("style", "display: none; background-color: #1E90FF; margin-bottom: 20px");
        setStepperColors();
    }
}

function nextStep() {
    if (step == 2) {
        if (selectedPaymentMethod == null) {
            document.getElementById('payment_alert').setAttribute("style", "background-color: #ff9c9c; color: #6e0000; padding: 15px; margin-top: 20px; border-radius: 4px; display: block");
        } else {
            step = step + 1;
            document.getElementById('button_next').setAttribute("style", "display: none; background-color: #1E90FF; margin-bottom: 20px");
            setStepperColors();
        }
    } else {
        if (step < 3) {
            step = step + 1;
        }

        if (step >= 3) {
            document.getElementById('button_next').setAttribute("style", "display: none; background-color: #1E90FF; margin-bottom: 20px");
        }
        document.getElementById('button_previous').setAttribute("style", "display: block; background-color: #1E90FF; margin-bottom: 20px");
        setStepperColors();
    }
    
}

function previousStep() {
    if (step > 1) {
        step = step - 1;
    }
    if (step <= 1) {
        document.getElementById('button_previous').setAttribute("style", "display: none; background-color: #1E90FF; margin-bottom: 20px");
    }
    document.getElementById('button_next').setAttribute("style", "display: block; background-color: #1E90FF; margin-bottom: 20px");
    setStepperColors();
}

function setStepperColors() {
    if (step == 1) {
        if (step_1_passed) {
            document.getElementById('stepper_step_1').setAttribute("class", "stepper-item completed active");
        } else {
            document.getElementById('stepper_step_1').setAttribute("class", "stepper-item active");
        }
        if (step_2_passed) {
            document.getElementById('stepper_step_2').setAttribute("class", "stepper-item completed");
        } else {
            document.getElementById('stepper_step_2').setAttribute("class", "stepper-item");
        }
        if (step_3_passed) {
            document.getElementById('stepper_step_3').setAttribute("class", "stepper-item completed");
        } else {
            document.getElementById('stepper_step_3').setAttribute("class", "stepper-item");
        }
        document.getElementById('tab_lieferadresse').setAttribute("style", "display: block");
        document.getElementById('tab_zahlungsart').setAttribute("style", "display: none");
        document.getElementById('tab_abgeschlossen').setAttribute("style", "display: none");
    } else if (step == 2) {
        if (step_2_passed) {
            document.getElementById('stepper_step_2').setAttribute("class", "stepper-item completed active");
        } else {
            document.getElementById('stepper_step_2').setAttribute("class", "stepper-item active");
        }
        if (step_3_passed) {
            document.getElementById('stepper_step_3').setAttribute("class", "stepper-item completed");
        } else {
            document.getElementById('stepper_step_3').setAttribute("class", "stepper-item");
        }
        step_1_passed = true;
        document.getElementById('stepper_step_1').setAttribute("class", "stepper-item completed");
        document.getElementById('tab_lieferadresse').setAttribute("style", "display: none");
        document.getElementById('tab_zahlungsart').setAttribute("style", "display: block");
        document.getElementById('tab_abgeschlossen').setAttribute("style", "display: none");
    } else if (step == 3) {
        step_2_passed = true;
        step_3_passed = true;

        if (step_3_passed) {
            document.getElementById('stepper_step_3').setAttribute("class", "stepper-item completed active");
        } else {
            document.getElementById('stepper_step_3').setAttribute("class", "stepper-item active");
        }
        document.getElementById('stepper_step_2').setAttribute("class", "stepper-item completed");
        document.getElementById('tab_lieferadresse').setAttribute("style", "display: none");
        document.getElementById('tab_zahlungsart').setAttribute("style", "display: none");
        document.getElementById('tab_abgeschlossen').setAttribute("style", "display: block");
        KaufForm.submit();
    }
}

function getPayMethodInt(payMethod) {
    switch (payMethod)
    {
        case "paypal": document.cookie = 'pay = 1;path=/php'; break;
        case "credit": document.cookie = 'pay = 2;path=/php'; break;
        case "giro": document.cookie = 'pay = 3;path=/php'; break;
        default: break;
    }

}