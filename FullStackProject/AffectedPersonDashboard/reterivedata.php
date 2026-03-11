<?php

include 'C:\Users\Gowthaman\Desktop\XAMPP\htdocs\FullStackProject\connection.php';

$AffectedPersonID = $_SESSION['affectedid'];

$stmt = $conn->prepare("SELECT COUNT(*) AS total_requests 
        FROM reliefdetails
        WHERE AffectedPersonID = ?");

$stmt->bind_param("i", $AffectedPersonID);

$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$total_requests = $row['total_requests'];

$stmt->close();

$stmt = $conn->prepare("SELECT COUNT(*) AS total_pending 
        FROM reliefdetails
        WHERE AffectedPersonID = ? AND Status = 'Pending'");

        $stmt->bind_param("i", $AffectedPersonID);

$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$total_pending = $row['total_pending'];
$stmt->close();

$stmt = $conn->prepare("SELECT COUNT(*) AS total_approved 
        FROM reliefdetails
        WHERE AffectedPersonID = ? AND Status = 'Approved'");

        $stmt->bind_param("i", $AffectedPersonID);

$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$total_approved = $row['total_approved'];
$stmt->close();

$stmt = $conn->prepare("SELECT COUNT(*) AS total_complete 
        FROM reliefdetails
        WHERE AffectedPersonID = ? AND Status = 'Completed'");

        $stmt->bind_param("i", $AffectedPersonID);

$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$total_complete = $row['total_complete'];

$stmt->close();
$conn->close();
?>
        

