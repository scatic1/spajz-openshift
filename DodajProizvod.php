
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
	//ucitavanje iz xml-a
	 $filexml='proizvodi.xml';

    if (file_exists($filexml)) 
           {
       $xml = simplexml_load_file($filexml);
       $f = fopen('proizvodi.csv', 'w');
       createCsv($xml, $f);
       fclose($f);
    }

    function createCsv($xml,$f)
    {

        foreach ($xml->children() as $item) 
        {

           $hasChild = (count($item->children()) > 0)?true:false;

        if( ! $hasChild)
        {
           $put_arr = array($item->getName(),$item); 
           fputcsv($f, $put_arr ,',','"');

        }
        else
        {
         createCsv($item, $f);
        }
     }

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

?>
<div class="tabelaa">
<br>
<a href="proizvodi.csv" style="color:#DE7C7C" download><b>Spisak proizvoda[download]</b></a>
<br><br>
<a  style="color:#DE7C7C"href="Dodaj.php" ><b>Dodaj novi proizvod</b></a>
<br><br>
<table style="width:100%" style="border-collapse:collapse" align="left" cellpading="2" cellspacing="2" border="1" >
       <tr>
	       <th>Id</th>
		   <th>Ime</th>
		   <th>Cijena</th>
		   <th>Slika</th>
		   <th>Opcije</th>
	   </tr>
	   
	   <?php foreach ($products->product as $product){ ?>
		   <tr>
		       <td><?php echo $product['id'];?></td>
			   <td><?php echo $product->name;?></td>
			   <td><?php echo $product->price;?>km</td>
			   <td><?php echo $product->url;?></td>
			   <td align="center">
			   <a style="color:#DE7C7C"href="Edit.php?id=<?php echo $product['id']; ?>">Edit</a> | 
			   <a style="color:#DE7C7C"href="DodajProizvod.php?action=delete&id=<?php echo $product['id'];?>"
				 onclick="return confirm('Jeste li sigurni?')">Delete</a></td>
		   </tr>
		   <?php } ?>
</table>
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



</BODY>
</HTML>