<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

$user = $_SESSION['user'];

if ($user['role'] == 'admin') {
    header('Location: admin/dashboard.php');
} else {
    header('Location: user/dashboard.php');
}
exit;
?>
