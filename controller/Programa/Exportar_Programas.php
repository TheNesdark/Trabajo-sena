<?php
require ('../../config.php');
require ('../fpdf/fpdf.php');

$programas = $pdo->query("SELECT * FROM programa")->fetchAll(PDO::FETCH_ASSOC);

function exportarPDF($programas) {
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 14);

    $pdf->Cell(0, 20, 'Lista de Programas', 0, 1, 'C');
    $pdf->Ln(5);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(20, 10, 'ID', 1);
    $pdf->Cell(50, 10, 'Nombre', 1);
    $pdf->Ln();

    foreach ($programas as $programa) {
        $pdf->Cell(20, 10, utf8_decode($programa['idprograma']), 1);
        $pdf->Cell(50, 10, utf8_decode($programa['nombreprograma']), 1);
        $pdf->Ln();
    }

    $pdf->Output();
}

function exportarExcel($programas) {
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=programas.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    echo "ID\tNombre\n";

    foreach ($programas as $programa) {
        echo utf8_decode($programa['idprograma']) . "\t" . utf8_decode($programa['nombreprograma']) . "\n";
    }
}

if (isset($_GET['tipo']) && $_GET['tipo'] === 'pdf') {
    exportarPDF($programas);
} elseif (isset($_GET['tipo']) && $_GET['tipo'] === 'excel') {
    exportarExcel($programas);
} else {
    echo "Especifica el tipo de exportación: 'pdf' o 'excel'.";
}