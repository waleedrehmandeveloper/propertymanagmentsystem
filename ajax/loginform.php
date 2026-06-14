<?php
session_start();
require_once("../config/db.php");

header("Content-Type: application/json");

$email    = trim($_POST["email"] ?? '');
$password = $_POST["password"] ?? '';


$query = "SELECT id, username, email, phone, password, status, role FROM login WHERE email = ?";
$stmt  = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    $user = $result->fetch_assoc();

    if(password_verify($password, $user["password"])){
        $_SESSION["adminid"]       = $user["id"];
        $_SESSION["adminphone"]    = $user["phone"];
        $_SESSION["adminusername"] = $user["username"];
        $_SESSION["role"]          = $user["role"];
        $_SESSION["status"]        = $user["status"];

        $response = [
            "status"  => true,
            "message" => "Login successful"
        ];
        echo json_encode($response);
    }
    }

exit;
?>