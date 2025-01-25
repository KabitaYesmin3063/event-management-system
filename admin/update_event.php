<?php
// Include database connection
include '../includes/db.php';
session_start();

// Check if the user is an admin
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    die('Access denied');
}

// Check if all required fields are provided
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $name = $_POST['name'];
    $date = $_POST['date'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    // Update the event in the database
    $stmt = $conn->prepare("UPDATE events SET name = ?, date = ?, description = ?, image = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $name, $date, $description, $image, $id);

    if ($stmt->execute()) {
        header('Location: view_events.php?success=Event updated successfully');
    } else {
        die('Error updating the event: ' . $stmt->error);
    }
}
?>
