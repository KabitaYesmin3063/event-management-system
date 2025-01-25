<!-- admin_dashboard.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: Arial, sans-serif; }
        .navbar { background-color: #343a40; }
        .navbar-brand, .nav-link { color: #fff; }
        .nav-link:hover { color: #adb5bd; }
        .sidebar { min-height: 100vh; background: #f8f9fa; }
        .sidebar a { color: #333; display: block; padding: 10px 15px; text-decoration: none; }
        .sidebar a:hover { background: #ddd; color: #000; }
        .content { margin-left: 250px; padding: 20px; }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="view_events.php">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="d-flex">
        <div class="sidebar bg-light p-3">
            <a href="create_event.php" class="btn btn-primary w-100 mb-3">Create Event</a>
            <a href="edit_event.php" class="btn btn-warning w-100 mb-3">Edit Events</a>
           
    <a href="admin_event_registrations.php"  class="btn btn-success w-100 mb-3">View Event Registrations</a>


            <a href="view_events.php" class="btn btn-info w-100 mb-3">View Events</a>
            <a href="view_registrations.php" class="btn btn-danger w-100 mb-3">View Event Members</a>
            <a href="users_list.php" class="btn btn-secondary w-100 mb-3">Registered Users</a>
            <a href="export_csv.php" class="btn btn-success w-100 mb-3">Report</a>
        </div>

        <!-- Content -->
        <div class="content">
            <h1>Welcome, Admin</h1>
            <p>Select an action from the sidebar to manage the system.</p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
