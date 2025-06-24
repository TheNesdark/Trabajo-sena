<?php
require ('../../config.php');
require ('../fpdf/fpdf.php');

$motivos = $pdo->query("SELECT * FROM motivo")->fetchAll(PDO::FETCH_ASSOC);

function exportarPDF($motivos) {
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 14);

    $pdf->Cell(0, 20, 'Lista de Motivos', 0, 1, 'C');
    $pdf->Ln(5);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(40, 10, 'ID', 1);
    $pdf->Cell(50, 10, 'Descripcion', 1);
    $pdf->Ln();

    foreach ($motivos as $motivo) {
        $pdf->Cell(40, 10, utf8_decode($motivo['idmotivo']), 1);
        $pdf->Cell(50, 10, utf8_decode($motivo['descripcion']), 1);
        $pdf->Ln();
    }

    $pdf->Output();
}

function exportarExcel($motivos) {
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=motivos.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    echo "ID\tDescripcion\n";

    foreach ($motivos as $motivo) {
        echo utf8_decode($motivo['idmotivo']) . "\t" . utf8_decode($motivo['descripcion']) . "\n";
    }
}

if (isset($_GET['tipo']) && $_GET['tipo'] === 'pdf') {
    exportarPDF($motivos);
} elseif (isset($_GET['tipo']) && $_GET['tipo'] === 'excel') {
    exportarExcel($motivos);
} else {
    echo "Especifica el tipo de exportación: 'pdf' o 'excel'.";
}