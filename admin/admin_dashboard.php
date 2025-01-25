<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

// Access user admin_id
$admin_id = $_SESSION['admin_id'];
?>
