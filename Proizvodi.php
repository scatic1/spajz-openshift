
<!DOCTYPE HTML>
<HTML>
<HEAD>
	<link rel="shortcut icon"  href="logo.png"/> 	
	<META http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="Naslovna.css"> 
	
	<link rel="stylesheet" type="text/css" href="Proizvodi.css">

	
	<script type="text/javascript" src="js/validacijaKontakt.js"></script>
	<script type="text/javascript" src="js/validacijaPrijava.js"></script>
	<script type="text/javascript" src="js/validacijaRegistracija.js"></script>
	<script type="text/javascript" src="js/uvecaj.js"></script>	
	
	<TITLE>Špajz-Proizvodi</TITLE>
	
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
              <h1 class="tekst" >Proizvodi</h1>
              
          </div>
			

		</div>
	</div>		
	</section>

	
	<div class="slike">
	
	

	   
	   <?php 
	   $products=simplexml_load_file('proizvodi.xml');
	   foreach ($products->product as $product){ ?>
		   
		      
			   
			   
			   <?php echo '<img style="width:50%"src="'.$product->url.'" alt="Slika" />';?>
			  <?php echo '<p>'.$product->name.'';?>
			  <?php echo '<br><br><br>'; ?>
			  
		   
		   <?php } ?>

		
		
	</div>

<!--

<div class="slike">

<div class="slika1">
<img src="Slike/kurkuma.jpg" class="img-res" alt="kurkuma" onclick="prikazi(this.src,'Slike/kurkuma.jpg');">
<p>Kurkuma</p>
</div>
<div class="slika2">
<img src="Slike/caj1.jpg" class="img-res" alt="zeleni čaj" onclick="prikazi(this.src,'Slike/caj1.jpg');">
<p>Zeleni čaj</p>
</div>
<div class="slika3">
<img src="Slike/badem.jpg" class="img-res" alt="badem" onclick="prikazi(this.src,'Slike/badem.jpg');">
<p>Badem</p>
</div>
<div class="slika4">
<img src="Slike/nutella.jpg" class="img-res" alt="nutella" onclick="prikazi(this.src,'Slike/nutella.jpg');">
<p>Nutella</p>
</div>
<div class="slika5">
<img src="Slike/ulje.jpg" class="img-res" alt="kokos" onclick="prikazi(this.src,'Slike/ulje.jpg');">
<p>Kokosovo ulje</p>
</div>
<div class="slika6">
<img src="Slike/cips.jpg" class="img-res" alt="cips" onclick="prikazi(this.src,'Slike/cips.jpg');">
<p>Tip Top</p>
</div>
</div>

-->
<div id="velikaSlika" onclick="this.style.display='none'">
            <span class="bord">
			<img id="velikaslika" align="middle">
	        </span>
				  <span class="close" >&times;</span>
				  

        </div>


</BODY>
</HTML>