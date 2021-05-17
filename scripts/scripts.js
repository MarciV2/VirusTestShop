function einAusblendenLoginForm(einAusblenden)
{
	if(einAusblenden == "toggle")
	{
		var loginForm = document.getElementById("LandingLogin");
		var loginFormStyle = getComputedStyle(loginForm);
		var regForm = document.getElementById("RegisterForm");
		var regFormStyle = getComputedStyle(regForm)
		var hidden = "hidden";
		var logBool = loginFormStyle.visibility.localeCompare(hidden);
		var regBool = regFormStyle.visibility.localeCompare(hidden);

		if(!logBool && !regBool)
		{
			document.getElementById("LandingLogin").style.visibility="visible";
		}
		else if(!logBool && regBool)
		{
			document.getElementById("RegisterForm").style.visibility="hidden";
		}
		else if(logBool && !regBool)
		{
			document.getElementById("LandingLogin").style.visibility="hidden";
		}
		else{
			document.getElementById("RegisterForm").style.visibility="hidden";
			document.getElementById("LandingLogin").style.visibility="hidden";
		}

	}

	if(einAusblenden == "ausblenden")
	{
		document.getElementById('LandingLogin').style.visibility="hidden";		
	}
}

function nichtRegistriertHandler(){
	einAusblendenLoginForm('ausblenden');
		
	var registerForm = document.getElementById('RegisterForm');
	var registerFormStyle = getComputedStyle(registerForm);
	var regFormVisibilityValue = registerFormStyle.visibility;
	var hidden = "hidden"
	var boolHidden = hidden.localeCompare(regFormVisibilityValue);

	if(!boolHidden)
	{
		document.getElementById('RegisterForm').style.visibility="visible";
	}
	else
	{
		document.getElementById('RegisterForm').style.visibility="hidden";
	}
}

function performLogin(){
	class LoginNutzer{
		constructor(LoginName, LoginPasswort,LoginCheckbox){
			this.LoginName = LoginName;
			this.LoginPasswort = LoginPasswort;
			this.LoginCheckbox = LoginCheckbox;
		}
		getLoginName(){
			return this.LoginName
		}
		getLoginPasswort(){
			return this.LoginPasswort;
		}
	}
	let jetzigerNutzer = new LoginNutzer(document.getElementById('Loginname1').value,
	document.getElementById('LoginPasswort').value,
	document.getElementById('LoginCheckbox').value);
	
	jNutzerJSON = JSON.stringify(jetzigerNutzer);
	localStorage.setItem("Nutzer",jNutzerJSON);

}





function hoverAGBs(farbe){
	document.getElementById('AGB').style.color=farbe;
}

function clickAGBs(){
	window.open();
}

/*function checkIfMail() {
	var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	
	if(document.getElementById("emailFeld1").value.match(mailformat))
	{
		alert("E-Mail korrekt.");
		alert.closeForm;
	}
	else
	{
		alert("E-Mail inkorrekt");
	}
	checkIfMail1EqMail2();
}

function checkifMail1EqMail2()
{
	if(document.getElementById("emailFeld2").value.match(document.getElementById("emailFeld1").value))
	{
		alert("E-Mails korrekt.");
	}
	else
	{
		alert("E-Mails verschieden");
		document.getElementById("emailFeld1").style.borderColor("red");
		document.getElementById("emailFeld2").style.borderColor("red");
		
	}
}
*/
function getAlert(TextForAlert){
	alert(TextForAlert);
}