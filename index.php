
<!DOCTYPE HTML>
<HTML>
<HEAD><script>
function showResult(str){
if(str.length==0){
document.getElementById("pretraga").innerHTML="";
document.getElementById("pretraga").style.border="0px";
return;
}
if(window.XMLHttpRequest){

xmlhttp=new XMLHttpRequest();
}
else
{
xmlhttp=new ActiveXobject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function(){
if(xmlhttp.readyState==4 && xmlhttp.status==200){
document.getElementById("pretraga").innerHTML=xmlhttp.responseText;
document.getElementById("pretraga").style.border="1px solid #A5ACB2";
}
}
xmlhttp.open("GET", "pretraga.php?q="+str,true);
xmlhttp.send();
}
</script>
	<link rel="shortcut icon"  href="logo.png"/> 	
	<META http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--Naslovna css-->
	<link rel="stylesheet" type="text/css" href="Naslovna.css"> 
	 
	<link rel="stylesheet" type="text/css" href="ONama.css">

<link rel="stylesheet" type="text/css" href="Proizvodi.css"> 	
	<script type="text/javascript" src="js/validacijaKontakt.js"></script>
	<script type="text/javascript" src="js/validacijaPrijava.js"></script>
	<script type="text/javascript" src="js/validacijaRegistracija.js"></script>
	<script type="text/javascript" src="js/uvecaj.js"></script>
	<TITLE>Špajz</TITLE>
	
</HEAD>
<BODY> <script type="text/javascript" src="js/funkcija.js"></script>
<?php
$output='';
	
	if(isset($_POST['trazi'])){
	
	
		$pretraga = htmlEntities($_POST['text'], ENT_QUOTES);
		
		$kontakti=simplexml_load_file('korisnici.xml');
	foreach($kontakti->user as $kontakt){
		
		$imee=$kontakt->name;

		$usernamee=$kontakt->username;
	
		
		if($pretraga=='')
		{
			$output.='Nema rezultata';break;
		}
		elseif(strpos(strtolower($imee), strtolower($pretraga))!==false || strpos(strtolower($usernamee),strtolower($pretraga))!==false)
		{
			
			$output.='<div>'.$imee.' '.$usernamee.'<div>';
		}
	}
}
?>

<!--Logo Meni-->
<div class="zaglavlje">
<div class="menu">
<?php
	session_start();
	if (isset($_SESSION['login']))
	{
	print "<button onclick='dropdown()' class='dugme'>Menu</button>
	 <div id='podstranice' class='dugme-sadrzaj'>
	             
				
				          
					<a href='index.php' TARGET='_self'>Naslovna</a>
                       	 <a href='ONama.php' TARGET='_self'>O nama</a>
                       	 <a href='Proizvodi.php' TARGET='_self'>Proizvodi</a>
                       	 <a href='Kontakt.php' TARGET='_self'>Kontakt</a>
						  <a href='DodajProizvod.php' TARGET='_self'>Dodaj proizvod</a>
					      <a href='Prijava.php' TARGET='_self'>Logout</a>
						
               
   </div>
";
	}
	else {
	 print "<button onclick='dropdown()' class='dugme'>Menu</button>
	 <div id='podstranice' class='dugme-sadrzaj'>
	             
				
				          
					<a href='index.php' TARGET='_self'>Naslovna</a>
                       	 <a href='ONama.php' TARGET='_self'>O nama</a>
                       	 <a href='Proizvodi.php' TARGET='_self'>Proizvodi</a>
                       	 <a href='Kontakt.php' TARGET='_self'>Kontakt</a>
						 <a href='Prijava.php' TARGET='_self'>Prijava</a>
						
               
  
</div>";
	}
	?>
</div>
</div>

<!--Header-->
<section id="naslov" class="naslov-one">
	<div class="okvir">
		<div class="slika">

			
          <div class="header-tekst">
              <h1 class="tekst" >Špajz - raj za istinske sladokusce!</h1>
              
          </div>
			

		</div>
	</div>		
</section>

<div class="pretrazi">
<form action="index.php" method="post">
<p style="color:#DE7C7C">&nbsp;&nbsp;<b>Pretraga korisnika</b></p>
<input &nbsp;&nbsp; type="text" name="text"size="50" onKeyUp="showResult(this.value)">
<input type="submit" value="Traži" name="trazi">
<div id="pretraga"></div>

</form>
<?php echo $output ?>
</div>
<br><br>
<!--kraj-->
<div class="kraj">
    <div class="rvrijeme">
       <h3 class="vrijeme1"><b>Radno vrijeme:<b></h3>
       <p><b>Ponedjeljak-Petak: 10:00 do 22:00 <br>Subota: 10:00 do 18:00<b></p>
     </div>
	
	<div class="telefon">
			<h3 class="tel">Telefon</h3>
		    <p>064 44 30 777</p>
					
	</div>
			

			
	<div class="email">
			<h3 class="mail">Email</h3>
			<p>info@spajz.com</p>
	</div>
				
	<div class="adresa">
			<h3 class="adr">Adresa</h3>
			<p>SCC -1. sprat / Lokacija br. 10</p>
	</div>
			
</div>		
		
	

	</div>			
</BODY>
</HTML>	
