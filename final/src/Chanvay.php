<?php
session_start();
include_once '../connt/connect.php';
global $conn;

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$user_info = null;

if (isset($_SESSION['user_id'])) {
    $user_id = intval($_SESSION['user_id']);
    $sql = "SELECT fullname, phone FROM user WHERE id = '$user_id'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $user_info = $result->fetch_assoc();
    }
} elseif (isset($_COOKIE['user_phone']) && isset($_COOKIE['user_password'])) {
    $phone = $conn->real_escape_string($_COOKIE['user_phone']);
    $password = $conn->real_escape_string($_COOKIE['user_password']);

    $sql = "SELECT id, fullname FROM user WHERE phone = '$phone' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $user_info = $result->fetch_assoc();
        $_SESSION['user_id'] = $user_info['id'];
    }
}

$product_id = isset($_GET['id']) ? intval($_GET['id']) : 1;

$sql = "SELECT * FROM product WHERE id = '$product_id'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $product_name = htmlspecialchars($row['name']);
    $product_price = floatval($row['price']);
} else {
    $product_name = "Sản phẩm không tồn tại";
    $product_price = 0;
}

$total_price = $product_price + 30000;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/thanhtoan.css">
    <link rel="stylesheet" href="../font/fontawesome-free-6.5.2-web/fontawesome-free-6.5.2-web/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Orbitron:wght@400..900&family=Protest+Guerrilla&family=Shizuru&display=swap" rel="stylesheet">
</head>
<body>
<p class="address">NHÓM 8</p>
<div id="hostline">
    <p style="padding-left: 30px;" class="display">Đặt hàng online: 086868686 - Địa chỉ: 54 Triều Khúc - Thanh Xuân - Hà Nội</p>
    <p style="text-transform: uppercase;
                        float: right;
                        padding-right: 30px;
                        font-size: 14px;" class="display">TRANG BÁN QUẦN ÁO CỦA NHÓM 8</p>
</div>
<header class="bg-white shadow-sm" style="padding: 0.7% 0;">
    <div class="container-fluid py-2 d-flex align-items-center justify-content-between" style="width: 94%!important;">
        <!-- Logo -->
        <div class="logo">
            <a href="../index.php"><img src="../image/logo.webp" alt="logo" class="img-fluid" style="max-height: 50px;"></a>
        </div>

        <!-- Navigation -->
        <nav class="d-none d-lg-flex">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Trang chủ</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="Ao.php" data-bs-toggle="dropdown">
                        Áo
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="Quan.php" data-bs-toggle="dropdown">
                        Quần
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="Dam.php" data-bs-toggle="dropdown">
                        Đầm
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="Chanvay.php" data-bs-toggle="dropdown">
                        Chân váy
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Search and User Actions -->
        <div class="d-flex align-items-center">
            <!-- Search -->
            <div class="me-3" style="transform: translateY(+70px);">

                <form method="GET" action="../src/timKiem.php" class="search">
                    <input type="text" class="form-control" name="search" id="search-input" placeholder="Tìm sản phẩm">

                </form>
            </div>
            <!-- Icons -->
            <div style="width: 170px">
                <div style="width: 170px">
                    <a href="../src/cart.php" class="fa-solid fa-bag-shopping"
                       style="padding-right: 17px;
                            transform: translateY(-13px);"></a>
                    <ul class="tools_header" style="display: inline-block!important;">
                        <?php if ($user_info): ?>
                            <li class="user_menu" style="display: flex; align-items: center; gap: 10px;">
                                <img src="../image/bst1.png" alt="Avatar" style="width: 50px; height: 50px; border-radius: 50%;">
                                <div style="text-align: center;">
                                    <span style="display: block; font-size: 14px;"><?=$user_info['fullname'] ?></span>
                                    <a href="../checking/dangxuat.php" style="font-size: 14px; color: #007BFF; text-decoration: none;">Đăng xuất</a>
                                </div>
                            </li>
                        <?php else: ?>
                            <a href="login.php" class="me-3 text-dark"><i class="fa-regular fa-circle-user"></i></a>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
</header>
<div id="slide">
    <img src="https://theme.hstatic.net/1000392326/1000686717/14/ms_banner_img3.jpg?v=6814" alt="">
</div>
<div class="style-div style-div-top">
    <h1 class="style-font font-family">TẤT CẢ SẢN PHẨM PHẨM ĐANG CÓ MẶT LẠI SHOP</h1>
    <br>
    <img class="img-3que" src="../image/3que.png" style="margin-bottom: 25px;">
</div>
<?php include "display.php" ?>
<?php
$type_to_display = "Chân váy"; // Loại sản phẩm bạn muốn hiển thị

if (isset($productsByType[$type_to_display])) {
    $products = $productsByType[$type_to_display]; // Lấy sản phẩm theo loại
    ?>
    <?php foreach ($products as $product): ?>
        <a href="chitietsanpham.php?id=<?php echo htmlspecialchars($product['id']); ?>">
            <div class="img-dis" style="width: 33%!important;">
                <?php
                // Chuyển đường dẫn ../ thành admin/
                $imagePath = '../'.str_replace('../', '', $product['image']);
                ?>
                <!-- Hiển thị ảnh sản phẩm -->
                <img src="<?php echo htmlspecialchars($imagePath); ?>"
                     class="img-border"
                     style="width: 300px; height: 400px;"
                     alt="Product Image">

                <!-- Hiển thị tên sản phẩm -->
                <a href="chitietsanpham.php?id=<?php echo htmlspecialchars($product['id']); ?>" class="img-name js-buy">
                    <?php echo htmlspecialchars($product['name']); ?>
                </a>

                <!-- Hiển thị giá sản phẩm -->
                <p style="text-align: center;">Giá: <?php echo htmlspecialchars($product['price']); ?> VND</p>
            </div>
        </a>
    <?php endforeach; ?>
    <?php
}
?>

<! ĐĂNG KÝ THEO DÕI KÊNH FACEBOOK FANPAGE>
<div class="advertisement">
    <div class="style-div " style="
                margin-top: 50px;">
        <h1 class="style-font">ĐĂNG KÝ THEO DÕI KÊNH FACEBOOK FANPAGE</h1>
        <br>
        <img class="img-3que" src="../image/3que.png">
    </div>
    <div class="content-ad">
        <ul>
            <li><img src="../image/fl1.png" alt=""></li>
            <li><img src="../image/fl2.png" alt=""></li>
            <li><img src="../image/fl3.png" alt=""></li>
            <li><img src="../image/fl4.png" alt=""></li>
        </ul>
    </div>
</div>
</div>






<footer class="bg-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Logo Section -->
            <div class="col-md-3 text-center text-md-start mb-4 mb-md-0">
                <div class="logo_footer">
                    <img src="../image/logo.webp" alt="logo" class="img-fluid" style="max-height: 40px;">
                </div>
            </div>

            <!-- Contact Section -->
            <div class="col-md-3">
                <h5 class="mb-3">LIÊN HỆ</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="fa-solid fa-location-dot me-2"></i>54 Triều Khúc - Thanh Xuân - Hà Nội</li>
                    <li class="mb-2"><i class="fa-solid fa-phone me-2"></i>Hotline: 083868386</li>
                    <li><i class="fa-solid fa-envelope me-2"></i>Email: utt@gmail.com</li>
                </ul>
            </div>

            <!-- Policy Section -->
            <div class="col-md-3">
                <h5 class="mb-3">CHÍNH SÁCH</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-decoration-none text-dark">Chính sách thành viên</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none text-dark">Chính sách đổi trả</a></li>
                    <li><a href="#" class="text-decoration-none text-dark">Chính sách vận chuyển</a></li>
                </ul>
            </div>

            <!-- Social Media Section -->
            <div class="col-md-3 text-center text-md-start">
                <h5 class="mb-3">KẾT NỐI</h5>
                <div class="d-flex justify-content-md-start justify-content-center gap-4">
                    <a href="#" class="text-dark"><i class="fa-brands fa-facebook fa-2x"></i></a>
                    <a href="#" class="text-dark"><i class="fa-brands fa-instagram fa-2x"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="footer-bottom"></div>
</body>
</html>