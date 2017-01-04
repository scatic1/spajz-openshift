<!DOCTYPE HTML>
<HTML>
<HEAD>
	<link rel="shortcut icon"  href="logo.png"/> 	
	<META http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="Naslovna.css"> 
    <link rel="stylesheet" type="text/css" href="ONama.css"> 


	
	<script type="text/javascript" src="js/validacijaKontakt.js"></script>
	<script type="text/javascript" src="js/validacijaPrijava.js"></script>
	<script type="text/javascript" src="js/validacijaRegistracija.js"></script>
	<script type="text/javascript" src="js/uvecaj.js"></script>	
	
	<TITLE>Špajz-O nama</TITLE>
	
</HEAD>
<BODY> <script type="text/javascript" src="js/funkcija.js"></script>


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
					      <a href='Prijava.php' TARGET='_self'>Odjava</a>
						
               
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
              <h1 class="tekst" >O Nama</h1>
              
          </div>
			

		</div>
	</div>		
</section>

<!--O Nama-->
<div class="onama">

       <div class="dio1">
	   <p>U Sarajevo City Centru, na etaži -1, čeka vas divan čokoladni, slatki i delikatesni svijet nazvan ŠPAJZ. Zasladite se neodoljivim okusima badema, čokolada ili različitih začina, izaberite kandirano voće ili ukusne čajeve.</p>
       </div>
	
	   <div class="dio2">
	   <img src="spajz1.jpg" alt="Špajz">
	   </div>	   
	   <div class="dio4">
	   <p>Više od 200 vrsta ukusnih i mirisnih slatkiša, začina, čajeva, suhog voća, zdravih grickalica i još mnogo toga, nudi Špajz - raj za istinske sladokusce. Svi proizvodi su bez umjetnih boja i aditiva, idealni za malu ali i onu malo veću raju. </p>
       </div>
	   <div class="dio3">
	   <img src="spajz2.jpg" alt="Špajz">
	   </div>

	
	  
</div>
</BODY>
</HTML>