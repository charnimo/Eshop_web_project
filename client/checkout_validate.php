<?php
session_start();
require('../fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 18);

$pdf->SetFillColor(230, 230, 230);
$pdf->SetTextColor(0, 0, 0);

$pdf->Cell(0, 10, 'Order Summary', 'B', 1, 'C', true);
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 14);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $cc_name = $_POST['cc-name'];

    $pdf->Cell(0, 10, "Customer Information", 0, 1, 'C');
    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, "Name: $firstname $lastname", 0, 1);
    $pdf->Cell(0, 10, "Email: $email", 0, 1);
    $pdf->Cell(0, 10, "Address: $address", 0, 1);
    $pdf->Cell(0, 10, "Account Number: $cc_name", 0, 1);
    $pdf->Ln(10);


    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, "Cart Items", 0, 1, 'C');
    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', 12);
    foreach ($_SESSION['cart'] as $productName => $product) {
        $pdf->Cell(120, 10, $productName, 1, 0);
        $pdf->Cell(35, 10, "{$product['quantity']} x $ {$product['price']}", 1, 0, 'C');
        $pdf->Cell(35, 10, "Total: $ " . number_format($product['quantity'] * $product['price'], 2), 1, 1, 'R');
    }

    $totalPrice = array_sum(array_map(function($product) {
        return $product['quantity'] * $product['price'];
    }, $_SESSION['cart']));
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(155, 10, "Total Price", 1, 0, 'R');
    $pdf->Cell(35, 10, "$ " . number_format($totalPrice, 2), 1, 1, 'R');
}

$pdf->Output();
?>
