<?php
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit;
}

include '../includes/db.php';

// Get user ID from the session
$user_id = $_SESSION['user']['id'];

// Handle event registration
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['event_id'])) {
    $event_id = $_POST['event_id'];

    $stmt = $conn->prepare("INSERT INTO event_registrations (user_id, event_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_id, $event_id);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Failed to register: " . $stmt->error;
    }
}

// Fetch events
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
    <div class="row">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <?php if (!empty($row['image'])): ?>
                        <img src="../uploads/<?= htmlspecialchars($row['image']) ?>" class="card-img-top" alt="Event Image">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($row['name']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($row['description']) ?></p>
                        <p><strong>Date:</strong> <?= htmlspecialchars($row['date']) ?></p>
                        <form method="POST">
                            <input type="hidden" name="event_id" value="<?= $row['id'] ?>">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>
</body>
</html>
