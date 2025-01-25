<?php
include '../includes/db.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}$result = $conn->query("SELECT er.id, e.name AS event_name, u.name AS user_name, er.created_at 
FROM event_registrations er 
JOIN events e ON er.event_id = e.id 
JOIN users u ON er.user_id = u.id");


$registrations = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Registrations</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Event Registrations</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Event</th>
                <th>User</th>
                <th>Registered At</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($registrations as $registration): ?>
                <tr>
                    <td><?= $registration['id'] ?></td>
                    <td><?= $registration['event_name'] ?></td>
                    <td><?= $registration['user_name'] ?></td>
                    <td><?= $registration['registered_at'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>

