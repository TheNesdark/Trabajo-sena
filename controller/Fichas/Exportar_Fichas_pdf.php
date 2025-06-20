<?php
include ('../../config.php');
require ('../fpdf/fpdf.php');

$fichas = $pdo->query("SELECT ficha.nficha, programa.nombreprograma FROM ficha INNER JOIN programa ON ficha.idprograma = programa.idprograma");
$datos = $fichas->fetchAll(PDO::FETCH_ASSOC);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);

$pdf->Cell(0, 20, 'Lista de Fichas', 0, 1, 'C');
$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(40, 10, 'Número Ficha', 1);
$pdf->Cell(50, 10, 'Programa', 1);
$pdf->Ln();

foreach ($datos as $ficha) {
    $pdf->Cell(40, 10, utf8_decode($ficha['nficha']), 1);
    $pdf->Cell(50, 10, utf8_decode($ficha['nombreprograma']), 1);
    $pdf->Ln();
}

$pdf->Output();
?>