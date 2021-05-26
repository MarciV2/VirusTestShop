//var myNav = document.getElementById('navbar');
//window.onscroll = function () {
//    if (document.body.scrollTop >= 295 || document.documentElement.scrollTop >= 295) {
//        myNav.classList.add("windowedPageNavbar");
//        myNav.classList.remove("windowedPageNavbar-transparent");
//    }
        
//    else {
//        myNav.classList.add("windowedPageNavbar-transparent");
//        myNav.classList.remove("windowedPageNavbar");
//    }
//};

function checkLogin(login)
{
    console.log("Test checkLogin"+login);
}

function clickAGBs()
{
	window.location = "/content/agb.html";
}
function pwprüfen()
{
	
	var pw1 = document.getElementById("passwort").value;
	var pw2 = document.getElementById("wdhlg-passwort").value;
	var result = pw1.localeCompare(pw2);
	
	 if (result)
        {
			
            alert("Passwörter müssen gleich sein!");
			pw1 = document.getElementById("passwort").value=null;
			pw2 = document.getElementById("wdhlg-passwort").value=null;
            document.getElementById("passwort").focus();
            return false;
        }
}
function emailchecken()
{
	
	var email1 = document.getElementById("email").value;
	var email2 = document.getElementById("wdhlg-email").value;
	var result = email1.localeCompare(email2);
	
	 if (result)
        {
			
            alert("Emails müssen gleich sein!");
			email1 = document.getElementById("email").value=null;
			email2 = document.getElementById("wdhlg-email").value=null;
            document.getElementById("email").focus();
            return false;
        }
}
