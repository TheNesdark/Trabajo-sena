<?php
require ('../../config.php');
require ('../fpdf/fpdf.php');

$fichas = $pdo->query("SELECT ficha.nficha, programa.nombreprograma FROM ficha INNER JOIN programa ON ficha.idprograma = programa.idprograma")->fetchAll(PDO::FETCH_ASSOC);

function exportarPDF($fichas) {
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 14);

    $pdf->Cell(0, 20, 'Lista de Fichas', 0, 1, 'C');
    $pdf->Ln(5);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(40, 10, 'Número Ficha', 1);
    $pdf->Cell(50, 10, 'Programa', 1);
    $pdf->Ln();

    foreach ($fichas as $ficha) {
        $pdf->Cell(40, 10, utf8_decode($ficha['nficha']), 1);
        $pdf->Cell(50, 10, utf8_decode($ficha['nombreprograma']), 1);
        $pdf->Ln();
    }

    $pdf->Output();
}

function exportarExcel($fichas) {
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=fichas.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    echo "Número Ficha\tPrograma\n";

    foreach ($fichas as $ficha) {
        echo utf8_decode($ficha['nficha']) . "\t" . utf8_decode($ficha['nombreprograma']) . "\n";
    }
}

if (isset($_GET['tipo']) && $_GET['tipo'] === 'pdf') {
    exportarPDF($fichas);
} elseif (isset($_GET['tipo']) && $_GET['tipo'] === 'excel') {
    exportarExcel($fichas);
} else {
    echo "Especifica el tipo de exportación: 'pdf' o 'excel'.";
}