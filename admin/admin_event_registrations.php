<?php
include '../includes/db.php';
session_start();

// Fetch event registrations with user and event details
$query = "
    SELECT 
        er.id AS registration_id,
        u.name AS user_name,
        u.email AS user_email,
        e.name AS event_name,
        e.date AS event_date,
        er.registration_date
    FROM 
        event_registrations er
    JOIN 
        users u ON er.user_id = u.id
    JOIN 
        events e ON er.event_id = e.id
    ORDER BY 
        er.registration_date DESC
";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Event Registrations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Event Registrations</h1>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>Event Name</th>
                <th>Event Date</th>
                <th>Registration Date</th>
            </tr>
        </thead>
        <tbody>
            <?php $count = 1; ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $count++ ?></td>
                    <td><?= htmlspecialchars($row['user_name']) ?></td>
                    <td><?= htmlspecialchars($row['user_email']) ?></td>
                    <td><?= htmlspecialchars($row['event_name']) ?></td>
                    <td><?= htmlspecialchars($row['event_date']) ?></td>
                    <td><?= htmlspecialchars($row['registration_date']) ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
