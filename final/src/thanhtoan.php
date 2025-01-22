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
    <div class = "flex-container">
        <div id="content" class="form-group" style="margin-left: 80px;">
            <h2>THÔNG TIN THANH TOÁN</h2>
            <div class="userbox">
                <?php
                ?>
                <form action="../src/donhang.php?id=<?php echo htmlspecialchars($product_id); ?>" method="post" class="payment-form">
                    <input type="hidden" name="id" value="<?=htmlspecialchars($product_id) ?>">
                    <input type="hidden" name="gia" value="<?=htmlspecialchars($total_price) ?>">
                    <div class="flex-container">
                        <div class="form-group">
                            <input type="text" id="fullname" name="fullname" placeholder="Họ và tên" required>
                        </div>
                        <div class="form-group">
                            <input type="text" id="phone" name="phone" placeholder="Số điện thoại" required>
                        </div>
                    </div>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                    <input type="text" id="location" name="location" placeholder="Địa chỉ" required>

                    <div class = "flex-container diadiem">
                        <div class="form-group">
                            <select id="tinh_tp" name="tinh_tp" style="cursor: pointer;" required>
                                <option value="" type="text">Chọn tỉnh/thành phố</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select id="quan_huyen" name="quan_huyen" required disabled style="cursor: pointer;">
                                <option value="" type="text">Chọn quận huyện</option>
                            </select>
                        </div>

                        <script>
                            // Gọi API lấy danh sách tỉnh/thành phố
                            fetch('https://provinces.open-api.vn/api/p/')
                                .then(response => response.json())
                                .then(data => {
                                    const tinhTpDropdown = document.getElementById('tinh_tp');
                                    data.forEach(province => {
                                        const option = document.createElement('option');
                                        option.value = province.code; // Mã số tỉnh
                                        option.textContent = province.name; // Tên tỉnh
                                        tinhTpDropdown.appendChild(option);
                                    });
                                })
                                .catch(error => console.error('Lỗi khi tải danh sách tỉnh/thành phố:', error));

                            // Sự kiện khi chọn tỉnh/thành phố
                            document.getElementById('tinh_tp').addEventListener('change', function () {
                                const tinhTpCode = this.value; // Mã số của tỉnh đã chọn
                                const quanHuyenDropdown = document.getElementById('quan_huyen');

                                // Reset dropdown quận/huyện và phường/xã
                                quanHuyenDropdown.innerHTML = '<option value="">Chọn quận huyện</option>';
                                quanHuyenDropdown.disabled = true;

                                if (tinhTpCode) {
                                    // Gọi API lấy danh sách quận/huyện dựa trên mã tỉnh
                                    fetch(`https://provinces.open-api.vn/api/p/${tinhTpCode}?depth=2`)
                                        .then(response => response.json())
                                        .then(data => {
                                            if (data.districts && data.districts.length > 0) {
                                                data.districts.forEach(district => {
                                                    const option = document.createElement('option');
                                                    option.value = district.code; // Mã số quận
                                                    option.textContent = district.name; // Tên quận
                                                    quanHuyenDropdown.appendChild(option);
                                                });
                                                quanHuyenDropdown.disabled = false;
                                            } else {
                                                // Thông báo nếu không có quận/huyện nào
                                                const option = document.createElement('option');
                                                option.textContent = "Không có quận/huyện nào.";
                                                quanHuyenDropdown.appendChild(option);
                                                quanHuyenDropdown.disabled = false;
                                            }
                                        })
                                        .catch(error => console.error('Lỗi khi tải danh sách quận/huyện:', error));
                                }
                            });

                        </script>

                    </div>
                    <br>
                    <g>Chọn phương thức thanh toán:</g>
                    <div class="form-check"><i class="fa-solid fa-wallet" style="font-size: 24px; color: #000;"></i>
                        <label class="form-check-label" for="cash">Thanh toán tiền mặt khi nhận hàng</label>
                        <input class="form-check-input" type="radio" name="payment" id="cash" value="tiền mặt">
                    </div>
                    <div class="form-check"><i class="fa-solid fa-credit-card" style="font-size: 24px; color: #000;"></i>
                        <label class="form-check-label" for="online">Thanh toán chuyển khoản khi nhận hàng</label>
                        <input class="form-check-input" type="radio" name="payment" id="online" value="chuyển khoản">
                    </div>
                    <button type="submit" class="btn submit-button" style="transform: translate3d(609%, 317px, 0px);">Đặt hàng</button>
                </form>
            </div>
        </div>
        <div id="content" class="form-group">
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
                            <div class="title_box_content" style="display: block!important;">
                                <p class="lable_content">Tạm tính</p> <br>
                                <p class="lable_content">Giao hàng</p>
                            </div>
                            <div class="title_box_content" style="display: block!important;">
                                <p class="price_title_box" style="transform: translate3d(68px, 2px, 10px);translate3d(609%, 317px, 0px);"><?php echo number_format($product_price, 0, ',', '.') . ' VND'; ?></p>
                                <br>
                                <p><span class="lable_content">Đồng giá: </span>30.000 VND</p>
                            </div>
                        </div>
                        <div class="box_content_detailPayCart">
                            <p class="lable_detailPayCart">Tổng cộng</p>
                            <p class="lable_detailPayCart"><?php echo number_format($total_price, 0, ',', '.') . ' VND'; ?></p>
                        </div>
                    </div>
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