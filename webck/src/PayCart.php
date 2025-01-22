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
    <title>NORTHSIDE CREW</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../home.css">
    <link rel="stylesheet" href="../src/css/PayCart.css">
    <link rel="shortcut icon" href="../LOGI NORTHSIDE CREW.png">
</head>

<body>
<?php
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 1;

$sql = "SELECT * FROM product WHERE id = '$product_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $product_name = $row['name'];
    $product_price = $row['price'];
} else {
    $product_name = "Sản phẩm không tồn tại";
    $product_price = 0;
}

$total_price = $product_price + 30000;
$conn->close();
?>
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
    <h1 class="inf_title_paycart">Thông tin thanh toán</h1>
    <form action="upload_orders.php" method="post">
        <div class="contentPayCart">
            <div class="infPay">
                <div class="box_infPay">
                    <p class="lable_infPay"><strong>Họ và tên</strong></p>
                    <input type="text" placeholder="Nhập họ và tên của bạn" class="input_box_infPay" name="fullname" required>
                </div>
                <div class="box_sdt">
                    <div class="item_infPays">
                        <p><strong>Số điện thoại</strong></p>
                        <input type="tel" placeholder="Nhập vào số điện thoại" class="input_box_sdt" name="phone" required>
                    </div>
                        <input type="hidden" name="product" value="<?php echo $product_name; ?>">
                        <input type="hidden" name="price" value="<?php echo $total_price; ?>">
                    <div class="item_infPays">
                        <p><strong>Địa chỉ email</strong></p>
                        <input type="email" placeholder="Nhập địa chỉ email" class="input_box_sdt" name="email" required>
                    </div>
                </div>
                <div class="box_infPay">
                    <p class="lable_infPay"><strong>Nhập địa chỉ </strong></p>
                    <input type="text" placeholder="Nhập địa chỉ của bạn" class="input_box_sdt" name="address" required>
                </div>
                <div class="box_infPay">
                    <p class="lable_infPay"><strong>Ghi chú đơn hàng (Tùy chọn)</strong></p>
                    <textarea class="input_box_note" placeholder="Ghi chú đơn hàng" name="note" required></textarea>
                </div>
            </div>
            <div class="detailPayCart">
                <div class="title_detail_cart">
                    <p class="name_detail_cart">ĐƠN HÀNG CỦA BẠN</p>
                </div>
                <div class="content_detailPayCart">
                    <div class="box_content_detailPayCart">
                        <p class="lable_detailPayCart">Sản phẩm</p>
                        <p class="lable_detailPayCart">Tạm tính</p>
                    </div>
                    <div class="box_content_detailPayCart">
                        <p class="lable_detailPayCart"><?php echo $product_name; ?></p>
                        <p class="lable_detailPayCart"><?php echo number_format($product_price, 0, ',', '.') . ' VND'; ?></p>
                    </div>
                    <div class="box_content_detailPayCart">
                        <div class="title_box_content">
                            <p class="lable_content">Tạm tính</p>
                            <p class="lable_content">Giao hàng</p>
                        </div>
                        <div class="title_box_content">
                            <p class="price_title_box"><?php echo number_format($product_price, 0, ',', '.') . ' VND'; ?></p>
                            <p><span class="lable_content">Đồng giá: </span>30.000 VND</p>
                        </div>
                    </div>
                    <div class="box_content_detailPayCart">
                        <p class="lable_detailPayCart">Tổng cộng</p>
                        <p class="lable_detailPayCart"><?php echo number_format($total_price, 0, ',', '.') . ' VND'; ?></p>
                    </div>
                    <div class="checked_detailPayCart">
                        <input type="radio" name="payment_method" value="cod">
                        <p>Trả tiền mặt khi nhận hàng</p>
                    </div>
                    <div class="checked_detailPayCart">
                        <input type="radio" name="payment_method" value="bank_transfer">
                        <p>Chuyển khoản khi nhận hàng</p>
                    </div>
                    <div class="box_content_detailPayCart">
                        <div class="btn_back_detailPayCart">
                            <a href="../index.php" class="btn_back_detailPayCart">
                                <i class="fa-solid fa-arrow-left"></i>
                                <span>Quay lại mua hàng</span>
                            </a>
                        </div>
                        <button class="btn_payOnline" type="submit">
                            <p>Đặt hàng</p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
