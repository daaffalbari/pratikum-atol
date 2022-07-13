<?php
require('fpdf183/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World! Andri');
for($i=0;$i<=100;$i+=10){
	$pdf->SetDrawColor(0,0,2.55*$i);
	$pdf->Line(0,0,100,$i);
}
$pdf->Output();
?>