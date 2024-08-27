<?php
//include library
include ('library/tcpdf.php');
//make TCPDF object
$pdf=new TCPDF('p','mm','A4');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
//add page
$pdf->AddPage();

			/* //using cell
			$pdf->Cell(190,10,"this is a cell",1,1,'c');

			//using html cell
			$pdf->writeHTMLCell(50,0, '','',"this is a cell",1,0);

			//only cell
			$pdf->Cell(20,10,"cell", 1,0); */
			
//add content (students list/institute list/or any other list)
// header

$pdf->setFont('HELVETICA','',14);

$pdf->Cell(190,10,"Board of Intermediate and Secondary Education,Jashore", 1,1,'C');
$pdf->setFont('HELVETICA','',8);
$pdf->Cell(190,5,"Board of Intermediate and Secondary Education,Jashore", 1,1,'C');

$pdf->setFont('HELVETICA','',10);
$pdf->Cell(30,5,"class", 1);
$pdf->Cell(160,5,": Programming 101", 1);
$pdf->Ln();
$pdf->Cell(30,5,"Teacher Name", 1);
$pdf->Cell(160,5,": Prof. John Smith", 1);
$pdf->Ln();
$pdf->Ln(2);


//load the json data
$file= file_get_contents('MOCK_DATA.json');
$data= json_decode($file);

// loop the data
foreach ($data as $student){
	$pdf->Cell(10,5, $student->id,1);
	$pdf->Cell(30,5, $student->first_name,1);
	$pdf->Cell(30,5, $student->last_name,1);
	$pdf->Cell(60,5, $student->email,1);
	$pdf->Cell(25,5, $student->gender,1);
	$pdf->Cell(35,5, $student->ip_address,1);
	$pdf->Ln();
}

$pdf->Output();

?>