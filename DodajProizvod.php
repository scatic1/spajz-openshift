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

	<link rel="stylesheet" type="text/css" href="Kontakt.css">
	<script type="text/javascript" src="js/validacijaKontakt.js"></script>
	<script type="text/javascript" src="js/validacijaPrijava.js"></script>
	<script type="text/javascript" src="js/validacijaRegistracija.js"></script>
	<script type="text/javascript" src="js/uvecaj.js"></script>	
	
	<TITLE>Špajz-Proizvodi</TITLE>
	
</HEAD>
<BODY > <script type="text/javascript" src="js/funkcija.js"></script>
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
	//ucitavanje iz baze u csv
	// mysql database connection details
    $host = "localhost";
    $username = "selsebiil";
    $password = "wt";
    $dbname = "spajz";

    // open connection to mysql database
    $connection = mysqli_connect($host, $username, $password, $dbname) or die("Connection Error " . mysqli_error($connection));
    
    // fetch mysql table rows
    $sql = "select * from proizvod";
    $result = mysqli_query($connection, $sql) or die("Selection Error " . mysqli_error($connection));

    $fp = fopen('proizvodi.csv', 'w');

    while($row = mysqli_fetch_assoc($result))
    {
        fputcsv($fp, $row);
    }
    
    fclose($fp);

    //close the db connection
    mysqli_close($connection);
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
if(isset($_GET['action'])){
	//brise iz xml-a
	$products=simplexml_load_file('proizvodi.xml');
	$id=$_GET['id'];
	$index=0;
	$i=0;
	foreach($products->product as $product){
		if($product['id']==$id){
			$index=$i;
			break;
		}
		$i++;
	}
	unset($products->product[$index]);
	file_put_contents('proizvodi.xml', $products->asXML());
	header('location: DodajProizvod.php');
}
	
$products=simplexml_load_file('proizvodi.xml');
*/
?>


<!--dodavanje u bazu iz xml-a-->
<!------------------------------->
<?php

if(isset($_POST['submitUBazu'])){
	$servername = "localhost";
$username = "selsebiil";
$password = "wt";
$baza = "spajz";
// Create connection
$spajz= mysqli_connect($servername, $username, $password, $baza);
// Check connection
if (!$spajz) {
    die("Connection failed: " . mysqli_connect_error());
}
//dodaje proizvode u bazu iz xml-a
$products=simplexml_load_file('proizvodi.xml');

	foreach($products->product as $product){
		
		$name=$product->name;
		$price=$product->price;
		$url=$product->url;
$isti = "SELECT * FROM proizvod where ime='$name'";
$rezultat = $spajz->query($isti);
if ($rezultat->num_rows < 1){
$sql2 = "INSERT INTO proizvod (administrator,ime,cijena,slika)
VALUES ('1','$name','$price','$url')";

if (mysqli_query($spajz, $sql2)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($spajz);
}
}
}

//dodaje poruke u bazu iz xml-a
$messages=simplexml_load_file('poruke.xml');
$i=1;
	foreach($messages->message as $message){
		
		$name=$message->name;
		$email=$message->email;
		$text=$message->text;
$isti = "SELECT * FROM poruka where email='$email'";
$rezultat = $spajz->query($isti);
if ($rezultat->num_rows < 1){
$sql2 = "INSERT INTO poruka (ime,email,poruka)
VALUES ('$name','$email','$text')";
$i++;
if (mysqli_query($spajz, $sql2)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($spajz);
}
}
}
//dodaje korisnike u bazu iz xml-a
$users=simplexml_load_file('korisnici.xml');
$i=1;
	foreach($users->user as $user){
		
		$name=$user->name;
		$mail=$user->mail;
		$username=$user->username;
		$password=$user->password;
$isti = "SELECT * FROM korisnici where username='$username'";
$rezultat = $spajz->query($isti);
if ($rezultat->num_rows < 1){
$sql2 = "INSERT INTO korisnici (ime,email,username,password)
VALUES ('$name','$mail','$username','$password')";
$i++;
if (mysqli_query($spajz, $sql2)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($spajz);
}
}
}

//dodaje admina u bazu iz xml-a
$users=simplexml_load_file('login.xml');
$i=1;
	foreach($users->user as $user){
		$username=$user->username;
		$password=$user->password;
$isti = "SELECT * FROM administrator where username='$username'";
$rezultat = $spajz->query($isti);
if ($rezultat->num_rows < 1){
$sql2 = "INSERT INTO administrator (username,password)
VALUES ('$username','$password')";
$i++;
if (mysqli_query($spajz, $sql2)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($spajz);
}
}
}
header('location:DodajProizvod.php');
}
 

?>
<div class="tabelaa">
<br>
<a href="proizvodi.csv" style="color:#DE7C7C" download><b>Spisak proizvoda[download]</b></a>
<br><br>
<form style="background-color:#F9C4C4" class="forma" method="post">
<p class="submit" >
			<input type="submit" name="submitUBazu" id="submit" value="Dodaj u bazu"  >
			<label id="komsubmit" for="submit"></label>
		</p>
		</form>


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

<form style="background-color:#F9C4C4" class="formaDodaj" method="post" >
    <table style="border-collapse:collapse"align="center" cellpading="2" cellspacing="2">
	   
	   <tr>
	         <td><p>Ime</p></td>
			 <td ><input id="name"type="text" name="name" ></td>
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

<br><br>
<table style="width:100%" style="border-collapse:collapse" align="left" cellpading="2" cellspacing="2" border="1" >
       <tr>
	       <th>Id</th>
		   <th>Ime</th>
		   <th>Cijena</th>
		   <th>Slika</th>
		   <th>Edit</th>
		    <th>Delete</th>
	   </tr>
	   
	   <?php
	   $res=mysqli_query($link,"select * from proizvod");
	   while($row=mysqli_fetch_array($res))
	   {
		   echo "<tr>";
		      echo "<td>"; echo $row["id"]; echo "</td>";
		   echo "<td>"; echo $row["ime"]; echo "</td>";
		
		   
		   echo "<td>"; echo $row["cijena"]; echo "km</td>";
		    echo "<td>"; echo $row["slika"]; echo "</td>";
			echo "<td><a style='color:#DE7C7C'href='Edit.php?id=".$row["id"]."' >Edit</a></td>";
               echo "<td><a style='color:#DE7C7C' href='Delete.php?id=".$row["id"]."' >Delete</a></td>";
		   echo "</tr>";
	   }
	   ?>
		 
</table>


		 


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



</BODY>
</HTML>