var step = 1; //Varible, um Step des Steppers auf kaufen.php zu speichern

var step_1_passed = false;
var step_2_passed = false;
var step_3_passed = false;

var selectedPaymentMethod = null;

var use_alternative_address = false;

// Funktion enabled bzw disabled Eingabemöglichkeiten der alternativen Adresse auf kaufen.php
// Wird durch Klick auf checkbox (kaufen.php -> Step1) aufgerufen
function useAlternativeAddress() {
    if (document.getElementById('useAlternativeAddress').checked) {
        document.getElementById('vorname').setAttribute("disabled", "");
        document.getElementById('nachname').setAttribute("disabled", "");
        document.getElementById('altemail').setAttribute("disabled", "");
        document.getElementById('strasse').setAttribute("disabled", "");
        document.getElementById('hausnummer').setAttribute("disabled", "");
        document.getElementById('plz').setAttribute("disabled", "");
        document.getElementById('stadt').setAttribute("disabled", "");
        document.getElementById('land').setAttribute("disabled", "");
        document.getElementById('bundesland').setAttribute("disabled", "");
        delAlternativeAdress();

    } else {
        document.getElementById('vorname').removeAttribute("disabled");
        document.getElementById('nachname').removeAttribute("disabled");
        document.getElementById('altemail').removeAttribute("disabled");
        document.getElementById('strasse').removeAttribute("disabled");
        document.getElementById('hausnummer').removeAttribute("disabled");
        document.getElementById('plz').removeAttribute("disabled");
        document.getElementById('stadt').removeAttribute("disabled");
        document.getElementById('land').removeAttribute("disabled");
        document.getElementById('bundesland').removeAttribute("disabled");
        getAlternativeAdress();
    }
}

// Funktion wählt Paypal als Zahlungsart aus (visuell als auch für die Variable selectedPaymentMethod)
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

// Funktion wählt Kreditkarte als Zahlungsart aus (visuell als auch für die Variable selectedPaymentMethod)
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

// Funktion wählt Giropay als Zahlungsart aus (visuell als auch für die Variable selectedPaymentMethod)
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

// Funktion um per Klick auf Step im Stepper direkt auf ersten Step zu gelangen
function goToStep1() {
    step = 1;
    document.getElementById('button_previous').setAttribute("style", "display: none; background-color: #1E90FF; margin-bottom: 20px");
    document.getElementById('button_next').setAttribute("style", "display: block; background-color: #1E90FF; margin-bottom: 20px");
    setStepperColors();
}

// Funktion um per Klick auf Step im Stepper direkt auf zweiten Step zu gelangen (Step 2 muss hierfür bereits abgeschlossen worden sein)
function goToStep2() {
    if (step_2_passed) {
        step = 2;
        document.getElementById('button_previous').setAttribute("style", "display: block; background-color: #1E90FF; margin-bottom: 20px");
        document.getElementById('button_next').setAttribute("style", "display: block; background-color: #1E90FF; margin-bottom: 20px");
        setStepperColors();
    }
}

// Funktion um per Klick auf Step im Stepper direkt auf dritten Step zu gelangen (Step 3 muss hierfür bereits abgeschlossen worden sein)
function goToStep3() {
    if (step_3_passed) {
        step = 3;
        document.getElementById('button_previous').setAttribute("style", "display: block; background-color: #1E90FF; margin-bottom: 20px");
        document.getElementById('button_next').setAttribute("style", "display: none; background-color: #1E90FF; margin-bottom: 20px");
        setStepperColors();
    }
}

// Funktion um über den Button "Weiter"  durch die Steps des Steppers navigieren zu können
function nextStep() {
    if (step == 1) {
        if (document.getElementById('useAlternativeAddress').checked == false) {
            if (!checkValidation()) {
                document.getElementById('lieferadresse_alert').setAttribute("style", "background-color: #ff9c9c; color: #6e0000; padding: 15px; margin-top: 20px; border-radius: 4px; display: block");
            } else {
                document.getElementById('lieferadresse_alert').setAttribute("style", "display: none");
                step = step + 1;
                document.getElementById('button_previous').setAttribute("style", "display: block; background-color: #1E90FF; margin-bottom: 20px");
                setStepperColors();
            }
        } else {
            step = step + 1;
            document.getElementById('button_previous').setAttribute("style", "display: block; background-color: #1E90FF; margin-bottom: 20px");
            setStepperColors();
        }
    } else if (step == 2) {
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

// Funktion um über den Button "Zurück"  durch die Steps des Steppers navigieren zu können
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

// Funktion setzt Stepper Farben abhängig von 1. bereits durchlaufenen Steps -> grüne Farbe
//                                            2. dem Ausgewählten Step -> dicke Schrift
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


// Funktion überprüft, ob alle auszufüllenden Felder ausgefüllt wurden
// Falls nein wird false zurückgegeben
function checkValidation() {
    formCorrect = true;

    if (document.getElementById('vorname').value == "") {
        formCorrect = false;
    }
    if (document.getElementById('nachname').value == "") {
        formCorrect = false;
    }
    if (document.getElementById('altemail').value == "") {
        formCorrect = false;
    }
    if (document.getElementById('strasse').value == "") {
        formCorrect = false;
    }
    if (document.getElementById('hausnummer').value == "") {
        formCorrect = false;
    }
    if (document.getElementById('plz').value == "") {
        formCorrect = false;
    }
    if (document.getElementById('stadt').value == "") {
        formCorrect = false;
    }
    if (document.getElementById('land').value == "") {
        formCorrect = false;
    }

    return formCorrect;
}


function getPayMethodInt(payMethod) //setze Cookie für die Kaufmethode
{
    switch (payMethod)
    {
        case "paypal": document.cookie = 'pay = 1;path=/php'; break;
        case "credit": document.cookie = 'pay = 2;path=/php'; break;
        case "giro": document.cookie = 'pay = 3;path=/php'; break;
        default: break;
    }

}

function getAlternativeAdress() //setze altAdress Cookie
{
    document.cookie = 'altAdresse = 1;path=/php';
}

function delAlternativeAdress() //lösche altAdressCookie
{
    document.cookie = 'altAdresse = "";path=/php; expires=Thu, 01 Jan 1970 00:00:01 GMT";'
}