<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Admin Registration Route
if ($_SERVER['REQUEST_URI'] === '/admin/register') {
    include 'admin/register.php';
    exit;
}

?>
