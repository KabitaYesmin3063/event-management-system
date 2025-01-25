<?php

// Admin Registration Route
if ($_SERVER['REQUEST_URI'] === '/admin/register') {
    include 'admin/register.php';
    exit;
}
