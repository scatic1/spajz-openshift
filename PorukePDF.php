<?php
require('fpdf.php');


class PDF extends FPDF
{
  function Header()
    {
      $this->Image('logo.png',10,8,33);
      $this->SetFont('Helvetica','B',15);
	   $this->SetDrawColor(255,255,255);
    
    $this->SetTextColor(240,97,97);
      $this->SetXY(50, 10);
	  $this->Ln(20);
      $this->Cell(0,10,'Poruke',1,0,'C');  
	   $this->Ln(35);
     }

  function Footer()
    {
      $this->SetXY(100,-15);
      $this->SetFont('Helvetica','I',10);
	  
    
    }
	
}



$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Helvetica','',12);
 $pdf->SetTextColor(240,97,97);
  $hostname = "localhost";
$username = "selsebiil";
$password = "wt";
$databaseName = "spajz";

// connect to mysql database

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query
$query = "SELECT * FROM `poruka`";

// for method 1

$result = mysqli_query($connect, $query);
	   
	   
	   


	  while($row = mysqli_fetch_array( $result )) {

		   
		      
			   
			   
			  
			  $pdf->Cell(0,10,'Ime:'.$row['ime'],0,1);
			   $pdf->Cell(0,10,'Email:'.$row['email'],0,1);
			   $pdf->Cell(0,10,'Poruka:'.$row['poruka'],0,1);
		   $pdf->Ln(10);
		   }
 
 

	
$pdf->Output();
?>