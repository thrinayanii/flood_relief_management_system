<?php
session_start();

include 'connection.php';

$id = $_GET['id'];

if(!empty($id)){
    $stmt = $conn->prepare("DELETE FROM reliefdetails WHERE ReliefID=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
header("Location: http://localhost/FullStackProject/User/view_requests.php");

?>