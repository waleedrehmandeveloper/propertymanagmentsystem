<?php
require_once("../config/db.php");
header('Content-Type: application/json');

$response = [
    "status"  => false,
    "message" => "Something went wrong"
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name        = trim($_POST['name'] ?? '');
    $father_name = trim($_POST['father_name'] ?? '');
    $phone       = trim($_POST['phone'] ?? '');
    $cnic        = trim($_POST['cnic'] ?? '');

    if (empty($name) || empty($phone)) {
        $response["message"] = "Name aur Phone required hai";
        echo json_encode($response);
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO clients (name, father_name, phone, cnic) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $father_name, $phone, $cnic);

    if ($stmt->execute()) {
        $response = [
            "status"  => true,
            "message" => "Client added successfully"
        ];
    } else {
        $response["message"] = "DB Error: " . $stmt->error;
    }

    $stmt->close();
}

echo json_encode($response);
exit;
?>