<?php
// filepath: c:\Users\Maria Alejandra\Documents\Github\Trabajo\Trabajo-sena\controller\Acciones\Exportar_Acciones.php
include ('../../config.php');
require ('../fpdf/fpdf.php');

// Consulta para obtener las acciones
$acciones = $pdo->query("SELECT idaccion, nombreaccion, descripcion, fecha_creacion FROM acciones")->fetchAll(PDO::FETCH_ASSOC);

function exportarPDF($acciones) {
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 14);

    $pdf->Cell(0, 20, 'Lista de Acciones', 0, 1, 'C');
    $pdf->Ln(5);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(20, 10, 'ID', 1);
    $pdf->Cell(50, 10, 'Nombre', 1);
    $pdf->Cell(80, 10, 'Descripción', 1);
    $pdf->Cell(40, 10, 'Fecha Creación', 1);
    $pdf->Ln();

    foreach ($acciones as $accion) {
        $pdf->Cell(20, 10, utf8_decode($accion['idaccion']), 1);
        $pdf->Cell(50, 10, utf8_decode($accion['nombreaccion']), 1);
        $pdf->Cell(80, 10, utf8_decode($accion['descripcion']), 1);
        $pdf->Cell(40, 10, utf8_decode($accion['fecha_creacion']), 1);
        $pdf->Ln();
    }

    $pdf->Output();
}

function exportarExcel($acciones) {
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=acciones.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    echo "ID\tNombre\tDescripción\tFecha Creación\n";

    foreach ($acciones as $accion) {
        echo utf8_decode($accion['idaccion']) . "\t" . utf8_decode($accion['nombreaccion']) . "\t" . utf8_decode($accion['descripcion']) . "\t" . utf8_decode($accion['fecha_creacion']) . "\n";
    }
}

if (isset($_GET['tipo']) && $_GET['tipo'] === 'pdf') {
    exportarPDF($acciones);
} elseif (isset($_GET['tipo']) && $_GET['tipo'] === 'excel') {
    exportarExcel($acciones);
} else {
    echo "Especifica el tipo de exportación: 'pdf' o 'excel'.";
}