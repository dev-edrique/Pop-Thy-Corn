<?php 
require_once ("../../../fpdf/fpdf.php");
date_default_timezone_set('Asia/Manila');
session_start();

//sessions
$order = $_SESSION['product_name'];
$qty = $_SESSION['orderQty'];
$total = $_SESSION['total'];
$product_qty = $_SESSION['product_qty'];
$last_id = $_SESSION['last_id'];
$cash = $_SESSION['cash'];
$change = $_SESSION['change']

$date = date("Y-m-d h:i a", time());

//pdf
ob_start();
$pdf = new FPDF();
$pdf->AddPage('L');

$pdf->SetFont('arial','',12);
$pdf->Cell(0,10,"Invoice",1,1,'C');
$pdf->Cell(45,10,"Product",1,0);
$pdf->Cell(45,10,"Quantity",1,0);
$pdf->Cell(45,10,"Cash",1,0);
$pdf->Cell(45,10,"Change",1,0);
$pdf->Cell(45,10,"Date",1,0);
$pdf->Ln();

$pdf->Cell(45,10,$order,1,0);
$pdf->Cell(45,10,$qty,1,0);
$pdf->Cell(45,10,$total,1,0);
$pdf->Cell(45,10,$_POST['cash'],1,0);
$pdf->Cell(45,10,$process,1,0);
$pdf->Cell(45,10,$date,1,0);

$file = $date.'.pdf';
$pdf->output($file,'D');
ob_end_flush(); 
?>