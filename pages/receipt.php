<?php
require_once("../auth/auth.php");
chekLogin();
sellerStatusChecked();
require_once("../fpdf/fpdf.php");
require_once("../config/db.php");

function numberToWords($number)
{
    $ones = [
        '',
        'One',
        'Two',
        'Three',
        'Four',
        'Five',
        'Six',
        'Seven',
        'Eight',
        'Nine',
        'Ten',
        'Eleven',
        'Twelve',
        'Thirteen',
        'Fourteen',
        'Fifteen',
        'Sixteen',
        'Seventeen',
        'Eighteen',
        'Nineteen'
    ];
    $tens = ['', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];

    if ($number == 0) return 'Zero';
    $result = '';

    if ($number >= 10000000) {
        $result .= numberToWords((int)floor($number / 10000000)) . ' Crore ';
        $number = $number % 10000000;
    }
    if ($number >= 100000) {
        $result .= numberToWords((int)floor($number / 100000)) . ' Lakh ';
        $number = $number % 100000;
    }
    if ($number >= 1000) {
        $result .= numberToWords((int)floor($number / 1000)) . ' Thousand ';
        $number = $number % 1000;
    }
    if ($number >= 100) {
        $result .= $ones[(int)floor($number / 100)] . ' Hundred ';
        $number = $number % 100;
    }
    if ($number >= 20) {
        $result .= $tens[(int)floor($number / 10)] . ' ';
        $number = $number % 10;
    }
    if ($number > 0) {
        $result .= $ones[$number] . ' ';
    }

    return trim($result);
}

$sale_id = $_GET['sale_id'] ?? 0;

if (empty($sale_id)) {
    die("Sale ID missing!");
}

$stmt = $conn->prepare("
    SELECT 
        s.invoice_no,
        s.total_amount,
        s.down_payment,
        s.monthly_installment,
        s.payment_method,
        s.sale_date,
        s.payment_plan,
        c.name,
        c.father_name,
        p.unit_no,
        p.floor,
        p.type,
        p.project_name
    FROM sales s
    JOIN clients c ON s.client_id = c.id
    JOIN plots p ON s.plot_id = p.id
    WHERE s.id = ?
");
$stmt->bind_param("i", $sale_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Sale nahi mili!");
}

$data = $result->fetch_assoc();

// Floor logic
$floor = !empty($data['floor']) ? $data['floor'] : $data['type'];
$type  = !empty($data['floor']) ? $data['type'] : '';

// Amount logic - installment ya full
if ($data['payment_plan'] == 0) {
    $printAmount = $data['total_amount'];        // Full payment
} else {
    $printAmount = $data['monthly_installment']; // Monthly kist
}

$amountWords = numberToWords((int)$printAmount) . " Rupees Only";

// PDF banao
$pdf = new FPDF();
$pdf->AddPage('L', 'A4');

$pdf->Image(
    'brosherstemplate/reciept.jpg',
    0,
    0,
    $pdf->GetPageWidth(),
    $pdf->GetPageHeight()
);

$pdf->SetFont('Arial', '', 14);
$pdf->SetTextColor(0, 0, 0);

// Client Name
$pdf->SetXY(55, 62);
$pdf->Cell(80, 8, $data["name"]);

// Father Name
$pdf->SetXY(55, 80);
$pdf->Cell(80, 8, $data["father_name"]);

// Invoice No
$pdf->SetXY(240, 21);
$pdf->Cell(80, 8, $data["invoice_no"]);

// Date
$pdf->SetXY(240, 35);
$pdf->Cell(80, 8, date('d-m-Y', strtotime($data["sale_date"])));

// Unit No
$pdf->SetXY(30, 96);
$pdf->Cell(80, 8, $data["unit_no"]);

// Floor
$pdf->SetXY(140, 96);
$pdf->Cell(60, 8, $floor);

// Type
$pdf->SetXY(230, 96);
$pdf->Cell(60, 8, $type);

// Payment Method
$pdf->SetXY(80, 113);
$pdf->Cell(80, 8, $data["payment_method"]);

// Rupees in Words
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(54, 130);
$pdf->Cell(150, 8, $amountWords);

// Amount
$pdf->SetFont('Arial', 'B', 19);
$pdf->SetXY(50, 154);
$pdf->Cell(80, 8, "Rs. " . number_format($printAmount));

$pdf->Output();
