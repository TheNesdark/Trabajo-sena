<?php
include ('../../config.php');
require ('../fpdf/fpdf.php');

$reportes = $pdo->query("SELECT reportes.idreporte, aprendiz.nombres AS nombre_aprendiz, aprendiz.apellidos AS apellido_aprendiz, ficha.nficha, programa.nombreprograma, motivo.descripcion AS motivo, reportes.fallas, reportes.observaciones, reportes.estado, reportes.fecha FROM reportes INNER JOIN aprendiz ON reportes.idaprendiz = aprendiz.idaprendiz INNER JOIN ficha ON reportes.nficha = ficha.nficha INNER JOIN programa ON ficha.idprograma = programa.idprograma INNER JOIN motivo ON reportes.idmotivo = motivo.idmotivo");
$datos = $reportes->fetchAll(PDO::FETCH_ASSOC);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);

$pdf->Cell(0, 20, 'Lista de Reportes', 0, 1, 'C');
$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 10, 'ID', 1);
$pdf->Cell(40, 10, 'Aprendiz', 1);
$pdf->Cell(30, 10, 'Ficha', 1);
$pdf->Cell(40, 10, 'Programa', 1);
$pdf->Cell(40, 10, 'Motivo', 1);
$pdf->Ln();

foreach ($datos as $reporte) {
    $pdf->Cell(20, 10, utf8_decode($reporte['idreporte']), 1);
    $pdf->Cell(40, 10, utf8_decode($reporte['nombre_aprendiz'] . ' ' . $reporte['apellido_aprendiz']), 1);
    $pdf->Cell(30, 10, utf8_decode($reporte['nficha']), 1);
    $pdf->Cell(40, 10, utf8_decode($reporte['nombreprograma']), 1);
    $pdf->Cell(40, 10, utf8_decode($reporte['motivo']), 1);
    $pdf->Ln();
}

$pdf->Output();
?>