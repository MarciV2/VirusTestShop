function einAusblendenLoginRegForm()
{
    var loginForm = document.getElementById("LandingLogin");
    var loginFormStyle = getComputedStyle(loginForm);
    var hidden = "hidden";
    var logBool = loginFormStyle.visibility.localeCompare(hidden); // ist 0 bei korrekt

    var registerForm = document.getElementById("RegisterForm");
    var registerFormStyle = getComputedStyle(registerForm);
    var hidden = "hidden";
    var regBool = registerFormStyle.visibility.localeCompare(hidden); // ist 0 bei korrekt
    
    console.log("logBool: " + logBool);
    console.log("regBool: " + regBool);
    console.log("logForm: " + loginFormStyle);
    console.log("regForm: " + registerFormStyle);


    if(logBool && regBool)
    {
        console.log("L:visible R:visible");
        document.getElementById("LandingLogin").style.visibility="hidden";
        document.getElementById("RegisterForm").style.visibility="hidden";
    }
    else if(logBool && !regBool)
    {
        console.log("L:visible R:hidden");
        document.getElementById("LandingLogin").style.visibility="hidden";
    }
    else if(!logBool && regBool)
    {
        console.log("L:hidden R:visible");
        document.getElementById("RegisterForm").style.visibility="hidden";
    }
    else if(!logBool && !regBool)
    {
        console.log("L:hidden R:hidden");
        document.getElementById("LandingLogin").style.visibility="visible"
    }
}

function nichtRegistriertHandler(){
    einAusblendenLoginRegForm();

    var registerForm = document.getElementById("RegisterForm");
    var registerFormStyle = getComputedStyle(registerForm);
    var hidden = "hidden";
    var regBool = registerFormStyle.visibility.localeCompare(hidden);

    if(!regBool)
    {
        document.getElementById("RegisterForm").style.visibility="visible";
    }
}

function hoverAGBs(farbe){
	document.getElementById('AGB').style.color=farbe;
}

function clickAGBs(){
    window.open();
}