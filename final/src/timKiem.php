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
    <title>Tìm kiếm</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../font/fontawesome-free-6.5.2-web/fontawesome-free-6.5.2-web/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Agu+Display&family=Rampart+One&family=Rubik+Puddles&family=Rubik+Vinyl&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Orbitron:wght@400..900&family=Protest+Guerrilla&family=Shizuru&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/home_product.css">
    <link rel="stylesheet" href="../css/timKiem_css.css">
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
<!--        Tìm kiếm sản phâm-->
<!--    <form method="post" class="search  display">-->
<!--        <input type="text" id="search-input" placeholder="Tìm sản phẩm">-->
<!--        <button type="submit" id="search-button">-->
<!--            <i class="fa-solid fa-magnifying-glass" >-->
<!---->
<!--            </i>-->
<!--        </button>-->



<!--        ----------------------->

<!---------------------------Hiển thị từ khoá tìm kiếm-->
<?php
if (isset($_GET['search']) && $_GET['search'] !== '') {
    $searchValue = htmlspecialchars($_GET['search']);
    echo '<h1 class="style-font" align="center" style="padding-top: 20px">KẾT QUẢ TÌM KIẾM</h1>';
    echo '<p class="style-font" align="center" style="font-size: 18px; margin-top: 10px;">Từ khóa: "' . $searchValue . '"</p>';
} else {
    echo '<h1 class="style-font" align="center" style="padding-top: 20px">KẾT QUẢ TÌM KIẾM</h1>';
}
?>

<!---------------------------Hiển thị kết quả tìm kiếm và phân trang-->

<?php
require_once('../connt/connect.php');

// Số lượng sản phẩm trên mỗi trang
$limit = 6;

// Xác định trang hiện tại
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

//------------------------------------------------------------------------------------------

// Lấy giá trị tìm kiếm từ form
if (isset($_GET['search']) && $_GET['search'] !== '') {
    $searchValue = mysqli_real_escape_string($conn, trim($_GET['search']));

    // Truy vấn tìm kiếm sản phẩm với LIMIT và OFFSET
    $query = "SELECT * FROM product 
              WHERE name LIKE '%$searchValue%' 
              OR `describe` LIKE '%$searchValue%' 
              OR price LIKE '%$searchValue%' 
              LIMIT $limit OFFSET $offset";

    $result = mysqli_query($conn, $query);

    echo '<div class="search-results">';

    // Hiển thị kết quả tìm kiếm
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="product-item">';
            echo '<img src="../' . htmlspecialchars(str_replace('../', '', $row['image'])) . '" class="product-image" style="height: 77%;" alt="' . htmlspecialchars($row['name']) . '">';
            echo '<div class="product-name">' . htmlspecialchars($row['name']) . '</div>';
            echo '<div class="product-price">' . number_format($row['price'], 0, ',', '.') . 'đ</div>';
            echo '<button onclick="location.href=\'../src/chiTietSanPham.php?id=' . $row['id'] . '\'" class="buy-button">Xem chi tiết</button>';
            echo '</div>';
        }
    } else {
        echo '<div class="no-results">Không tìm thấy sản phẩm nào phù hợp.</div>';
    }

    echo '</div>';

    // Lấy tổng số sản phẩm để tính số trang
    $countQuery = "SELECT COUNT(*) AS total FROM product 
                   WHERE name LIKE '%$searchValue%' 
                   OR `describe` LIKE '%$searchValue%' 
                   OR price LIKE '%$searchValue%'";
    $countResult = mysqli_query($conn, $countQuery);
    $totalRows = mysqli_fetch_assoc($countResult)['total'];
    $totalPages = ceil($totalRows / $limit);

    // Hiển thị phân trang
    echo '<div class="pagination">';

    // Liên kết đến trang trước
    if ($page > 1) {
        echo '<a href="?search=' . urlencode($searchValue) . '&page=' . ($page - 1) . '">&laquo; Trang trước</a>';
    }

    // Liên kết đến các trang
    for ($i = 1; $i <= $totalPages; $i++) {
        echo '<a href="?search=' . urlencode($searchValue) . '&page=' . $i . '"';
        if ($i == $page) {
            echo ' class="active"'; // Làm nổi bật trang hiện tại
        }
        echo '>' . $i . '</a>';
    }

    // Liên kết đến trang sau
    if ($page < $totalPages) {
        echo '<a href="?search=' . urlencode($searchValue) . '&page=' . ($page + 1) . '">Trang sau &raquo;</a>';
    }

    echo '</div>';
}
?>

<!------------------------------------------------------------------------------------------------------->


<! ĐĂNG KÝ THEO DÕI KÊNH FACEBOOK FANPAGE>
<div class="advertisement">
    <div class="style-div">
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
<script src="../javascript/script.js"></script>
</body>
</html>