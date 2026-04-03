<?php
include 'connection.php';

$result = $conn->query("SELECT DISTINCT District FROM reliefdetails");

while($row = $result->fetch_assoc()){
    $selected = (isset($_GET['district']) && $_GET['district'] == $row['District']) ? "selected" : "";
    echo "<option value='".$row['District']."' $selected>".$row['District']."</option>";
}
?>