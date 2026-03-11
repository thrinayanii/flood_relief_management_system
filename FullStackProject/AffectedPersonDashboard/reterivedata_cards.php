<?php

include 'C:\Users\Gowthaman\Desktop\XAMPP\htdocs\FullStackProject\connection.php';

$AffectedPersonID = $_SESSION['affectedid'];

$stmt = $conn->prepare("SELECT * 
        FROM reliefdetails
        WHERE AffectedPersonID = ?");

$stmt->bind_param("i", $AffectedPersonID);
$stmt->execute();
$result = $stmt->get_result();

$stmt->close();
$conn->close();

?>