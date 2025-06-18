<?php
include ('../../config.php');
require ('../../fpdf/fpdf.php');


$usuarios = $pdo->query("SELECT * FROM usuarios");
$datos = $usuarios->fetchAll(PDO::FETCH_ASSOC);


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);


$pdf->Cell(0, 20, 'Lista de Usuarios', 0, 1, 'C');
$pdf->Ln(5);


$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(40, 20, 'Usuario', 1);
$pdf->Cell(50, 20, 'Nombre', 1);
$pdf->Cell(50, 20, 'Email', 1);
$pdf->Ln();


foreach ($datos as $usuario) {
    $pdf->Cell(40, 20, utf8_decode($usuario['usuario']), 1);
    $pdf->Cell(50, 20, utf8_decode($usuario['nombre']), 1);
    $pdf->Cell(50, 20, utf8_decode($usuario['email']), 1);
    $pdf->Ln();
}


$pdf->Output();
?>
