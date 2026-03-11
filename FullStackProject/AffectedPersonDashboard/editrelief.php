<?php

include 'C:\Users\Gowthaman\Desktop\XAMPP\htdocs\FullStackProject\connection.php';


$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM reliefdetails WHERE ReliefID = ?");
$stmt->bind_param("i",$id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

?>