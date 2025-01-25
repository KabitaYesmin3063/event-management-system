<?php
include '../includes/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $description = $_POST['description'];
    $created_by = $_SESSION['user_id'];

    // Handle Image Upload
    $targetDir = "../uploads/"; // Directory to store uploaded images
    $imageName = basename($_FILES['image']['name']);
    $targetFilePath = $targetDir . $imageName;
    $uploadOk = true;

    // Check if file is an actual image
    $check = getimagesize($_FILES['image']['tmp_name']);
    if ($check === false) {
        $error = "File is not an image.";
        $uploadOk = false;
    }

    // Check if file already exists
    if (file_exists($targetFilePath)) {
        $error = "File already exists.";
        $uploadOk = false;
    }

    // Check file size (limit to 2MB)
    if ($_FILES['image']['size'] > 2000000) {
        $error = "File is too large. Maximum size is 2MB.";
        $uploadOk = false;
    }

    // Allow specific file formats
    $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowedTypes)) {
        $error = "Only JPG, JPEG, PNG, and GIF files are allowed.";
        $uploadOk = false;
    }

    if ($uploadOk) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
            // Insert event with image path into the database
            $stmt = $conn->prepare("INSERT INTO events (name, date, description, image, created_by) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssi", $name, $date, $description, $imageName, $created_by);

            if ($stmt->execute()) {
                $success = "Event created successfully!";
            } else {
                $error = "Error creating event!";
            }
        } else {
            $error = "Error uploading the image.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Create Event</h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Event Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Event Date</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Event Image</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Event</button>
        </form>
        <?php if (isset($success)) echo "<p class='text-success mt-3'>$success</p>"; ?>
        <?php if (isset($error)) echo "<p class='text-danger mt-3'>$error</p>"; ?>
    </div>
</body>
</html>
