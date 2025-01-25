<?php
include '../includes/db.php';
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch event details
    $stmt = $conn->prepare("SELECT * FROM events WHERE id = ? AND created_by = ?");
    $stmt->bind_param("ii", $id, $_SESSION['user_id']);
    $stmt->execute();
    $event = $stmt->get_result()->fetch_assoc();

    if (!$event) {
        die("Event not found or access denied!");
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $description = $_POST['description'];

    // Handle optional image upload
    if ($_FILES['image']['name']) {
        $targetDir = "../uploads/";
        $imageName = basename($_FILES['image']['name']);
        $targetFilePath = $targetDir . $imageName;

        move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath);
        $stmt = $conn->prepare("UPDATE events SET name = ?, date = ?, description = ?, image = ? WHERE id = ? AND created_by = ?");
        $stmt->bind_param("ssssii", $name, $date, $description, $imageName, $id, $_SESSION['user_id']);
    } else {
        $stmt = $conn->prepare("UPDATE events SET name = ?, date = ?, description = ? WHERE id = ? AND created_by = ?");
        $stmt->bind_param("sssii", $name, $date, $description, $id, $_SESSION['user_id']);
    }

    if ($stmt->execute()) {
        header("Location: view_events.php");
        exit;
    } else {
        $error = "Error updating event!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Event</h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Event Name</label>
                <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($event['name']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Event Date</label>
                <input type="date" name="date" id="date" class="form-control" value="<?= htmlspecialchars($event['date']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" required><?= htmlspecialchars($event['description']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Event Image (Optional)</label>
                <input type="file" name="image" id="image" class="form-control">
                <p>Current Image: <img src="../uploads/<?= htmlspecialchars($event['image']) ?>" class="img-thumbnail" style="width: 100px;"></p>
            </div>
            <button type="submit" class="btn btn-primary">Update Event</button>
        </form>
        <?php if (isset($error)) echo "<p class='text-danger mt-3'>$error</p>"; ?>
    </div>
</body>
</html>
