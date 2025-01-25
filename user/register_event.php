<?php
include '../includes/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $event_id = $_POST['event_id'];

    if (!isset($_SESSION['user_id'])) {
        die('Error: You must be logged in to register for an event.');
    }

    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO event_registrations (event_id, user_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $event_id, $user_id);

    if ($stmt->execute()) {
        echo 'Successfully registered for the event!';
        header("Location: userview_event.php");
        exit();
    } else {
        echo 'Error: Could not register for the event. ' . $conn->error;
    }

    $stmt->close();
}
?>
