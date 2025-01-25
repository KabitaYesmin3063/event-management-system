<?php
include '../includes/db.php';
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the event
    $stmt = $conn->prepare("DELETE FROM events WHERE id = ? AND created_by = ?");
    $stmt->bind_param("ii", $id, $_SESSION['user_id']);

    if ($stmt->execute()) {
        header("Location: view_events.php");
        exit;
    } else {
        echo "Error deleting event!";
    }
}
?>


