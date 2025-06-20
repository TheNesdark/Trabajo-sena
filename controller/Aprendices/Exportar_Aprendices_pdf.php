<?php
include ('../../config.php');
require ('../fpdf/fpdf.php');

$aprendices = $pdo->query("SELECT * FROM aprendiz");
$datos = $aprendices->fetchAll(PDO::FETCH_ASSOC);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);

$pdf->Cell(0, 20, 'Lista de Aprendices', 0, 1, 'C');
$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(40, 10, 'Documento', 1);
$pdf->Cell(40, 10, 'Tipo', 1);
$pdf->Cell(50, 10, 'Nombre', 1);
$pdf->Cell(50, 10, 'Apellido', 1);
$pdf->Ln();

foreach ($datos as $aprendiz) {
    $pdf->Cell(40, 10, utf8_decode($aprendiz['idaprendiz']), 1);
    $pdf->Cell(40, 10, utf8_decode($aprendiz['tipodoc']), 1);
    $pdf->Cell(50, 10, utf8_decode($aprendiz['nombres']), 1);
    $pdf->Cell(50, 10, utf8_decode($aprendiz['apellidos']), 1);
    $pdf->Ln();
}

$pdf->Output();
?>