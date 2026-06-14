<?php
    require("../config/db.php");
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $hashpassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO login (name, email, phone, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $name, $email, $phone, $hashpassword);
    if($stmt->execute()){
        echo json_encode(["status" => true, "message" => "Seller added successfully"]);
    } else {
        echo json_encode(["status" => false, "message" => "Error: " . $stmt->error]);
    }
    $stmt->close();
    $conn->close();
?>