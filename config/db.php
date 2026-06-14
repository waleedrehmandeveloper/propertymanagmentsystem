<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "demosoftware";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

mysqli_set_charset($conn, "utf8mb4");
?>