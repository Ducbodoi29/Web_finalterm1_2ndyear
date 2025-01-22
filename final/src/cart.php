<?php
session_start();
include_once '../connt/connect.php';
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

    $sql = "SELECT id, fullname FROM user WHERE phone = '$phone' AND password = '$password'";
    $result = $conn->query($sql);

    if (!$result) {
        die("Error in SQL query: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $user_info = $result->fetch_assoc();
        $_SESSION['user_id'] = $user_info['id'];
    }
}
// Lấy sản phẩm dựa trên ID từ URL
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$product = null;

if ($product_id > 0) {
    $sql = "SELECT * FROM product WHERE id = '$product_id'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        die("Sản phẩm không tồn tại!");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../font/fontawesome-free-6.5.2-web/fontawesome-free-6.5.2-web/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Agu+Display&family=Rampart+One&family=Rubik+Puddles&family=Rubik+Vinyl&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Orbitron:wght@400..900&family=Protest+Guerrilla&family=Shizuru&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/cart.css">
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

<div class="cart-section">
    <h2 class="text-center mb-4">Giỏ hàng của bạn</h2>
    <div class="container">
        <div class="row border-bottom py-3 align-items-center">
            <div class="cart-section">
                <?php if ($product): ?>
                    <div class="container">
                        <div class="row border-bottom py-3 align-items-center">
                            <div class="col-3">
                                <img src="../<?= htmlspecialchars(str_replace('../', '', $product['image'])); ?>" alt="<?= htmlspecialchars($product['name']); ?>" class="img-fluid">
                            </div>
                            <div class="col-3">
                                <h5><?= $product['name']; ?></h5>
                            </div>
                            <div class="col-2">
                                <p id="price" data-price="<?= $product['price']; ?>"><?= number_format($product['price'], 0, ',', '.'); ?> VND</p>
                            </div>
                            <div class="col-2 d-flex align-items-center">
                                <input type="number" class="form-control mx-2 text-center quantity-input" value="1" min="1" style="width: 50px;" data-id="<?= $product_id; ?>">
                            </div>
                            <div class="col-2 text-end">
                                <p id="total-price"><?= number_format($product['price'], 0, ',', '.'); ?> VND</p>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <p class="text-center">Không tìm thấy sản phẩm!</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="row py-3" style="margin-bottom: 50px;">
            <?php if ($product): ?>
                <div class="d-flex justify-content-end">
                    <!-- Form gửi tổng giá sang trang khác -->
                    <form action="thanhtoan.php?id=<?= $product_id; ?>" method="POST">
                        <input type="hidden" name="total_price" id="hidden-total-price" value="<?= $product['price']; ?>">
                        <button type="submit" class="btn btn-primary" style="border-radius: 0%; transform: translate3d(-74px, 122px, 0px);">Tiến hành thanh toán</button>
                    </form>
                </div>
            <?php endif; ?>
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
<div class="modal js-modal">
    <div class="modal-container js-modal-container">
        <div class="modal-close js-modal-close">
            <i class="fa-solid fa-x"></i>
        </div>

    </div>
</div>
<div class="footer-bottom"></div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const quantityInput = document.querySelector('.quantity-input');
        const priceElement = document.getElementById('price');
        const totalPriceElement = document.getElementById('total-price');

        if (quantityInput) {
            quantityInput.addEventListener('input', function () {
                const quantity = parseInt(quantityInput.value) || 1; // Giá trị số lượng, mặc định là 1 nếu không hợp lệ
                const price = parseInt(priceElement.getAttribute('data-price')); // Lấy giá sản phẩm gốc
                const totalPrice = quantity * price; // Tính tổng giá

                // Cập nhật giao diện
                totalPriceElement.textContent = new Intl.NumberFormat('vi-VN', {
                    style: 'currency',
                    currency: 'VND',
                }).format(totalPrice);
            });
        }
    });
</script>

</body>
</html>