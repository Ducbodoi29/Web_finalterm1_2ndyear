<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: Register.html");
    exit();
}
echo "Chào mừng, " . htmlspecialchars($_SESSION['fullname']) . "!";
header("Location: ../../index.php");
