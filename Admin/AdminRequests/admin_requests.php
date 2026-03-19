<?php
include 'connection.php';


$result = $conn->query("
SELECT 
    r.ReliefID,
    u.UserName,
    r.TypeofRelief,
    r.ContactPersonName,
    r.ContactPersonNumber,
    r.Address,
    r.NoOfFamilyMembers,
    r.FloodSeverityLevel,
    r.Status,
    r.date,
    r.Description,
    r.District
FROM reliefdetails r
JOIN user u ON u.UserID = r.UserID
ORDER BY r.ReliefID ASC
");

$requests = [];
while($row = $result->fetch_assoc()){
    $requests[] = $row;
}

echo json_encode($requests);
?>