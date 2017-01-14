var broj=/^[0-9]+$/;
function dodaj(){
	
}
function broj(){
	
	var br=document.getElementById("id");
	var br1=document.getElementById("price");
	if(br.value.match(broj) ){
		document.getElementById("kom1").innerHTML = "";
		return true;
	}
	
	else{
		document.getElementById("kom1").innerHTML = "Ne možete unijeti slova za id!!";
		return false;
	}
}