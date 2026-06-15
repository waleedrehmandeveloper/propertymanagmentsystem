<?php
require("../config/db.php");

header("Content-Type: application/json");

$plan_name = $_POST['plan_name'] ?? '';
$duration = $_POST['duration'] ?? '';
$frequency = $_POST['payment_frequency'] ?? '';
$late_fine = $_POST['late_fine'] ?? 0;
$status = $_POST['status'] ?? 'active';
$description = $_POST['description'] ?? '';

if (!$plan_name || !$duration || !$frequency) {
    echo json_encode([
        "status" => false,
        "message" => "Required fields missing"
    ]);
    exit;
}

$query = "INSERT INTO installment_plans 
(plan_name, duration_months, payment_frequency, late_fine, status, description)
VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($query);
$stmt->bind_param("sissss", $plan_name, $duration, $frequency, $late_fine, $status, $description);

if ($stmt->execute()) {
    echo json_encode(["status" => true]);
} else {
    echo json_encode([
        "status" => false,
        "message" => $stmt->error
    ]);
}
