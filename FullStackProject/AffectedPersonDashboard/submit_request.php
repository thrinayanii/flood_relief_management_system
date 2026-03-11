<?php

session_start();

include 'C:\Users\Gowthaman\Desktop\XAMPP\htdocs\FullStackProject\connection.php';

$id = $_POST['ReliefID'];

$AffectedPersonID = $_SESSION['affectedid'];
$reliefType = $_POST['relief_type'];
$floodSeverity = $_POST['flood_severity'];
$district = $_POST['district'];
$div_sec = $_POST['divisional_secretariat'];
$gn_division = $_POST['gn_division'];
$address = $_POST['address'];
$contact_name = $_POST['contact_name'];
$contact_number = $_POST['contact_number'];
$family_members = $_POST['family_members'];
$description = $_POST['description'];
$status = 'Pending';

if(!empty($id)){
    $stmt = $conn->prepare("UPDATE reliefdetails SET
    AffectedPersonID = ?,
    TypeofRelief = ?,
    District = ?,
    DivisionalSecretariat = ?,
    GNDivision = ?,
    ContactPersonName = ?,
    ContactPersonNumber = ?,
    Address = ?,
    NoOfFamilyMembers = ?,
    FloodSeverityLevel = ?,
    Description = ?,
    Status = ?
    WHERE ReliefID=?");

    $stmt->bind_param(
        "isssssssisssi",
        $AffectedPersonID,
        $reliefType,
        $district,
        $div_sec,
        $gn_division,
        $contact_name,
        $contact_number,
        $address,
        $family_members,
        $floodSeverity,
        $description,
        $status,
        $id
    );
}

else {
    $stmt = $conn->prepare("INSERT INTO reliefdetails
    (AffectedPersonID,TypeofRelief,District,DivisionalSecretariat,GNDivision,ContactPersonName,ContactPersonNumber,Address,NoOfFamilyMembers,FloodSeverityLevel,Description,Status)
    VALUES
    (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssssisss", $AffectedPersonID,$reliefType,$district,$div_sec,$gn_division,$contact_name,$contact_number,$address,$family_members,$floodSeverity,$description,$status);
  
}
    $stmt -> execute();
    $stmt->close();
    $conn->close();
    
    header("Location: http://localhost/FullStackProject/AffectedPersonDashboard/view_requests.php");
?>
