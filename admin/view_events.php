<?php
include '../includes/db.php';
session_start();

$result = $conn->query("SELECT * FROM events");
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Available Events</h1>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Date</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php $count = 1; ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $count++ ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['date']) ?></td>
                        <td><?= htmlspecialchars($row['description']) ?></td>
                        <td>
                            <?php if (!empty($row['image'])): ?>
                                <img src="../uploads/<?= htmlspecialchars($row['image']) ?>" alt="Event Image" class="img-thumbnail" style="width: 100px;">
                            <?php else: ?>
                                <span>No image available</span>
                            <?php endif; ?>
                        </td>
                        <td><a href="edit_event.php " class="btn btn-warning btn-sm">Edit</a>

                            <a href="delete_event.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this event?');">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">No events found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
