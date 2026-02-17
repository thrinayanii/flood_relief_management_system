<?php

include 'C:\Users\Gowthaman\Desktop\XAMPP\htdocs\FullStackProject\connection.php';

    $role = "Affected Person";
    $firstname = $_POST['fname'];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $conn ->prepare("INSERT INTO login (Email,Password,UserRole) VALUES (?,?,?)");
    $stmt->bind_param("sss", $email,$password,$role);

    $stmt->execute();
    $login = $conn -> insert_id;

    $stmt-> close();

    $stmt = $conn->prepare("INSERT INTO affectedperson
    (LoginID, AffectedPersonName,AffectedPersonContactNo)
    VALUES
    (?, ?, ?)");
    $stmt->bind_param("iss", $login,$firstname,$phone);
    $stmt -> execute();
    $stmt->close();
    $conn->close();

    header("Location: http://localhost/DBMS/LoginForm/loginform.html");
    exit();

?>
