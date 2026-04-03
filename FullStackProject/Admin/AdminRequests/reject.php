<?php
include 'connection.php';

$id = $_POST['ReliefID'];

$stmt = $conn->prepare("UPDATE reliefdetails SET Status = 'Pending' WHERE ReliefID = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo json_encode([
        "success" => true,
        "id" => $id
    ]);
} else {
    echo json_encode(["success" => false]);
}

$stmt->close();
$conn->close();
?>