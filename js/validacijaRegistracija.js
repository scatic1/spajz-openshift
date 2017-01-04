var regUsername=/^[0-9a-zA-Z]+$/;
var regMail = /^[^\s@]+\@[^\s@]+\.[^\s@]+$/g;
var regLozinka=/^[0-9a-zA-Z]+$/;
window.onload = function() {
	
	document.getElementById("submit2").onclick=validacijaRegistracija;
	
	

}
function validacijaUsername1(){
	var user=document.getElementById("username1");
	if(user.value.match(regUsername)){
		document.getElementById("komuser1").innerHTML = "";
		return true;
	}
	
	else{
		document.getElementById("komuser1").innerHTML = "Username mora imati samo slova i brojeve!!";
		return false;
	}
}
function validacijaMail1(){
	var email = document.getElementById("mail1");
  if (email.value.match(regMail) || email=="") {
document.getElementById("kommail1").innerHTML = "";
	 return true;	  
    
  } else {
     document.getElementById("kommail1").innerHTML = "Neispravan mail!!!";
	return false;
  }
	
}
function validacijaIme1()
{
	var name=document.getElementById("name").value;
	
	if (name==null || name=="") {document.getElementById("kom").innerHTML = "Upiši ime!!!"; return false;}
	
	else{ document.getElementById("kom").innerHTML = ""; return true;}
}
function validacijaLozinka1(){
	var lozinka=document.getElementById("password1");
	if(lozinka.value.match(regLozinka)){
		document.getElementById("kompassword1").innerHTML = "";
		return true;
	}
	
	else{
		document.getElementById("kompassword1").innerHTML = "Za šifru možete koristiti slova i brojeve!!";
		return false;
	}
}
function validacijaIme1()
{
	var name=document.getElementById("name").value;
	
	if (name==null || name=="") {document.getElementById("kom").innerHTML = "Upiši ime!!!"; return false;}
	
	else{ document.getElementById("kom").innerHTML = "Ime"; return true;}
}

function validacijaRegistracija(){
	validacijaUsername1();
	validacijaMail1();
	validacijaLozinka1();
	validacijaIme1();
if (!validacijaUsername1() || !validacijaLozinka1() || !validacijaMail1() || !validacijaIme1()) {
    
	document.getElementById("komsubmit2").innerHTML="Unesite ispravno podatke!!";
	return false;
  }
  else {
	  document.getElementById("komsubmit2").innerHTML="";
	  alert("Uspješno ste se registrovali!")
     return true;
  }
  
 
}