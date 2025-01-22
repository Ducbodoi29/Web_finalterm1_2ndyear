<?php
include "../admin/counter.php";
require "../connt/connect.php"; // Kết nối cơ sở dữ liệu
session_start();
global $conn;



$phone = isset($_POST["phone"]) ? $_POST["phone"] : null;
$pass = isset($_POST["password"]) ? $_POST["password"] : null;

if ($phone && $pass) {
    // Truy vấn tìm người dùng có số điện thoại và mật khẩu khớp
    $sql = "SELECT * FROM user WHERE phone = '$phone'";
    $result = mysqli_query($conn, $sql);

    $sql_admin = "SELECT * FROM `admin` WHERE phone = '$phone'";
    $result_admin = mysqli_query($conn, $sql_admin);

    // Kiểm tra nếu số điện thoại có tồn tại trong cơ sở dữ liệu
    if ((mysqli_num_rows($result) > 0)||(mysqli_num_rows($result_admin) > 0)) {
        $user = mysqli_fetch_assoc($result); // Lấy thông tin người dùng từ cơ sở dữ liệu
        $admin = mysqli_fetch_assoc($result_admin);
        // Kiểm tra mật khẩu có khớp không
        if ($pass === $user['password']) { // Chú ý: nếu có sử dụng hash mật khẩu, dùng password_verify
            // Nếu mật khẩu đúng, chuyển hướng đến trang 
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = 'user';
            echo "<script>
                alert('Đăng nhập thành công!, xin chào quý khách');
                window.location.href = '../index.php'; // Chuyển hướng đến trang chủ
            </script>";
        } else if($pass === $admin['password']){
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['role'] = 'admin';
            echo "<script>
                alert('Đăng nhập thành công!, xin chào Admin');
                window.location.href = '../admin/index.php'; // Chuyển hướng đến trang admin
            </script>";
        } else {
            echo "<script>
                alert('Mật khẩu không đúng!');
                window.location.href = '../src/login.php'; // Quay lại trang đăng nhập
            </script>";
        }
    } else {
        // Số điện thoại không tồn tại trong cơ sở dữ liệu
        echo "<script>
            alert('Số điện thoại không tồn tại!');
            window.location.href = '../src/login.php'; // Quay lại trang đăng nhập
        </script>";
    }
} else {
    // Nếu không có thông tin từ form
    echo "<script>
        alert('Vui lòng điền đầy đủ thông tin!');
        window.location.href = '../src/login.php'; // Quay lại trang đăng nhập
    </script>";
    exit;
}

?>
