<?php
include 'connection.php';

$sql = "SELECT DISTINCT(District) FROM reliefdetails";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    echo "<option value='".$row['District']."'>".$row['District']."</option>";
}
?>