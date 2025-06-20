<?php
include ('../../config.php');
require ('../fpdf/fpdf.php');

$motivos = $pdo->query("SELECT * FROM motivo");
$datos = $motivos->fetchAll(PDO::FETCH_ASSOC);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);

$pdf->Cell(0, 20, 'Lista de Motivos', 0, 1, 'C');
$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(40, 10, 'ID', 1);
$pdf->Cell(50, 10, 'Descripción', 1);
$pdf->Ln();

foreach ($datos as $motivo) {
    $pdf->Cell(40, 10, utf8_decode($motivo['idmotivo']), 1);
    $pdf->Cell(50, 10, utf8_decode($motivo['descripcion']), 1);
    $pdf->Ln();
}

$pdf->Output();
?>