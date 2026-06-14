<?php
    header('Content-Type: application/json');
    require("../config/db.php");
    
    $nameusername = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $status = $_POST['status'];
    $role = $_POST['role'];

    $hashpassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO login (username, email, phone, password,status,role) VALUES (?, ?, ?, ?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssss", $nameusername, $email, $phone, $hashpassword, $status, $role);
    if($stmt->execute()){
        echo json_encode(["status" => true, "message" => "Seller added successfully"]);
    } else {
        echo json_encode(["status" => false, "message" => "Error: " . $stmt->error]);
    }
    $stmt->close();
    $conn->close();
?>