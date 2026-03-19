<?php

include 'connection.php';

$stmt = $conn->prepare("SELECT COUNT(*) AS total_users 
        FROM user");

$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$total_users = $row['total_users'];

$stmt->close();

$stmt = $conn->prepare("SELECT COUNT(*) AS total_requests
        FROM reliefdetails");

$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$total_requests = $row['total_requests'];
$stmt->close();

$stmt = $conn->prepare("SELECT COUNT(*) AS total_high
        FROM reliefdetails
        WHERE FloodSeverityLevel='High'");


$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$total_high = $row['total_high'];
$stmt->close();

$stmt = $conn->prepare("SELECT COUNT(DISTINCT District) AS total_districts 
        FROM reliefdetails");

$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$total_districts = $row['total_districts'];

$stmt->close();
$conn->close();

$data = [
    "users" => $total_users,
    "requests" => $total_requests,
    "severity" => $total_high,
    "districts" => $total_districts
];

echo json_encode($data);
?>