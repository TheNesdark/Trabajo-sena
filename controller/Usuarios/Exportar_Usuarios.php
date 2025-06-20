<?php
include ('../../config.php');
require ('../fpdf/fpdf.php');


$usuarios = $pdo->query("SELECT * FROM usuarios")->fetchAll(PDO::FETCH_ASSOC);

function exportarPDF($usuarios) {
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 14);

    $pdf->Cell(0, 20, 'Lista de Usuarios', 0, 1, 'C');
    $pdf->Ln(5);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(40, 10, 'Usuario', 1);
    $pdf->Cell(50, 10, 'Nombre', 1);
    $pdf->Cell(50, 10, 'Email', 1);
    $pdf->Ln();

    foreach ($usuarios as $usuario) {
        $pdf->Cell(40, 10, utf8_decode($usuario['usuario']), 1);
        $pdf->Cell(50, 10, utf8_decode($usuario['nombre']), 1);
        $pdf->Cell(50, 10, utf8_decode($usuario['email']), 1);
        $pdf->Ln();
    }

    $pdf->Output();
}

function exportarExcel($usuarios) {
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=usuarios.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    echo "Usuario\tNombre\tEmail\n";

    foreach ($usuarios as $usuario) {
        echo utf8_decode($usuario['usuario']) . "\t" . utf8_decode($usuario['nombre']) . "\t" . utf8_decode($usuario['email']) . "\n";
    }
}

if (isset($_GET['tipo']) && $_GET['tipo'] === 'pdf') {
    exportarPDF($usuarios);
} elseif (isset($_GET['tipo']) && $_GET['tipo'] === 'excel') {
    exportarExcel($usuarios);
} else {
    echo "Especifica el tipo de exportación: 'pdf' o 'excel'.";
}
