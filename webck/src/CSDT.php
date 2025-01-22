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
                .csdt{
                    font-size: 24px;
                }
            </style>
            <div id="text" style="margin-top: 50px;">
                1. Tất cả các sản phẩm đã mua sẽ không được hoàn trả bằng tiền mặt.<br><br><br>
                <div class="csdt"><b>Chính Sách Đổi Trả:</b></div> <br>
                <b>1. Tất cả các sản phẩm đã mua sẽ không được hoàn trả bằng tiền mặt.</b><br><br>
        
        <b>2. Yêu cầu sản phẩm:</b><br><br>
        
        - Sản phẩm còn mới, nguyên tag, chưa sử dụng, sửa chữa hay giặt, là trong vòng 7 ngày kể từ ngày nhận hàng.<br><br>
        
        - Sản phẩm được mua nguyên giá, không áp dụng hình thức khuyến mại, giảm giá. Các sản phẩm được mua trong chương trình khuyến mãi giảm giá sẽ không được đổi trả. <br><br>
        <b>3. Khách hàng được chấp nhận đổi sang bất kỳ món hàng nào có bán trong cửa hàng bằng hoặc hơn giá trị:</b><br><br>
        
        - Cửa hàng không trả lại tiền thừa nếu khách muốn đổi sang sản phẩm có giá trị thấp hơn.<br><br>
        
        - Hàng chỉ đổi một lần duy nhất.<br><br>
        
        - Kiểm tra kỹ chất lượng sản phẩm đổi.<br><br>
        
       <b> 4. Cách thức đổi hàng:</b><br><br>
        
        - Trường hợp đến trực tiếp cửa hàng: khách hàng sản phẩm, mang theo hoá đơn và sản phẩm nguyên tag tới cửa hàng để được hỗ trợ đổi hàng<br><br>
        
        - Trường hợp đổi hàng qua hình thức chuyển hàng:<br><br>
        
        + Khách hàng chụp đầy đủ hóa đơn, tình trạng hàng, mác hàng và gửi hình ảnh kèm thông tin cá nhân đến fanpage Northside Crew để được tư vấn đổi hàng.<br><br>
        
        + Khi được sự đồng ý của nhân viên, khách bọc sản phẩm muốn đổi chuyển về địa chỉ như nhân viên chăm sóc khách hàng hướng dẫn và lựa chọn sản phẩm muốn đổi.<br><br>
        
        + Khách hàng thanh toán phần chênh lệch (nếu có) giữa sản phẩm mới và sản phẩm cũ.<br><br>
        
        + Khi nhận được sản phẩm cần đổi và chuyển khoản chênh lệch (nếu có), nhân viên bọc hàng và gửi sản phẩm khách chọn đổi.<br><br>
        
        <b>Lưu ý:</b> <br><br>
        
        + Với trường hợp sản phẩm bị lỗi do nhà sản xuất (sản phẩm rách, bung chỉ, sờn vải), lỗi gửi nhầm và thiếu hàng, bên phía Northside Crew sẽ chịu phí ship đổi trả sản phẩm.<br><br>
        
        + Với trường hợp khách hàng muốn đổi sản phẩm do lệch size hoặc muốn đổi sản phẩm khác, bên phía khách hàng sẽ chịu phí đổi trả sản phẩm. <br><br>
            </div>
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