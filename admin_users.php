<?php 
include 'connection.php'; 


$result = $conn->query("
    SELECT u.UserID, u.UserName, l.email, u.UserContactNo, u.RegDate
    FROM user u 
    JOIN login l ON u.LoginID = l.LoginID
");

$data = []; 
while($row = $result->fetch_assoc()){ 
    $data[] = $row; 
} 

echo json_encode($data); 
?>