<?php
session_start();

include 'reterivedata.php';
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard - Flood Relief Management System</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    </head>

    <body class="bg-light d-flex flex-column min-vh-100 m-0 p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold text-primary"
                    href="http://localhost/FullStackProject/User/dashboard.php">
                    <i class="bi bi-shield-fill-check me-2"></i>
                    Flood Relief System
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active"
                                href="http://localhost/FullStackProject/User/dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="http://localhost/FullStackProject/User/create_request.php">Create
                                Request</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="http://localhost/FullStackProject/User/view_requests.php">My
                                Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/FullStackProject/index.html">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="bg-primary text-white p-5 text-center" style="width: 100vw; margin-left: calc(-50vw + 50%);">
            <h1 class="display-5 fw-bold mb-2">We are here to help, <?php echo $_SESSION['name']; ?></h1>
            <p class="lead mb-0">If you need relief assistance, submit a request using our 'Create New Request' form.
                Your safety is our priority.</p>
        </div>

        <div class="container py-5 pb-0 flex-grow-1">

            <div class="row g-4 mb-5 justify-content-center">

                <div class="col-lg-5">
                    <a href="http://localhost/FullStackProject/User/create_request.php"
                        class="text-decoration-none">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center py-5">
                                <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                    style="width: 100px; height: 100px;">
                                    <i class="bi bi-plus-circle-fill text-primary" style="font-size: 3rem;"></i>
                                </div>
                                <h4 class="fw-bold text-primary">Create New Request</h4>
                                <p class="text-muted mb-0">Submit a new flood relief request</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-5">
                    <a href="http://localhost/FullStackProject/User/view_requests.php"
                        class="text-decoration-none">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center py-5">
                                <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                    style="width: 100px; height: 100px;">
                                    <i class="bi bi-list-check text-primary" style="font-size: 3rem;"></i>
                                </div>
                                <h4 class="fw-bold text-primary">View My Requests</h4>
                                <p class="text-muted mb-0">Check status of your requests</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>


            <div class="row g-4 mb-5">
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm text-center">
                        <div class="card-body py-4">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 80px; height: 80px;">
                                <i class="bi bi-clipboard-check-fill text-primary" style="font-size: 2.5rem;"></i>
                            </div>
                            <h3 class="fw-bold mb-0"><?php echo $total_requests; ?></h3>
                            <p class="text-muted mb-0">Total Requests</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border-0 shadow-sm text-center">
                        <div class="card-body py-4">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 80px; height: 80px;">
                                <i class="bi bi-clock-fill text-primary" style="font-size: 2.5rem;"></i>
                            </div>
                            <h3 class="fw-bold mb-0"><?php echo $total_pending; ?></h3>
                            <p class="text-muted mb-0">Pending</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border-0 shadow-sm text-center">
                        <div class="card-body py-4">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 80px; height: 80px;">
                                <i class="bi bi-check-circle-fill text-primary" style="font-size: 2.5rem;"></i>
                            </div>
                            <h3 class="fw-bold mb-0"><?php echo $total_approved; ?></h3>
                            <p class="text-muted mb-0">Approved</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border-0 shadow-sm text-center">
                        <div class="card-body py-4">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 80px; height: 80px;">
                                <i class="bi bi-check2-all text-primary" style="font-size: 2.5rem;"></i>
                            </div>
                            <h3 class="fw-bold mb-0"><?php echo $total_complete; ?></h3>
                            <p class="text-muted mb-0">Completed</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-danger text-white py-4" style="width: 100vw; margin-left: calc(-50vw + 50%);">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-12 mb-3">
                            <h5 class="fw-bold">
                                <i class="bi bi-telephone-fill me-2"></i>
                                Emergency Contacts
                            </h5>
                        </div>
                        <div class="col-md-4 mb-2 mb-md-0">
                            <small class="fw-semibold d-block">Disaster Management</small>
                            <p class="h5 fw-bold mb-0">117</p>
                        </div>
                        <div class="col-md-4 mb-2 mb-md-0">
                            <small class="fw-semibold d-block">Police Emergency</small>
                            <p class="h5 fw-bold mb-0">119</p>
                        </div>
                        <div class="col-md-4">
                            <small class="fw-semibold d-block">Ambulance Service</small>
                            <p class="h5 fw-bold mb-0">1990</p>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="bg-dark text-white text-center py-4 mt-auto"
                style="width: 100vw; margin-left: calc(-50vw + 50%);">
                <p class="mb-0">&copy; 2026 Flood Relief Management System.</p>
            </footer>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>