<?php
session_start();

include 'C:\Users\Gowthaman\Desktop\XAMPP\htdocs\FullStackProject\connection.php';

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn-> prepare("SELECT LoginID,Password,UserRole
                            FROM login
                            WHERE Email = ?");
$stmt->bind_param("s",$email);
$stmt->execute();

$results = $stmt->get_result();
if($results->num_rows === 0){
    echo "Invalid email or password !";
    exit();
}
    $user = $results->fetch_assoc();

    $_SESSION['loginid'] = $user['LoginID'];
    $_SESSION['role'] = $user['UserRole'];

    if($user['UserRole'] === 'Affected Person'){
        $stmt = $conn-> prepare("SELECT AffectedPersonName
        FROM affectedperson
        WHERE LoginID = ?");
    

    $stmt->bind_param("i",$user['LoginID']);
    $stmt->execute();
    $cust = $stmt->get_result()->fetch_assoc();
    echo "Give me some time :)";
    //header("Location: http://localhost/FullStackProject/AffectedPersonRegister/register.html");
    exit();
    }

else if ($user['UserRole'] === 'Admin') {

    $stmt = $conn->prepare(
        "SELECT AdminName 
         FROM admin 
         WHERE LoginID = ?"
    );
    $stmt->bind_param("i", $user['LoginID']);
    $stmt->execute();
    $sup = $stmt->get_result()->fetch_assoc();
    echo "Give me some time :)";
    //header("");
    exit();
}

$stmt->close();
$conn->close();
?>
