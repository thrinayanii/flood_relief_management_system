<?php

include 'connection.php';

$UserID = $_SESSION['userid'];

$stmt = $conn->prepare("SELECT * 
        FROM reliefdetails
        WHERE UserID = ?");

$stmt->bind_param("i", $UserID);
$stmt->execute();
$result = $stmt->get_result();

$stmt->close();
$conn->close();

?>