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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Product Page</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

<section class="product-detail my-5">
    <div class="container">
        <?php
        require_once '../connt/connect.php';
        global $conn;
        $product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

        // Fetch product data
        $sql = "SELECT * FROM product WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
            echo '<div class="row">';

            // Product image
            $imagePath = str_replace('../', '', $product['image']);
            echo '<div class="col-md-6 text-center">';
            echo '<img src="' .'../' . htmlspecialchars($imagePath) . '" alt="Product Image" class="img-fluid product-image">';
            echo '</div>';


            // Product details
            echo '<div class="col-md-6">';
            echo '<h3 class="product-title">' . htmlspecialchars($product['name']) . '</h3>';
            echo '<p class="product-price">Giá: <span class="text-danger">' . number_format($product['price']) . ' đ</span></p>';
            echo '<hr>';
            echo '<p><strong>Mô tả:</strong></p>';
            echo '<p>' . htmlspecialchars($product['describe']) . '</p>';
            echo '<hr>';
            echo '<br>';


            // Action buttons
            echo '<div class="action-buttons" style="transform: translateY(10px)">';
            echo '<a href="cart.php?id='.$product_id.'" class="btn btn-primary btn-cart">Thêm vào giỏ</a>';
            echo '<a href="thanhtoan.php?id='.$product_id.'" class="btn btn-success btn-buy" style="transform: translate3d(138px, -19px, 0px)">Mua Ngay</a>';
            echo '</div>';


            echo '</div>';
        } else {
            echo '<p class="text-center">Sản phẩm không tồn tại.</p>';
        }

        $stmt->close();
        $conn->close();
        ?>
    </div>


</section>
<br><br><br>
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
