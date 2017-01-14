
<!DOCTYPE HTML>
<HTML>
<HEAD>
	<link rel="shortcut icon"  href="logo.png"/> 	
	<META http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="Naslovna.css"> 
	
	<link rel="stylesheet" type="text/css" href="Proizvodi.css">

	
	<script type="text/javascript" src="js/proizvodi.js"></script>

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
	             
				
				          
					<a href='Naslovna.php' TARGET='_self'>Naslovna</a>
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
	             
				
				          
					<a href='Naslovna.php' TARGET='_self'>Naslovna</a>
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

<!--dodaje u xml-->
<?php
/*

if(isset($_POST['submitSacuvaj'])){
	//sačuva u xml
	$products=simplexml_load_file('proizvodi.xml');
	$product=$products->addChild('product');
	$product->addAttribute('id',$_POST['id']);
	$product->addChild('name',$_POST['name']);
	$product->addChild('price',$_POST['price']);
	$product->addChild('url',$_POST['url']);
	file_put_contents('proizvodi.xml', $products->asXML());
	
	
		
          
	header('location: DodajProizvod.php');
	
	
}
 
*/
?>

<!--dodaje u bazu-->
<?php


if(isset($_POST['submitSacuvaj'])){
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
  $price = $_POST['price'];
$url = $_POST['url'];  
$sql = "INSERT INTO proizvod (administrator,ime,cijena,slika)
VALUES ('1','$name', '$price', '$url')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
	header('location: DodajProizvod.php');
	
	
}
 

?>

<form  class="formaDodaj" method="post" onsubmit="return broj()">
    <table style="border-collapse:collapse"align="center" cellpading="2" cellspacing="2">
	   <tr>
	         <td><p>Id</p></td>
			 <td ><input id="id"type="text" name="id" onchange="broj()"></td>
			 <td ><label style="color:white"  id="kom1" for="id"></label><td>
	   </tr>
	   <tr>
	         <td><p>Ime</p></td>
			 <td ><input id="name"type="text" name="name" onchange="broj()"></td>
			 <td ><p id="kom2"></p><td>
	   </tr>
	   <tr>
	         <td><p>Cijena</p></td>
			 <td ><input id="price"type="text" name="price"></td>
	   </tr>
	   <tr>
	         <td><p>Slika</p></td>
			 <td id="slika"><input type="text" name="url"></td>
	   </tr>
	    <tr>
	         <td>&nbsp;</td>
			 <td><input type="submit" name="submitSacuvaj" value="Dodaj"></td>
	   </tr>
	
	</table>
</form>
<div class="kraj"></div>
</BODY>
</HTML>