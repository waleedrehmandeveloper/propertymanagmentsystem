<?php
session_start();
require_once("../config/db.php");

header("Content-Type: application/json");

$email    = trim($_POST["email"] ?? '');
$password = $_POST["password"] ?? '';

$query = "SELECT id, username, email, phone, password, status, role FROM login WHERE email = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo json_encode([
        "status" => false,
        "message" => "Invalid email or password"
    ]);
    exit;
}

$user = $result->fetch_assoc(); // ONLY ONCE

// 1. password check
if (!password_verify($password, $user["password"])) {
    echo json_encode([
        "status" => false,
        "message" => "Invalid email or password"
    ]);
    exit;
}

// 2. STATUS CHECK (RIGHT PLACE)
if ($user["role"] === "sales" && $user["status"] !== "active") {
    echo json_encode([
        "status" => false,
        "message" => "Your account is blocked by admin"
    ]);
    exit;
}

// 3. SESSION SET (LOGIN SUCCESS)
$_SESSION["user_id"]       = $user["id"];
$_SESSION["adminphone"]    = $user["phone"];
$_SESSION["adminusername"] = $user["username"];
$_SESSION["role"]          = $user["role"];
$_SESSION["status"]        = $user["status"];

echo json_encode([
    "status" => true,
    "message" => "Login successful"
]);

exit;
