<?php
include ('../../config.php');
require ('../fpdf/fpdf.php');

$aprendices = $pdo->query("SELECT * FROM aprendiz")->fetchAll(PDO::FETCH_ASSOC);

function exportarPDF($aprendices) {
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
    $pdf->Cell(50, 10, 'Celular', 1);
    $pdf->Cell(50, 10, 'Correo', 1);
    $pdf->Cell(50, 10, 'Direcccion', 1);
    $pdf->Ln();

    foreach ($aprendices as $aprendiz) {
        $pdf->Cell(40, 10, utf8_decode($aprendiz['idaprendiz']), 1);
        $pdf->Cell(40, 10, utf8_decode($aprendiz['tipodoc']), 1);
        $pdf->Cell(50, 10, utf8_decode($aprendiz['nombres']), 1);
        $pdf->Cell(50, 10, utf8_decode($aprendiz['apellidos']), 1);
        $pdf->Cell(50, 10, utf8_decode($aprendiz['celular']), 1);
        $pdf->Cell(50, 10, utf8_decode($aprendiz['email']), 1);
        $pdf->Cell(50, 10, utf8_decode($aprendiz['direccion']), 1);
        $pdf->Ln();
    }

    $pdf->Output();
}

function exportarExcel($aprendices) {
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=aprendices.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    echo "Documento\tTipo\tNombre\tApellido\tCelular\tCorreo\tDireccion\n";

    foreach ($aprendices as $aprendiz) {
        echo utf8_decode($aprendiz['idaprendiz']) . "\t" . 
             utf8_decode($aprendiz['tipodoc']) . "\t" . 
             utf8_decode($aprendiz['nombres']) . "\t" . 
             utf8_decode($aprendiz['apellidos']) . "\t" . 
             utf8_decode($aprendiz['celular']) . "\t" . 
             utf8_decode($aprendiz['email']) . "\t" . 
             utf8_decode($aprendiz['direccion']) . "\n";
    }
}

if (isset($_GET['tipo']) && $_GET['tipo'] === 'pdf') {
    exportarPDF($aprendices);
} elseif (isset($_GET['tipo']) && $_GET['tipo'] === 'excel') {
    exportarExcel($aprendices);
} else {
    echo "Especifica el tipo de exportación: 'pdf' o 'excel'.";
}