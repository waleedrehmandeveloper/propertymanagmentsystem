<!-- UPDATE VIEW STAFF.PHP TO USE AJAX FOR STATUS UPDATE -->

<?php
    header('Content-Type: application/json');
    require("../config/db.php");

    $id = $_POST['id'];
    $status = $_POST['status'];

    if(isset($id) && isset($status)){
        $query = "UPDATE login SET status = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $status, $id);
        if($stmt->execute()){
            echo json_encode(["status" => true, "message" => "User status updated successfully"]);
        } else {
            echo json_encode(["status" => false, "message" => "Error: " . $stmt->error]);
        }
        $stmt->close();
        $conn->close();
        exit;
    }

    echo json_encode(["status" => false, "message" => "Invalid request"]);
    $conn->close();