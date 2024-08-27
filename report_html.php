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

$pdf->Cell(190,10,"Board of Intermediate and Secondary Education,Jashore", 0,1,'C');
$pdf->setFont('HELVETICA','',8);
$pdf->Cell(190,5,"Board of Intermediate and Secondary Education,Jashore", 1,0,'C');

$pdf->setFont('HELVETICA','',10);
$pdf->Cell(30,5,"class", 0);
$pdf->Cell(160,5,": Programming 101", 0);
$pdf->Ln();
$pdf->Cell(30,5,"Teacher Name", 0);
$pdf->Cell(160,5,": Prof. John Smith", 0);
$pdf->Ln();
$pdf->Ln(2);

// table

$html="<table>
	<tr>
		<th>ID	</th>
		<th>First Name	</th>
		<th>Last Name	</th>
		<th>Email	</th>
		<th>Gender	</th>
		<th>Address	</th>
	</tr>";

	//load the json data
	$file= file_get_contents('MOCK_DATA.json');
	$data= json_decode($file);
// loop the data
foreach ($data as $student){
$html .="	<tr>
		<td>".$student->id."	</td>
		<td>".$student->first_name."	</td
		<td>".$student->last_name."	</td>
		<td>".$student->email."	</td>
		<td>".$student->gender."	</td>
		<td>".$student->ip_address."	</td>
	</tr>";
}
$html .="	</table>
	<style>
	table{
		border-collapse:collapse;
			}
	th,td{
		border:1px solid #888;
	}
	table tr th{
		background-color:#888;
		color:#fff;
		font-weight:bold;
		
		
	}
	</style>
";
$pdf->writeHTMLCell(192,0,9,'',$html,0);
$pdf->Output();

?>