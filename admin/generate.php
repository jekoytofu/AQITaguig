<?php

require_once("DBController.php");
$db_handle = new DBController();
$result = $db_handle->runQuery("SELECT * FROM feedbacks");
$header = $db_handle->runQuery("SELECT `COLUMN_NAME`
FROM `INFORMATION_SCHEMA`.`COLUMNS`
WHERE `TABLE_SCHEMA`='mediclock_db'
    AND `TABLE_NAME`='feedbacks'");

ob_start();
require('fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',11);
$pdf->Text(93,5,'Feedback Report','C');
$title = 'Feedback Report';
$pdf->SetTitle($title);
foreach($header as $heading) {
	foreach($heading as $column_heading)
		$pdf->Cell(30,11,$column_heading,1);
}
foreach($result as $row) {
	$pdf->SetFont('Arial','',11);
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(30,11,$column,1);
}
$pdf->Output();
?>
