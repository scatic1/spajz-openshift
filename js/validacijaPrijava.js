var regUsername=/^[0-9a-zA-Z]+$/;
var regMail = /^[^\s@]+\@[^\s@]+\.[^\s@]+$/g;
var regLozinka=/^[0-9a-zA-Z]+$/;
window.onload = function() {
	

	document.getElementById("submit1").onclick=validacijaPrijava;

}
function validacijaUsername(){
	var user=document.getElementById("username");
	if(user.value.match(regUsername)){
		document.getElementById("komuser").innerHTML = "";
		return true;
	}
	
	else{
		document.getElementById("komuser").innerHTML = "Username mora imati samo slova i brojeve!!";
		return false;
	}
}
function validacijaMail(){
	var email = document.getElementById("mail");
  if (email.value.match(regMail) || email=="") {
document.getElementById("kommail").innerHTML = "";
	 return true;	  
    
  } else {
     document.getElementById("kommail").innerHTML = "Neispravan mail!!!";
	return false;
  }
	
}
function validacijaLozinka(){
	var lozinka=document.getElementById("password");
	if(lozinka.value.match(regLozinka)){
		document.getElementById("kompassword").innerHTML = "";
		return true;
	}
	
	else{
		document.getElementById("kompassword").innerHTML = "Za šifru možete koristiti slova i brojeve!!";
		return false;
	}
}

function validacijaPrijava(){
	validacijaUsername();
	validacijaMail();
	validacijaLozinka();
if (!validacijaUsername() || !validacijaLozinka() || !validacijaMail()) {
    
	document.getElementById("komsubmit1").innerHTML="Unesite ispravno podatke!!";
	return false;
  }
  else {
	  document.getElementById("komsubmit1").innerHTML="";
	  alert("Uspješno ste se prijavili!")
     return true;
  }
  
 
}
