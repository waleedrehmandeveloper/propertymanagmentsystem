<?php
require_once("../config/db.php");
header('Content-Type: application/json');

$response = [
    "status"  => false,
    "message" => "Something went wrong"
];

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $client_id           = $_POST['client_id'] ?? '';
    $plot_id             = $_POST['plot_id'] ?? '';
    $total_amount        = $_POST['total_amount'] ?? '';
    $payment_method      = $_POST['payment_method'] ?? '';
    $down_payment        = $_POST['down_payment'] ?? 0;
    $payment_plan        = $_POST['payment_plan'] ?? 0;
    $monthly_installment = $_POST['monthly_installment'] ?? 0;
    $sale_date           = $_POST['sale_date'] ?? '';

    // Validation
    if(empty($client_id) || empty($plot_id) || empty($payment_method) || empty($sale_date)){
        $response["message"] = "Sab required fields bharain";
        echo json_encode($response);
        exit;
    }

    // Invoice number auto generate
    $invoice_no = 'INV-' . date('Y') . '-' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);

    // Sale insert karo
    $stmt = $conn->prepare("INSERT INTO sales 
        (invoice_no, client_id, plot_id, total_amount, down_payment, payment_plan, monthly_installment, payment_method, sale_date, status) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $status = $payment_plan == 0 ? 'complete' : 'pending';

    $stmt->bind_param(
        "siiddidsss",
        $invoice_no,
        $client_id,
        $plot_id,
        $total_amount,
        $down_payment,
        $payment_plan,
        $monthly_installment,
        $payment_method,
        $sale_date,
        $status
    );

    if($stmt->execute()){

        // Plot status = sold update karo
        $update = $conn->prepare("UPDATE plots SET status = 'sold' WHERE id = ?");
        $update->bind_param("i", $plot_id);
        $update->execute();

        $response = [
            "status"     => true,
            "message"    => "Sale saved! Invoice: " . $invoice_no,
            "invoice_no" => $invoice_no
        ];

    } else {
        $response["message"] = "DB Error: " . $stmt->error;
    }

    $stmt->close();
}

echo json_encode($response);
exit;
?>