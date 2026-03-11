<?php
    session_start();
    include 'reterivedata_admin.php';
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard - Flood Relief Management System</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    </head>

    <body class="bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold text-primary" href="admin_dashboard.html">
                    <i class="bi bi-shield-fill-check me-2"></i>
                    Admin Panel
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="admin_dashboard.html">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_users.html">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_requests.html">All Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_reports.html">Reports</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/FullStackProject/index.html">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container py-5">
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold">Admin Dashboard</h1>
                <p class="lead text-muted">Manage flood relief system</p>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center py-4">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 80px; height: 80px;">
                                <i class="bi bi-people-fill text-primary" style="font-size: 2.5rem;"></i>
                            </div>
                            <h3 class="fw-bold mb-0"><?php echo $total_users; ?></h3>
                            <p class="text-muted mb-0">Total Users</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center py-4">
                            <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 80px; height: 80px;">
                                <i class="bi bi-clipboard-check text-warning" style="font-size: 2.5rem;"></i>
                            </div>
                            <h3 class="fw-bold mb-0"><?php echo $total_requests; ?></h3>
                            <p class="text-muted mb-0">Total Requests</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center py-4">
                            <div class="bg-danger bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 80px; height: 80px;">
                                <i class="bi bi-exclamation-triangle-fill text-danger" style="font-size: 2.5rem;"></i>
                            </div>
                            <h3 class="fw-bold mb-0"><?php echo $total_high; ?></h3>
                            <p class="text-muted mb-0">High Severity</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center py-4">
                            <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 80px; height: 80px;">
                                <i class="bi bi-geo-alt-fill text-success" style="font-size: 2.5rem;"></i>
                            </div>
                            <h3 class="fw-bold mb-0"><?php echo $total_districts; ?></h3>
                            <p class="text-muted mb-0">Districts</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-12">
                    <h3 class="fw-bold mb-4">Quick Actions</h3>
                </div>

                <div class="col-md-4">
                    <a href="admin_users.html" class="text-decoration-none">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center py-5">
                                <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                    style="width: 100px; height: 100px;">
                                    <i class="bi bi-people-fill text-primary" style="font-size: 3rem;"></i>
                                </div>
                                <h4 class="fw-bold text-primary">Manage Users</h4>
                                <p class="text-muted mb-0">View and manage registered users</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="admin_requests.html" class="text-decoration-none">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center py-5">
                                <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                    style="width: 100px; height: 100px;">
                                    <i class="bi bi-list-check text-info" style="font-size: 3rem;"></i>
                                </div>
                                <h4 class="fw-bold text-info">All Requests</h4>
                                <p class="text-muted mb-0">View all relief requests</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="admin_reports.html" class="text-decoration-none">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center py-5">
                                <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                    style="width: 100px; height: 100px;">
                                    <i class="bi bi-file-earmark-bar-graph text-success" style="font-size: 3rem;"></i>
                                </div>
                                <h4 class="fw-bold text-success">View Reports</h4>
                                <p class="text-muted mb-0">Generate filtered reports</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-bold">High Priority Requests</h3>
                        <a href="admin_requests.html" class="btn btn-primary">
                            View All Requests
                            <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>

                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Request ID</th>
                                            <th>User</th>
                                            <th>Type</th>
                                            <th>District</th>
                                            <th>Severity</th>
                                            <th>Family Members</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="table-danger table-danger-subtle">
                                            <td><strong>#001</strong></td>
                                            <td>John Doe</td>
                                            <td><span class="badge bg-success">Food</span></td>
                                            <td>Colombo</td>
                                            <td><span class="badge bg-danger">High</span></td>
                                            <td>5</td>
                                            <td>Jan 15, 2026</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="table-danger table-danger-subtle">
                                            <td><strong>#004</strong></td>
                                            <td>Jane Smith</td>
                                            <td><span class="badge bg-warning text-dark">Shelter</span></td>
                                            <td>Gampaha</td>
                                            <td><span class="badge bg-danger">High</span></td>
                                            <td>6</td>
                                            <td>Jan 16, 2026</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="table-danger table-danger-subtle">
                                            <td><strong>#007</strong></td>
                                            <td>Sarah Williams</td>
                                            <td><span class="badge bg-info">Water</span></td>
                                            <td>Kalutara</td>
                                            <td><span class="badge bg-danger">High</span></td>
                                            <td>4</td>
                                            <td>Jan 17, 2026</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="bg-dark text-white text-center py-4 mt-5">
            <div class="container">
                <p class="mb-0">&copy; 2026 Flood Relief Management System.</p>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>