<!DOCTYPE HTML>
<HTML>
<HEAD>
	<link rel="shortcut icon"  href="logo.png"/> 	
	<META http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="Naslovna.css"> 
	
	<link rel="stylesheet" type="text/css" href="Kontakt.css">

	
	<script type="text/javascript" src="js/validacijaKontakt.js"></script>
	<script type="text/javascript" src="js/validacijaPrijava.js"></script>
	<script type="text/javascript" src="js/validacijaRegistracija.js"></script>
	<script type="text/javascript" src="js/uvecaj.js"></script>	
	
	<TITLE>Špajz-Kontakt</TITLE>
	
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
              <h1 class="tekst" >Kontaktirajte nas</h1>
              
          </div>
			

		</div>
	</div>		
</section>

<!--dodaje u bazu-->
<?php

if(isset($_POST['submitPosalji'])){
	$servername = "localhost";
$username = "selsebiil";
$password = "wt";
$dbname = "spajz";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 $name = $_POST['name'];
  $email = $_POST['email'];
   $text = $_POST['text'];
$url = $_POST['url'];  
$sql = "INSERT INTO poruka (ime,email,poruka)
VALUES ('$name', '$email', '$text')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
	
		
          
	header('location: Kontakt.php');
	
	
}
?>


<!--dodaje u xml-->
<?php
/*
if(isset($_POST['submitPosalji'])){
	//sačuva u xml
	$messages=simplexml_load_file('poruke.xml');
	$message=$messages->addChild('message');
	
	$message->addChild('name',$_POST['name']);
	$message->addChild('email',$_POST['email']);
	$message->addChild('text',$_POST['text']);
	file_put_contents('poruke.xml', $messages->asXML());
	
	
		
          
	header('location: Kontakt.php');
	
	
}
 
*/
?>

<!--Kontakt-->
<div class="forma">
<a style="color:white"href="PorukePDF.php">Poruke[PDF]</a>
<h2>Kontaktirajte nas</h2>
	
	<form class="form" id="forma" method="post" onsubmit="return validacija()">
		
		<p class="name">
			<input type="text" name="name" id="name"  onchange="validacijaIme()" >
			<label id="kom" for="name">Ime</label>
		</p>
		
		<p class="mail">
			<input type="text" name="email" id="mail" placeholder="mail@gmail.com" onchange="validacijaMail()" >
			<label id="kommail"for="email">Email</label>
		</p>
				
	
		<p class="text">
			<textarea name="text" id="poruka" placeholder="Napišite poruku!" onchange="validacijaPoruka()"></textarea>
			<label id="komporuka" for="poruka"></label>
		</p>
		
		<p class="submit">
			<input type="submit" name="submitPosalji" id="submit" value="Pošalji"  >
			<label id="komsubmit" for="submit"></label>
		</p>
	</form>
</div>

<div class="kraj">
   
	
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

</BODY>
</HTML>