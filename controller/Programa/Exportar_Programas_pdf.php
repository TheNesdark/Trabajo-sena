<?php
include ('../../config.php');
require ('../fpdf/fpdf.php');

$programas = $pdo->query("SELECT * FROM programa");
$datos = $programas->fetchAll(PDO::FETCH_ASSOC);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);

$pdf->Cell(0, 20, 'Lista de Programas', 0, 1, 'C');
$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(40, 10, 'ID', 1);
$pdf->Cell(50, 10, 'Nombre', 1);
$pdf->Ln();

foreach ($datos as $programa) {
    $pdf->Cell(40, 10, utf8_decode($programa['idprograma']), 1);
    $pdf->Cell(50, 10, utf8_decode($programa['nombreprograma']), 1);
    $pdf->Ln();
}

$pdf->Output();
?>