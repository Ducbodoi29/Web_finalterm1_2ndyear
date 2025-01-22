<?php
session_start();

session_unset();
session_destroy();

if (isset($_COOKIE['user_phone'])) {
    setcookie('user_phone', '', time() - 3600, '/');
}
if (isset($_COOKIE['user_password'])) {
    setcookie('user_password', '', time() - 3600, '/');
}

header('Location: ../../index.php');
exit;
?>
