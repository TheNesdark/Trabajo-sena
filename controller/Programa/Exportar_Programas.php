<?php
// filepath: c:\Users\Maria Alejandra\Documents\Github\Trabajo\Trabajo-sena\controller\Programas\Exportar_Programas.php
include ('../../config.php');
require ('../fpdf/fpdf.php');

// Consulta para obtener los programas
$programas = $pdo->query("SELECT idprograma, nombreprograma, descripcion, fecha_creacion FROM programa")->fetchAll(PDO::FETCH_ASSOC);

function exportarPDF($programas) {
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 14);

    $pdf->Cell(0, 20, 'Lista de Programas', 0, 1, 'C');
    $pdf->Ln(5);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(20, 10, 'ID', 1);
    $pdf->Cell(50, 10, 'Nombre', 1);
    $pdf->Cell(80, 10, 'Descripción', 1);
    $pdf->Cell(40, 10, 'Fecha Creación', 1);
    $pdf->Ln();

    foreach ($programas as $programa) {
        $pdf->Cell(20, 10, utf8_decode($programa['idprograma']), 1);
        $pdf->Cell(50, 10, utf8_decode($programa['nombreprograma']), 1);
        $pdf->Cell(80, 10, utf8_decode($programa['descripcion']), 1);
        $pdf->Cell(40, 10, utf8_decode($programa['fecha_creacion']), 1);
        $pdf->Ln();
    }

    $pdf->Output();
}

function exportarExcel($programas) {
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=programas.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    echo "ID\tNombre\tDescripción\tFecha Creación\n";

    foreach ($programas as $programa) {
        echo utf8_decode($programa['idprograma']) . "\t" . utf8_decode($programa['nombreprograma']) . "\t" . utf8_decode($programa['descripcion']) . "\t" . utf8_decode($programa['fecha_creacion']) . "\n";
    }
}

if (isset($_GET['tipo']) && $_GET['tipo'] === 'pdf') {
    exportarPDF($programas);
} elseif (isset($_GET['tipo']) && $_GET['tipo'] === 'excel') {
    exportarExcel($programas);
} else {
    echo "Especifica el tipo de exportación: 'pdf' o 'excel'.";
}