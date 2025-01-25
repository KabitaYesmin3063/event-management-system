<?php
include '../includes/db.php';
session_start();

$result = $conn->query("SELECT * FROM events");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $event_id = $_POST['event_id'];
    $user_id = $_SESSION['user_id'];

    // Insert the registration into the database
    $stmt = $conn->prepare("INSERT INTO event_registrations (event_id, user_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $event_id, $user_id);

    if ($stmt->execute()) {
        $success = "Successfully registered for the event!";
    } else {
        $error = "Failed to register for the event.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Available Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Available Events</h1>
    <div class="row">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <?php if (!empty($row['image'])): ?>
                        <img src="../uploads/<?= htmlspecialchars($row['image']) ?>" class="card-img-top" alt="Event Image">
                    <?php else: ?>
                        <div class="card-img-top bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                            No Image
                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($row['name']) ?></h5>
                        <p class="card-text"><strong>Date:</strong> <?= htmlspecialchars($row['date']) ?></p>
                        <p class="card-text"><?= htmlspecialchars($row['description']) ?></p>
                    </div>
                    <div class="card-footer text-center">
                        <form method="POST">
                            <input type="hidden" name="event_id" value="<?= $row['id'] ?>">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <?php if (isset($success)): ?>
        <div class="alert alert-success mt-4"><?= $success ?></div>
    <?php endif; ?>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger mt-4"><?= $error ?></div>
    <?php endif; ?>
</div>
</body>
</html>
