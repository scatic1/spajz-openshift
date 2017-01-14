var regMail = /^[^\s@]+\@[^\s@]+\.[^\s@]+$/g;

window.onload = function() {
	
	
	document.getElementById("submit").onclick = validacija;
	
	

}
function validacijaIme()
{
	var name=document.getElementById("name").value;
	
	if (name==null || name=="") {document.getElementById("kom").innerHTML = "Upiši ime!!!"; return false;}
	
	else{ document.getElementById("kom").innerHTML = ""; return true;}
}
function validacijaPoruka(){
	
	var por=document.getElementById("poruka").value;
	
	if (por=="") {document.getElementById("komporuka").innerHTML = "Napiši poruku!!!";return false;}
	
	else{ document.getElementById("komporuka").innerHTML = "";return true;}
	
}
function validacijaMail() {

  var email = document.getElementById("mail");
  if (email.value.match(regMail) || email=="") {
document.getElementById("kommail").innerHTML = "Email";
	 return true;	  
    
  } else {
     document.getElementById("kommail").innerHTML = "Neispravan mail!!!";
	return false;
  }
  
}

function validacija(){
	validacijaIme();
	validacijaMail();
	validacijaPoruka();
if (!validacijaIme() || !validacijaPoruka() || !validacijaMail()) {
    
	document.getElementById("komsubmit").innerHTML="Unesite ispravno podatke!!";
	
return false;
  }
  else {
	 
	  document.getElementById("komsubmit").innerHTML="";
	  alert("Uspješno ste poslali poruku!") 
	  
return true;

  }
  
 
}
