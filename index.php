<?php
session_start();
include 'includes/db.php';

// Check if user is already logged in
if (isset($_SESSION['user'])) {
    header('Location: dashboard.php');
    exit;
}

// Handle Registration
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = 'user'; // Default role is 'user'

    $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $password, $role);

    if ($stmt->execute()) {
        echo "<p>Registration successful! Please log in.</p>";
    } else {
        echo "<p>Error: Email already exists.</p>";
    }
}

// Handle Login
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        header('Location: dashboard.php');
        exit;
    } else {
        echo "<p>Invalid email or password.</p>";
    }
}

// Handle Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management System</title>
    <link rel="stylesheet" href="assets/styles.css">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }

        #myVideo {
            position: fixed;
            top: 0;
            left: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
            object-fit: cover;
        }

        .content {
            position: relative;
            z-index: 1;
            color: white;
            text-align: center;
            padding: 20px;
        }

        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.6);
            padding: 10px 20px;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }

        .card {
            background: rgba(255, 255, 255, 0.8);
            margin: 20px auto;
            padding: 20px;
            border-radius: 5 px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <!-- Video Background -->
    <video autoplay muted loop id="myVideo">
        <source src="video/event1.mp4" type="video/mp4">
    </video>

    <!-- Navigation -->
   

    <!-- Main Content -->
    <div class="content">
        <h1>Welcome to Event Management System</h1>
        <p>Plan and organize your events seamlessly.</p>

        <!-- Login Form -->
        <div class="card" id="login">
            <p class="text-center fs-4 fw-bold">Sign In</p>
            <form method="POST" action="">
                <div class="mb-2">
                    <label for="loginEmail" class="form-label">Email</label>
                    <input type="email" name="email" id="loginEmail" class="form-control" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="loginPassword" class="form-label">Password</label>
                    <input type="password" name="password" id="loginPassword" class="form-control" placeholder="Enter your password" required>
                </div>
                <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
            </form>
        </div>

    <!-- Main Content -->
    <div class="content">
       
        <p><b></b> You can sign in or register</b></p>
        <!-- Registration Form -->
        <div class="card" id="register">
            <p class="text-center fs-4 fw-bold">Register</p>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="registerName" class="form-label">Full Name</label>
                    <input type="text" name="name" id="registerName" class="form-control" placeholder="Enter your full name" required>
                </div>
                <div class="mb-3">
                    <label for="registerEmail" class="form-label">Email</label>
                    <input type="email" name="email" id="registerEmail" class="form-control" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="registerPassword" class="form-label">Password</label>
                    <input type="password" name="password" id="registerPassword" class="form-control" placeholder="Create a password" required>
                </div>
                <button type="submit" name="register" class="btn btn-success w-100">Register</button>
            </form>
        </div>
    </div>
</body>
</html>
