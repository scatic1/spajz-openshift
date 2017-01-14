<?php 
 $link=mysqli_connect("localhost","selsebiil","wt");
 mysqli_select_db($link,"spajz");
 ?>
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

<?php
/*
$products=simplexml_load_file('proizvodi.xml');
if(isset($_POST['submitSacuvaj'])){
	foreach($products->product as $product){
		if($product['id']==$_POST['id']){
			$product->name=$_POST['name'];
			$product->price=$_POST['price'];
			$product->url=$_POST['url'];
			break;
		}
	}
	
	file_put_contents('proizvodi.xml', $products->asXML());
	
	
	
	header('location: DodajProizvod.php');
}

foreach($products->product as $product){
	if($product['id']==$_GET['id']){
		$id=$product['id'];
		$name=$product->name;
		$price=$product->price;
		$url=$product->url;
		break;
	}
	
}*/
?>

<?php

if(isset($_GET['id']))
{
$id=$_GET['id'];}
if(isset($_POST['submitSacuvaj'])){
	$name=$_POST['name'];
$price=$_POST['price'];
$url=$_POST['url'];	
$query3=mysqli_query($link,"update proizvod set ime='$name', cijena='$price',slika='$url' where id='$id'");
	if($query3)
{
	header('location: DodajProizvod.php');
}
}
$query1=mysqli_query($link,"select * from proizvod where id='$id'");
$query2=mysqli_fetch_array($query1);
?>

<form class="formaDodaj"method="post">
    <table style="border-collapse:collapse" align="center" cellpading="2" cellspacing="2">
	   <tr>
	         
	   </tr>
	   <tr>
	         <td><p>Ime</p></td>
			 <td><input type="text" name="name" value="<?php echo $query2["ime"]; ?>"></td>
	   </tr>
	   <tr>
	         <td><p>Cijena</p></td>
			 <td><input type="text" name="price" value="<?php echo $query2["cijena"]; ?>"></td>
	   </tr>
	   <tr>
	         <td><p>Slika</p></td>
			 <td><input type="text" name="url" value="<?php echo $query2["slika"]; ?>"></td>
	   </tr>
	    <tr>
	         <td>&nbsp;</td>
			 <td><input type="submit" name="submitSacuvaj" value="Sačuvaj"></td>
	   </tr>
	
	</table>
</BODY>
</HTML>