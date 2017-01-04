
<!DOCTYPE HTML>
<HTML>
<HEAD>
	<link rel="shortcut icon"  href="Slike/logo.png"/> 	
	<META http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="Naslovna.css"> 
	<link rel="stylesheet" type="text/css" href="Prijava.css">


	
	<script type="text/javascript" src="js/validacijaKontakt.js"></script>
	<script type="text/javascript" src="js/validacijaPrijava.js"></script>
	<script type="text/javascript" src="js/validacijaRegistracija.js"></script>
	<script type="text/javascript" src="js/uvecaj.js"></script>
	<TITLE>Špajz-Prijava</TITLE>
	
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
<?php
			if(isset($_POST['logout']))
			{
				session_unset();
				session_destroy();
				header("Location: index.php");
			}
			//session_start();
			$error = '';
			$proslo = false;
			$postavljena = false;
			if (isset($_POST['submit1']) && !empty($_POST['Username']) && !empty($_POST['Password'])) 
			{
				$user1 = $_POST['Username'];
				$pass = $_POST['Password'];
			$users=simplexml_load_file('login.xml');
			
				
				foreach($users->user as $user) {
					
					$userr=$user->username;
					$passs=$user->password;
					if($userr == $user1 && $passs==md5($pass)) {
						$_SESSION['login'] = true;
						$error="";
						$proslo = true;
						$postavljena = true;
						break;
					}
					
				}
				if(! $proslo) {	
					echo "Pogrešni korisnički podaci!";
				}
				else if($proslo ) {
				echo '<script>alert("Logovan");</script>';
				header("Location: index.php");
			}
		
				
			}
			
			
			
	?>	

<!--Header-->
<section id="naslov" class="naslov-one">
	<div class="okvir">
		<div class="slika">

			
          <div class="header-tekst">
              <h1 class="tekst" >Prijavite se</h1>
              
          </div>
			

		</div>
	</div>		
</section>
<div class="forme">
<div class="prijava">
<div class="forma">
	<?php
	if(isset($_SESSION['login'])){
	print "
	<form class='form' action='Prijava.php' method='POST'>
	<p class='submit'>
	<input type='submit' name='logout' value='Odjava'></button>
	</p>
	</form>
	";
	}
	else{
	print "<h2>Prijavi se</h2>
	<form class='form'  action='Prijava.php' method='POST'>
	<p class='username'>
			<input type='text' name='Username' id='username' placeholder='username' onchange='validacijaUsername()' ><br>
			<label style='color:white'  id='komuser' for='Username'></label>
		</p>
	
	<br>
		<p class='password'>
		<input type='password' id='Password' name='Password' placeholder='*********' onchange='validacijaLozinka()'><br>
		<label style='color:white'  id='kompassword' for='Password'></label>
		
		</p>
	
	<br>
	<p class='submit'>
			<input type='submit' name='submit1' id='submit1' value='Prijava' >
			<label style='color:white' id='komsubmit1' for='submit1'></label>
		</p>
	
	</form>
	";
	}
	?>
	
	</div>
</div>
<?php

if(isset($_POST['submitRegistruj'])){
	//sačuva u xml
	$users=simplexml_load_file('korisnici.xml');
	$user=$users->addChild('user');
	
	$user->addChild('name',$_POST['name1']);
	$user->addChild('mail',$_POST['mail1']);
	$user->addChild('username',$_POST['username1']);
	$user->addChild('password',md5($_POST['password1']));
	file_put_contents('korisnici.xml', $users->asXML());
	
	
		
          
	header('location: Prijava.php');
	
	
}
?>
<div class="registracija">
<h2>Registruj se</h2>
	
	<form class="form" method="post"onsubmit="return validacijaRegistracija()" >
		
		<p class="ime">
			<input type="text" name="name1" id="name" placeholder="" onchange="validacijaIme1()"><br>
			<label style="color:white" id="kom" for="name">Ime</label>
			
		</p>
		
		
		
		
		<p class="mail">
			<input type="text" name="mail1" id="mail1" placeholder="mail@gmail.com" onchange="validacijaMail1()"><br>
			<label style="color:white"  id="kommail1" for="mail1"></label>
			
		</p>
		
		<p class="username">
		<input type="text" name="username1" id="username1"placeholder="username" onchange="validacijaUsername1()"><br>
		<label style="color:white"  id="komuser1" for="username1"></label>
		
		</p>
		
		<p class="password">
		<input type="password" id="password1" name="password1" placeholder="*******" onchange="validacijaLozinka1()"><br>
		<label style="color:white"  id="kompassword1" for="password1"></label>
		
		</p>
		
		
		<p class="submit">
			<input type="submit" name="submitRegistruj" id="submit2" value="Registruj se" >
			<label style="color:white" id="komsubmit2" for="submit2"></label>
		</p>
	</form>
	
	
</div>
</div>
</BODY>
</HTML>