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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../home.css">
    <link rel="stylesheet" href="./css/CSTV.css">
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
        <div class="content_CSTV">
            <style>
                .hang1{
                    font-size: 24px;
                }
            </style>
            <br><br><br>
            <div class="cstv"><b class="hang1">Chính sách thành viên</b></div> <br>
            <b>1. Hạng Member:</b><br><br>

            Khách hàng đăng ký thẻ thành viên tại các cơ sở cửa hàng của Northside Crew trên toàn quốc với điều kiện hóa đơn trên 500.000VNĐ<br><br>
            
            <b>2. Hạng Silver:</b> <br><br>
            
            Khi tích đủ 5 triệu đồng,bạn sẽ được lên hạng thẻ SILVER với ưu đãi:<br><br>
            
            - Giảm 5% cho toàn bộ đơn hàng<br><br>
            
            - Tặng Voucher giảm 10% cho tháng sinh nhật<br><br>
            
            <b>3. Hạng Gold:</b><br><br>
            
            Khi tích đủ 20 triệu đồng, bạn sẽ được lên hạng thẻ GOLD với ưu đãi:<br><br>
            
            - Giảm 8% cho toàn bộ đơn hàng<br><br>
            
            - Tặng Voucher giảm 15% cho tháng sinh nhật<br><br>
            
            <b>4. Hạng Platinum:</b><br><br>
            
            Khi tích lũy đủ triệu đồng, bạn sẽ được nâng hạng thẻ PLATINUM với ưu đãi:<br><br>
            
            - Giảm 12% cho toàn bộ đơn hàng<br><br>
            
            - Tặng Voucher giảm 20% cho tháng sinh nhật<br><br>
            
           <b> 5. Hạng Diamond:</b><br><br>
             
            
            Khi tích đủ 100.000.000 triệu đồng, bạn sẽ được lên hạng thẻ DIAMOND với ưu đãi hấp dẫn:<br><br>
            
            - Giảm 12% cho toàn bộ đơn hàng<br><br>
            
            - Tặng Voucher giảm 20% cho tháng sinh nhật<br><br>
            
            - Cuối năm có một phần quà đặc biệt từ Northside Crew<br><br>
            
             
            <b>Chương trình tích điểm</b> <br><br>
            
             
            Mỗi lần thanh toán khách hàng sẽ được cộng số điểm tương ứng với giá trị đơn hàng. Khi tích đủ điểm, quý khách tự động được thăng hạng trong hệ thống và được nhân viên thông báo để đổi thẻ mới. <br><br> 
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