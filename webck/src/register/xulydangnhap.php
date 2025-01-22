<?php
require_once  '../../connect.php';
global $conn;
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE phone=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $phone);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if ($password === $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];

            header("Location: dashboard.php");
            exit();
        } else {
            echo "Sai mật khẩu!";
        }

    } else {
        echo "Số điện thoại không tồn tại!";
    }

    $stmt->close();
}

$conn->close();


