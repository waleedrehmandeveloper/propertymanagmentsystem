<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ . "/../config/db.php");

function chekLogin()
{
    if (!isset($_SESSION["user_id"])) {
        header("Location: ../index.php");
        exit();
    }

    if ($_SESSION["role"] !== "admin" && $_SESSION["role"] !== "sales") {
        header("Location: ../index.php");
        exit();
    }
}
function alreadyLoggedIn()
{
    if (isset($_SESSION["user_id"])) {
        header("Location: pages/dashboard.php");
        exit();
    }
}

function sellerStatusChecked()
{
    global $conn;

    if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "sales") {
        return;
    }


    $id = $_SESSION["user_id"];

    $query = "SELECT status FROM login WHERE id = ? AND role = 'sales' AND role = 'sales' LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $user = $stmt->get_result()->fetch_assoc();

    if (!$user || $user["status"] != "active") {
        session_destroy();
        header("Location: ../index.php?blocked");
        exit();
    }
}
