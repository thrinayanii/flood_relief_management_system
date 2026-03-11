<?php

session_start();

include 'C:\Users\Gowthaman\Desktop\XAMPP\htdocs\FullStackProject\connection.php';

$AffectedPersonID = $_SESSION['affectedid'];

$relief_type = isset($_GET['relief_type']) ? $_GET['relief_type'] : '';
$severity_level = isset($_GET['severity_level']) ? $_GET['severity_level'] : '';
$status_level = isset($_GET['status']) ? $_GET['status'] : '';

if($relief_type != '' && $severity_level != '' && $status_level != ''){
    $stmt = $conn->prepare("SELECT * FROM reliefdetails WHERE TypeofRelief = ? AND FloodSeverityLevel = ? AND Status = ? AND AffectedPersonID = ?");
    $stmt->bind_param("sssi",$relief_type,$severity_level,$status_level,$AffectedPersonID);
} 
elseif($relief_type != '' && $severity_level != ''){
    $stmt = $conn->prepare("SELECT * FROM reliefdetails WHERE TypeofRelief = ? AND FloodSeverityLevel = ? AND AffectedPersonID = ?");
    $stmt->bind_param("ssi", $relief_type,$severity_level,$AffectedPersonID);
} 
elseif($relief_type != ''&& $status_level != ''){
    $stmt = $conn->prepare("SELECT * FROM reliefdetails WHERE TypeofRelief = ? AND Status = ? AND AffectedPersonID = ?");
    $stmt->bind_param("ssi", $relief_type,$status_level,$AffectedPersonID);
} 
elseif($severity_level != '' && $status_level != ''){
    $stmt = $conn->prepare("SELECT * FROM reliefdetails WHERE FloodSeverityLevel = ? AND Status = ? AND AffectedPersonID = ?");
    $stmt->bind_param("ssi",$severity_level,$status_level,$AffectedPersonID);
} 
elseif($relief_type != ''){
     $stmt = $conn->prepare("SELECT * FROM reliefdetails WHERE TypeofRelief = ? AND AffectedPersonID = ?"); 
     $stmt->bind_param("si", $relief_type,$AffectedPersonID);
}
elseif($severity_level != ''){
     $stmt = $conn->prepare("SELECT * FROM reliefdetails WHERE FloodSeverityLevel = ? AND AffectedPersonID = ?"); 
     $stmt->bind_param("si", $severity_level,$AffectedPersonID);
}
elseif($status_level != ''){
     $stmt = $conn->prepare("SELECT * FROM reliefdetails WHERE Status = ? AND AffectedPersonID = ?");
     $stmt->bind_param("si",$status_level,$AffectedPersonID); 
}
else {
    
    header("Location: http://localhost/FullStackProject/AffectedPersonDashboard/view_requests.php");
    exit();
}

$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Requests - Flood Relief Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-light">
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="http://localhost/FullStackProject/AffectedPersonDashboard/dashboard.php">
                <i class="bi bi-shield-fill-check me-2"></i>
                Flood Relief System
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/FullStackProject/AffectedPersonDashboard/dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/FullStackProject/AffectedPersonDashboard/create_request.php">Create Request</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="http://localhost/FullStackProject/AffectedPersonDashboard/view_requests.php">My Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/FullStackProject/index.html">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-5">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="display-5 fw-bold">
                    <i class="bi bi-list-check text-primary"></i> 
                    My Relief Requests
                </h1>
                <p class="lead text-muted mb-0">View and manage your flood relief requests</p>
            </div>
            <a href="http://localhost/FullStackProject/AffectedPersonDashboard/create_request.php" class="btn btn-primary btn-lg">
                <i class="bi bi-plus-circle me-2"></i>
                New Request
            </a>
        </div>

        <!-- Filter Section -->
        <div class="card border-0 shadow-sm mb-4">
            <form method="GET" action="http://localhost/FullStackProject/AffectedPersonDashboard/filterrelief.php">
             <div class="card-body">
                <div class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Relief Type</label>
                        <select class="form-select" name="relief_type">
                            <option value="">All Types</option>
                            <option value="Food" <?php if($relief_type == "Food") echo "selected"; ?>>Food</option>
                            <option value="Water" <?php if($relief_type == "Water") echo "selected"; ?>>Water</option>
                            <option value="Medicine" <?php if($relief_type == "Medicine") echo "selected"; ?>>Medicine</option>
                            <option value="Shelter" <?php if($relief_type == "Shelter") echo "selected"; ?>>Shelter</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Severity</label>
                        <select class="form-select" name="severity_level">
                            <option value="">All Levels</option>
                            <option value="Low" <?php if($severity_level == "Low") echo "selected"; ?>>Low</option>
                            <option value="Medium" <?php if($severity_level == "Medium") echo "selected"; ?>>Medium</option>
                            <option value="High" <?php if($severity_level == "High") echo "selected"; ?>>High</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Status</label>
                        <select class="form-select" name="status">
                            <option value="">All Status</option>
                            <option value="Pending" <?php if($status_level == "Pending") echo "selected"; ?>>Pending</option>
                            <option value="Approved" <?php if($status_level == "Approved") echo "selected"; ?>>Approved</option>
                            <option value="Completed" <?php if($status_level == "Completed") echo "selected"; ?>>Completed</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-primary w-100">
                            <i class="bi bi-funnel me-2"></i>Filter
                        </button>
                    </div>
                </div>
            </div>
        </div>
<div class="container mt-5">
    <a href="http://localhost/FullStackProject/AffectedPersonDashboard/view_requests.php" class="btn btn-secondary mb-4">Reset Filter</a>
 <div class="row g-4">
           <?php while($row = $result->fetch_assoc()) { ?>

            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h5 class="card-title fw-bold mb-1">Relief ID #<?php echo $row['ReliefID']; ?></h5>
                                <small class="text-muted">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    Submitted: <?php echo date("M d, Y", strtotime($row['date'])); ?>
                                </small>
                            </div>
                            <span class="badge bg-warning text-dark rounded-pill px-3 py-2"></span>
                            <?php 
                                if($row['Status'] == 'Approved'){
                                 ?>
                                    <span class="badge bg-info text-dark rounded-pill px-3 py-2">
                                        <?php echo $row['Status']; ?> 
                                    </span>
                                <?php }

                                elseif($row['Status'] == 'Pending'){
                                 ?>
                                    <span class="badge bg-warning text-dark rounded-pill px-3 py-2">
                                        <?php echo $row['Status']; ?> 
                                    </span>
                                <?php }

                                elseif($row['Status'] == 'Completed'){
                                 ?>
                                    <span class="badge bg-success rounded-pill px-3 py-2">
                                        <?php echo $row['Status']; ?> 
                                    </span>
                                <?php } ?>
                        </div>
                        
                        <div class="mb-3">
                                <?php 
                                if($row['TypeofRelief'] == 'Food'){
                                 ?>
                                    <span class="badge bg-success me-2">
                                        <i class="bi bi-basket me-1"></i><?php echo $row['TypeofRelief']; ?> 
                                    </span>
                                <?php }
                             
                                elseif($row['TypeofRelief'] == 'Water'){
                                 ?>
                                    <span class="badge bg-info me-2">
                                        <i class="bi bi-droplet me-1"></i><?php echo $row['TypeofRelief']; ?> 
                                    </span>
                                <?php }
 
                                elseif($row['TypeofRelief'] == 'Medicine'){
                                 ?>
                                    <span class="badge bg-danger me-2">
                                        <i class="bi bi-heart-pulse me-1"></i><?php echo $row['TypeofRelief']; ?> 
                                    </span>
                                <?php }

                                elseif($row['TypeofRelief'] == 'Shelter'){
                                    ?>
                                    <span class="badge bg-primary me-1">
                                        <i class="bi bi-house me-1"></i><?php echo $row['TypeofRelief']; ?> 
                                    </span>
                                <?php }
                               
                                if($row['FloodSeverityLevel'] == 'High'){
                                 ?>
                                    <span class="badge bg-danger">
                                        <i class="bi bi-exclamation-triangle me-1"></i><?php echo $row['FloodSeverityLevel']; ?> Severity
                                    </span>
                                <?php }

                                elseif($row['FloodSeverityLevel'] == 'Medium'){
                                 ?>
                                    <span class="badge bg-warning text-dark">
                                        <i class="bi bi-exclamation-circle me-1"></i><?php echo $row['FloodSeverityLevel']; ?> Severity
                                    </span>
                                <?php }

                                elseif($row['FloodSeverityLevel'] == 'Low'){
                                 ?>
                                    <span class="badge bg-success">
                                        <i class="bi bi-check-circle me-1"></i><?php echo $row['FloodSeverityLevel']; ?> Severity
                                    </span>
                                <?php } ?>
                        </div>

                        <div class="mb-2">
                            <i class="bi bi-geo-alt text-primary me-2"></i>
                            <strong>Location: </strong><?php echo $row['District']; ?>
                        </div>
                        <div class="mb-2">
                            <i class="bi bi-person text-primary me-2"></i>
                            <strong>Contact: </strong><?php echo $row['ContactPersonName']; ?>
                        </div>
                        <div class="mb-2">
                            <i class="bi bi-telephone text-primary me-2"></i>
                            <strong>Phone: </strong><?php echo $row['ContactPersonNumber']; ?>
                        </div>
                        <div class="mb-3">
                            <i class="bi bi-people text-primary me-2"></i>
                            <strong>Family Members: </strong><?php echo $row['NoOfFamilyMembers']; ?>
                        </div>

                        <div class="border-top pt-3">
                            <div class="btn-group w-100" role="group">
                                <button class="btn btn-outline-primary">
                                    <i class="bi bi-eye me-1"></i>View
                                </button>
                                <a href="http://localhost/FullStackProject/AffectedPersonDashboard/create_request.php?id=<?php echo $row['ReliefID']; ?>"
                                 class="btn btn-outline-secondary">
                                    <i class="bi bi-pencil me-1"></i>Edit
                                </a>
                                <a href="http://localhost/FullStackProject/AffectedPersonDashboard/deleterelief.php?id=<?php echo $row['ReliefID']; ?>"
                                class="btn btn-outline-danger"
                                onclick="return confirm('Are you sure you want to delete this request?');">
                                    <i class="bi bi-trash me-1"></i>Delete
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <footer class="bg-dark text-white text-center py-4 mt-5">
        <div class="container">
            <p class="mb-0">&copy; 2026 Flood Relief Management System. Created for humanity by humanity <i class="bi bi-heart-fill text-danger"></i></p>
        </div>
    </footer>
</body>
</html>