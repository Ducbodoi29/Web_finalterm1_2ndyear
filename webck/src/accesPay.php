<?php
session_start();
include_once '../connect.php';
global $conn;

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$user_info = null;

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT fullname, phone FROM user WHERE id = '$user_id'";
    $result = $conn->query($sql);

    if (!$result) {
        die("Error in SQL query: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $user_info = $result->fetch_assoc();
    }
} elseif (isset($_COOKIE['user_phone']) && isset($_COOKIE['user_password'])) {
    $phone = $_COOKIE['user_phone'];
    $password = $_COOKIE['user_password'];

    $sql = "SELECT id, fullname FROM users WHERE phone = '$phone' AND password = '$password'";
    $result = $conn->query($sql);

    if (!$result) {
        die("Error in SQL query: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $user_info = $result->fetch_assoc();
        $_SESSION['user_id'] = $user_info['id'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../home.css">
    <link rel="stylesheet" href="../src/css/accesPay.css">
    <link rel="shortcut icon" href="../LOGI NORTHSIDE CREW.png">
    <title>NORTHSIDE CREW</title>
</head>
<body>
<header>
    <div class="logo_header">
        <img src="../img/logo.png" alt="Logo">
    </div>
    <ul class="navigate_header">
        <li><a href="../index.php" class="title_header">HOME</a></li>
        <li class="dropdown_header"><a href="#" class="title_header">TOP</a></li>
        <li><a href="#" class="title_header">BOTTOM</a></li>
        <li><a href="#" class="title_header">ACCESSORIES</a></li>
        <li><a href="#" class="title_header">SALE</a></li>
    </ul>

    <ul class="tools_header">
        <?php if ($user_info): ?>
            <li class="user_menu" style="display: flex; align-items: center; gap: 10px;">
                <img src="../img/avatar.png" alt="Avatar" style="width: 50px; height: 50px; border-radius: 50%;">
                <div style="text-align: center;">
                    <span style="display: block; font-size: 14px;"><?=$user_info['fullname'] ?></span>
                    <a href="../src/register/logout.php" style="font-size: 14px; color: #007BFF; text-decoration: none;">Đăng xuất</a>
                </div>
            </li>
        <?php else: ?>
            <li><a href="../src/register/Register.html"><i class="fa-solid fa-user icon_while"></i></a></li>
        <?php endif; ?>
    </ul>
</header>
    <div class="content">
        <div class="content_accesPay">
            <h1  class="center_text_access title_accesPay">Đặt hàng thành công</h1>
            <p  class="center_text_access mess_accessPay">Chúc mừng quý khách đã đặt hàng thành công</p>
            <p class="center_text_access welecome_accessPay">Chào quý khách. Cảm ơn đã đặt hàng.</p>
            <p class="center_text_access detail_check_crew">
                Nhân viên chăm sóc khách hàng của chúng tôi sẽ gọi xác nhận lại thông tin trong
                giờ hành chính và không quá 12h
            </p>
            <h1 class="center_text_access thank_acces">Cảm ơn bạn đã đồng hành cùng <span>Chúng tôi</span></h1>
        </div>
    </div>
    <footer>
        <div class="logo_footer">
        </div>
        <ul class="contact_footer">
            <li>
                <div class="item_title_contact">
                    <p class="title_contact">LIÊN HỆ</p>

                </div>
                <div class="content_contact">
                    <ul>
                        <li class="address_contact"><i class="fa-solid fa-location-dot"></i>54 Triều Khúc - Thanh Xuân - Hà Nội  </li>
                        <li class="address_contact"><i class="fa-solid fa-phone"></i> Hotlline: 083868386</li>
                        <li class="address_contact"><i class="fa-solid fa-envelope"></i> Email: utt@gmail.com
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="item_title_contact">
                    <p class="title_contact">CHÍNH SÁCH</p>

                </div>
                <div class="content_contact">
                    <ul>
                        <li class="address_contact"> <a href="CSTV.php">Chính sách thành viên</a></li>
                        <li class="address_contact"><a href="CSDT.php">Chính sách đổi trả</a></li>
                        <li class="address_contact"><a href="CSVC.php">Chính sách vận chuyển</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="item_title_contact">
                    <p class="title_contact">ĐĂNG KÝ NHẬN TIN</p>

                </div>
                <div class="content_contact">
                    <ul>
                        <li class="address_contact">Nhận thông tin sản phẩm mới nhất</li>
                        <li class="address_contact">Thông tin sản phẩm khuyến mại</li>

                    </ul>
                </div>
            </li>
            <li>
                <div class="item_title_contact">
                    <p class="title_contact">KẾT NỐI</p>

                </div>
                <div class="content_contact">
                    <ul style="display: flex;gap:20px">
                        <li class="address_contact"><i class="fa-brands fa-facebook"></i> </li>
                        <li class="address_contact"><i class="fa-brands fa-instagram"></i> </li>
                    </ul>
                </div>
            </li>
        </ul>

    </footer>
</body>
</html>