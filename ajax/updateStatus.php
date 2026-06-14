<?php
header('Content-Type: application/json');
require("../config/db.php");

if (isset($_POST['id']) && isset($_POST['status'])) {

    $id = $_POST['id'];

    // current status aa raha hai, hame opposite save karna hai
    if ($_POST['status'] == "active") {
        $newStatus = "inactive";
    } else {
        $newStatus = "active";
    }

    $query = "UPDATE login SET status=? WHERE id=? AND role='sales'";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $newStatus, $id);

    if ($stmt->execute()) {
        echo json_encode([
            "success" => true,
            "newStatus" => $newStatus
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "message" => $stmt->error
        ]);
    }
} else {
    echo json_encode([
        "success" => false,
        "message" => "Invalid request"
    ]);
}
