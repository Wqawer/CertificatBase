<?php
require_once("fpdf181/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello Word');
$pdf->Output();
$link = conn();
?>