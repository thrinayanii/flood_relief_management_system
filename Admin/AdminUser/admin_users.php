<?php
include 'connection.php';

header('Content-Type: application/json');

$result = $conn->query("
    SELECT 
        u.UserID,
        u.UserName,
        l.email,
        u.UserContactNo,
        u.RegDate
    FROM user u 
    JOIN login l ON u.LoginID = l.LoginID
    ORDER BY u.UserID ASC
");

$data = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);
exit;
?>