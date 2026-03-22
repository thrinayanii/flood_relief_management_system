<?php

include __DIR__ . '/../connection.php';

    $role = "User";
    $name = $_POST['name'];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $conn ->prepare("INSERT INTO login (Email,Password,UserRole) VALUES (?,?,?)");
    $stmt->bind_param("sss", $email,$password,$role);

    $stmt->execute();
    $login = $conn -> insert_id;

    $stmt-> close();

    $stmt = $conn->prepare("INSERT INTO user
    (LoginID,UserName,UserContactNo)
    VALUES
    (?, ?, ?)");
    $stmt->bind_param("iss", $login,$name,$phone);
    $stmt -> execute();
    $stmt->close();
    $conn->close();
    
    header("Location: http://localhost/FullStackProject/LoginForm/login.html?success=1");
    exit();

?>
