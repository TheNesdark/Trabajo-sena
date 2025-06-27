<?php
include ('../../config.php');
require ('../fpdf/fpdf.php');

$aprendices = $pdo->query("SELECT * FROM aprendiz")->fetchAll(PDO::FETCH_ASSOC);

function exportarPDF($aprendices) {
    $pdf = new FPDF('L', 'mm', 'A4'); // Horizontal orientation for more columns
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 14);

    $pdf->Cell(0, 15, 'Lista de Aprendices', 0, 1, 'C');
    $pdf->Ln(2);

    $pdf->SetFont('Arial', 'B', 10);
    // Ajusta los anchos de columna para que quepan en la hoja
    $pdf->Cell(30, 10, 'Documento', 1);
    $pdf->Cell(20, 10, 'Tipo', 1);
    $pdf->Cell(35, 10, 'Nombre', 1);
    $pdf->Cell(35, 10, 'Apellido', 1);
    $pdf->Cell(30, 10, 'Celular', 1);
    $pdf->Cell(55, 10, 'Correo', 1);
    $pdf->Cell(45, 10, 'Direccion', 1);
    $pdf->Cell(25, 10, 'N*Ficha', 1);
    $pdf->Ln();

    $pdf->SetFont('Arial', '', 10);
    foreach ($aprendices as $aprendiz) {
        $pdf->Cell(30, 10, utf8_decode($aprendiz['idaprendiz']), 1);
        $pdf->Cell(20, 10, utf8_decode($aprendiz['tipodoc']), 1);
        $pdf->Cell(35, 10, utf8_decode($aprendiz['nombres']), 1);
        $pdf->Cell(35, 10, utf8_decode($aprendiz['apellidos']), 1);
        $pdf->Cell(30, 10, utf8_decode($aprendiz['celular']), 1);
        $pdf->Cell(55, 10, utf8_decode($aprendiz['email']), 1);
        $pdf->Cell(45, 10, utf8_decode($aprendiz['direccion']), 1);
        $pdf->Cell(25, 10, utf8_decode($aprendiz['nficha']), 1);
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