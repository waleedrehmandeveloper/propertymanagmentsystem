<?php
require_once("../config/db.php");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $project_name = $_POST['project_name'] ?? '';
    $unit_no = $_POST['unit_no'] ?? '';
    $floor = $_POST['floor'] ?? '';
    $type = $_POST['type'] ?? '';
    $total_price = $_POST['total_price'] ?? '';

    // Basic validation
    if (empty($project_name) || empty($unit_no) || empty($type) || empty($total_price)) {
        echo json_encode(['status' => false, 'message' => 'Please fill in all required fields.']);
        exit;
    }

    // Prepare and execute the insert query
    $stmt = $conn->prepare("INSERT INTO plots (project_name, unit_no, floor, type, total_price) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $project_name, $unit_no, $floor, $type, $total_price);

    if ($stmt->execute()) {
        echo json_encode(['status' => true, 'message' => 'Project added successfully.']);
    } else {
        echo json_encode(['status' => false, 'message' => 'Error adding project: ' . $stmt->error]);
    }

    $stmt->close();
}
