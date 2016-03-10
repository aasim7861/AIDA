<?php
require('mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
	//Title
	$this->SetFont('Arial','',18);
	$this->Cell(0,6,'PDF From MySQLi',0,1,'C');
	$this->Ln(10);
	//Ensure table header is output
	parent::Header();
}
}

//Connect to database	

	$connection = mysql_connect("localhost", "mohammedaasim_co_uk", "eyps6wZC") or die(mysql_error());
	mysql_select_db("mohammedaasim_co_uk", $connection) or die(mysql_error());

$pdf=new PDF();
$pdf->AddPage();
//First table: put all columns automatically
$pdf->Table('SELECT `UserID`, `Firstname`,`Surname`,`Username`,`Email` from Users order by `UserID`');
$pdf->AddPage();
//Second table: specify 3 columns
$pdf->AddCol('UserID',40,'','C');
$pdf->AddCol('Firstname',40,'Users','C');
$pdf->AddCol('Surname',40,'','C');
$pdf->AddCol('Username',40,'','C');
$pdf->AddCol('Email',40,'','C');
$prop=array('HeaderColor'=>array(255,150,100),
			'color1'=>array(210,245,255),
			'color2'=>array(255,255,210),
			'padding'=>2);
$pdf->Table('select Firstname, Surname, Username, Email, UserID from Users order by UserID limit 0,40',$prop);

//$pdf->Output("C:\Users\John\Desktop/somename.pdf",'F'); 


$pdf->Output($downloadfilename.".pdf"); 
header('Location: '.$downloadfilename.".pdf");
?>