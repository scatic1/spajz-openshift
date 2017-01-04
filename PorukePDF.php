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
$messages=simplexml_load_file('poruke.xml');
$i=1;


	 foreach ($messages->message as $message){ 
		   
		       
			   $pdf->Cell(0,10,'Ime:'.$message->name,0,1);
			   $pdf->Cell(0,10,'Email:'.$message->email,0,1);
			   $pdf->Cell(0,10,'Poruka:'.$message->text,0,1);
			    $pdf->Ln(10);
			   
			   $i=$i+1;
	 }
	
$pdf->Output();
?>