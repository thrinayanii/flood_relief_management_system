<?php
include 'connection.php';

$district = $_GET['district'] ?? "";
$type = $_GET['type'] ?? "";
$severity = $_GET['severity'] ?? "";

$conditions = [];

if($district != ""){
    $conditions[] = "District='$district'";
}

if($type != ""){
    $conditions[] = "ReliefType='$type'";
}

if($severity != ""){
    $conditions[] = "FloodSeverityLevel='$severity'";
}

$whereSQL = "";
if(count($conditions) > 0){
    $whereSQL = "WHERE " . implode(" AND ", $conditions);
}

$total = $conn->query("SELECT COUNT(*) as c FROM reliefdetails $whereSQL")->fetch_assoc()['c'];

$approvedCondition = $conditions;
$approvedCondition[] = "Status='Approved'";
$approvedSQL = "WHERE " . implode(" AND ", $approvedCondition);
$approved = $conn->query("SELECT COUNT(*) as c FROM reliefdetails $approvedSQL")->fetch_assoc()['c'];

$pendingCondition = $conditions;
$pendingCondition[] = "Status='Pending'";
$pendingSQL = "WHERE " . implode(" AND ", $pendingCondition);
$pending = $conn->query("SELECT COUNT(*) as c FROM reliefdetails $pendingSQL")->fetch_assoc()['c'];

$high = $conn->query("SELECT COUNT(*) as c FROM reliefdetails WHERE FloodSeverityLevel='High'")->fetch_assoc()['c'];
$medium = $conn->query("SELECT COUNT(*) as c FROM reliefdetails WHERE FloodSeverityLevel='Medium'")->fetch_assoc()['c'];
$low = $conn->query("SELECT COUNT(*) as c FROM reliefdetails WHERE FloodSeverityLevel='Low'")->fetch_assoc()['c'];
?>