<?php
$NomeCompleto=filter_input(INPUT_COOKIE, "nome");
//include("./masterPage.php");
require('fpdf/fpdf.php');
$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

$pdf->SetXY(10, 75);
$w = "Certifica-se que \"$NomeCompleto\" participou no Robo Bombeiro 2015, integrado nas Jornadas de Engenharia ";
$w .= "Informática do Instituto Politécnico da Guarda (IPG), realizado no dia 05/01/2015, com a duração de 2 horas, na Escola Superior de ";
$w .= "Tecnologia e Gestão do IPG. O Workshop foi proferido por Orador.";
$w = utf8_decode($w);

$pdf->MultiCell(0, 10, $w, 0, 'J', false);
$pdf->Output();