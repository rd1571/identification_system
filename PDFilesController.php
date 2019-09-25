<?php 

require_once 'ViewController.php';

$data = json_decode(file_get_contents("php://input"), true);



$pdf = new ViewPDF();
// $pdf->generateInvoicesPDF();
$pdf->generateIdentification( $data );

