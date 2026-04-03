<?php 
include 'connection.php';


$district = $_GET['district'] ?? "";
$type = $_GET['type'] ?? "";
$severity = $_GET['severity'] ?? "";


$conditions = [];
if($district != "") $conditions[] = "District='$district'";
if($type != "") $conditions[] = "TypeOfRelief='$type'";
if($severity != "") $conditions[] = "FloodSeverityLevel='$severity'";

$whereSQL = count($conditions) ? "WHERE " . implode(" AND ", $conditions) : "";

$total = $conn->query("SELECT COUNT(*) as c FROM reliefdetails $whereSQL")->fetch_assoc()['c'] ?? 0;


$approved = $conn->query("SELECT COUNT(*) as c FROM reliefdetails " . ($whereSQL ? $whereSQL . " AND Status='Approved'" : "WHERE Status='Approved'"))->fetch_assoc()['c'] ?? 0;
$pending  = $conn->query("SELECT COUNT(*) as c FROM reliefdetails " . ($whereSQL ? $whereSQL . " AND Status='Pending'" : "WHERE Status='Pending'"))->fetch_assoc()['c'] ?? 0;

$high    = $conn->query("SELECT COUNT(*) as c FROM reliefdetails " . ($whereSQL ? $whereSQL . " AND FloodSeverityLevel='High'" : "WHERE FloodSeverityLevel='High'"))->fetch_assoc()['c'] ?? 0;
$medium  = $conn->query("SELECT COUNT(*) as c FROM reliefdetails " . ($whereSQL ? $whereSQL . " AND FloodSeverityLevel='Medium'" : "WHERE FloodSeverityLevel='Medium'"))->fetch_assoc()['c'] ?? 0;
$low     = $conn->query("SELECT COUNT(*) as c FROM reliefdetails " . ($whereSQL ? $whereSQL . " AND FloodSeverityLevel='Low'" : "WHERE FloodSeverityLevel='Low'"))->fetch_assoc()['c'] ?? 0;


$food     = $conn->query("SELECT COUNT(*) as c FROM reliefdetails " . ($whereSQL ? $whereSQL . " AND TypeOfRelief='Food'" : "WHERE TypeOfRelief='Food'"))->fetch_assoc()['c'] ?? 0;
$water    = $conn->query("SELECT COUNT(*) as c FROM reliefdetails " . ($whereSQL ? $whereSQL . " AND TypeOfRelief='Water'" : "WHERE TypeOfRelief='Water'"))->fetch_assoc()['c'] ?? 0;
$medicine = $conn->query("SELECT COUNT(*) as c FROM reliefdetails " . ($whereSQL ? $whereSQL . " AND TypeOfRelief='Medicine'" : "WHERE TypeOfRelief='Medicine'"))->fetch_assoc()['c'] ?? 0;
$shelter  = $conn->query("SELECT COUNT(*) as c FROM reliefdetails " . ($whereSQL ? $whereSQL . " AND TypeOfRelief='Shelter'" : "WHERE TypeOfRelief='Shelter'"))->fetch_assoc()['c'] ?? 0;

$districts = $conn->query("SELECT DISTINCT District FROM reliefdetails")->fetch_all(MYSQLI_ASSOC);
?>