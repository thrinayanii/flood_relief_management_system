<?php
include 'connection.php';

if(isset($_POST['userID'])) {
    $userID = $_POST['userID'];


    $stmt1 = $conn->prepare("DELETE FROM reliefdetails WHERE UserID = ?");
    $stmt1->bind_param("i", $userID);
    $stmt1->execute();
    $stmt1->close();

    $stmtLogin = $conn->prepare("SELECT LoginID FROM user WHERE UserID = ?");
    $stmtLogin->bind_param("i", $userID);
    $stmtLogin->execute();
    $stmtLogin->bind_result($loginID);
    $stmtLogin->fetch();
    $stmtLogin->close();

    $stmt2 = $conn->prepare("DELETE FROM user WHERE UserID = ?");
    $stmt2->bind_param("i", $userID);
    $stmt2->execute();
    $stmt2->close();

    $stmt3 = $conn->prepare("DELETE FROM login WHERE LoginID = ?");
    $stmt3->bind_param("i", $loginID);
    $stmt3->execute();
    $stmt3->close();

    header("Location: http://localhost/FullStackProject/Admin/AdminUser/admin_users.html");
    exit();
}
    
?>
