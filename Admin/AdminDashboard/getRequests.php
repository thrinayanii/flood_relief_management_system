<?php
include 'connection.php';

$result = $conn->query("
    SELECT 
        r.ReliefID,
        u.UserName,
        r.TypeofRelief,
        r.NoOfFamilyMembers,
        r.FloodSeverityLevel,
        r.date,
        r.District
    FROM reliefdetails r
    JOIN user u ON u.UserID = r.UserID
    ORDER BY r.ReliefID ASC
");

$data = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);
?>