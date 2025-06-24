<?php
require ('../../config.php');
require ('../fpdf/fpdf.php');

$reportes = $pdo->query("SELECT reportes.idreporte, aprendiz.nombres AS nombre_aprendiz, aprendiz.apellidos AS apellido_aprendiz, ficha.nficha, programa.nombreprograma, motivo.descripcion AS motivo, reportes.fallas, reportes.observaciones, reportes.estado, reportes.fecha FROM reportes INNER JOIN aprendiz ON reportes.idaprendiz = aprendiz.idaprendiz INNER JOIN ficha ON reportes.nficha = ficha.nficha INNER JOIN programa ON ficha.idprograma = programa.idprograma INNER JOIN motivo ON reportes.idmotivo = motivo.idmotivo")->fetchAll(PDO::FETCH_ASSOC);

function exportarPDF($reportes) {
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
    $pdf->Cell(40, 10, 'Fallas', 1);
    $pdf->Cell(40, 10, 'Observaciones', 1);
    $pdf->Cell(30, 10, 'Estado', 1);
    $pdf->Cell(30, 10, 'Fecha', 1);

    $pdf->Ln();

    foreach ($reportes as $reporte) {
        $pdf->Cell(20, 10, utf8_decode($reporte['idreporte']), 1);
        $pdf->Cell(40, 10, utf8_decode($reporte['nombre_aprendiz'] . ' ' . $reporte['apellido_aprendiz']), 1);
        $pdf->Cell(30, 10, utf8_decode($reporte['nficha']), 1);
        $pdf->Cell(40, 10, utf8_decode($reporte['nombreprograma']), 1);
        $pdf->Cell(40, 10, utf8_decode($reporte['motivo']), 1);
        $pdf->Cell(40, 10, utf8_decode($reporte['fallas']), 1);
        $pdf->Cell(40, 10, utf8_decode($reporte['observaciones']), 1);
        $pdf->Cell(30, 10, utf8_decode($reporte['estado']), 1);
        $pdf->Cell(30, 10, utf8_decode($reporte['fecha']), 1);
        $pdf->Ln();
    }

    $pdf->Output();
}

function exportarExcel($reportes) {
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=reportes.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    echo "ID\tAprendiz\tFicha\tPrograma\tMotivo\tFallas\tObservaciones\tEstado\tFecha\n";

    foreach ($reportes as $reporte) {
        echo utf8_decode($reporte['idreporte']) . "\n";
        echo utf8_decode($reporte['nombre_aprendiz'] . ' ' . $reporte['apellido_aprendiz']) . "\n";
        echo utf8_decode($reporte['nficha']) . "\n";
        echo utf8_decode($reporte['nombreprograma']) . "\n";
        echo utf8_decode($reporte['motivo']) . "\n";
        echo utf8_decode($reporte['fallas']) . "\n";
        echo utf8_decode($reporte['observaciones']) . "\n";
        echo utf8_decode($reporte['estado']) . "\n";
        echo utf8_decode($reporte['fecha']) . "\n";
    }
}

if (isset($_GET['tipo']) && $_GET['tipo'] === 'pdf') {
    exportarPDF($reportes);
} elseif (isset($_GET['tipo']) && $_GET['tipo'] === 'excel') {
    exportarExcel($reportes);
} else {
    echo "Especifica el tipo de exportación: 'pdf' o 'excel'.";
}