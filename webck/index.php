<?php
session_start();
include_once 'connect.php';
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
    <title>Thu Phuong</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="home.css">
    <link rel="shortcut icon" href="./LOGI NORTHSIDE CREW.png">
</head>


<body>
<header>
    <div class="logo_header">
        <img src="img/logo.png" alt="Logo">
    </div>
    <ul class="navigate_header">
        <li><a href="index.php" class="title_header">HOME</a></li>
        <li class="dropdown_header"><a href="#" class="title_header">TOP</a></li>
        <li><a href="#" class="title_header">BOTTOM</a></li>
        <li><a href="#" class="title_header">ACCESSORIES</a></li>
        <li><a href="#" class="title_header">SALE</a></li>
    </ul>

    <ul class="tools_header">
        <?php if ($user_info): ?>
            <li class="user_menu" style="display: flex; align-items: center; gap: 10px;">
                <img src="img/avatar.png" alt="Avatar" style="width: 50px; height: 50px; border-radius: 50%;">
                <div style="text-align: center;">
                    <span style="display: block; font-size: 14px;"><?=$user_info['fullname'] ?></span>
                    <a href="src/register/logout.php" style="font-size: 14px; color: #007BFF; text-decoration: none;">Đăng xuất</a>
                </div>
            </li>
        <?php else: ?>
            <li><a href="src/register/Register.html"><i class="fa-solid fa-user icon_while"></i></a></li>
        <?php endif; ?>
    </ul>
</header>



<div class="content">
    <div class="slider">
        <img src="./img/Home/baner_web.jpg" alt="" class="image_slider">
    </div>
    <div class="review_home">
        <div class="item_review item_review1">
            <p class="text_itemReview">TOP</p>
        </div>
        <div class="item_review item_review2">
            <p class="text_itemReview">BOTTOM</p>
        </div>
        <div class="item_review item_review3">
            <p class="text_itemReview">ACCESSORIES</p>
        </div>
    </div>

    <h1 class="title_home_product">NEW ARRIVAL</h1>
    <div class="products_home">
        <?php
        include_once 'connect.php';
        global $conn;

        $sql = "SELECT id, name, price, image FROM product";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '
                    <div class="item_products_home">
                        <a href="src/DetailProducts.php?id=' . $row['id'] . '" class="product_link">
                            <div class="image_home_item">
                                <img src="img/products/' . $row['image'] . '" alt="' . $row['name'] . '" class="image_products_home">
                            </div>
                            <h4 class="infProducts_home">' . $row['name'] . '</h4>
                            <p class="infProducts_home">' . number_format($row['price'], 0, ',', '.') . ' VND</p>
                        </a>
                    </div>';
            }
        } else {
            echo '<p>Không có sản phẩm nào.</p>';
        }

        $conn->close();
        ?>
    </div>

    <footer>
        <div class="logo_footer"></div>
        <ul class="contact_footer">
            <li>
                <div class="item_title_contact">
                    <p class="title_contact">LIÊN HỆ</p>
                </div>
                <div class="content_contact">
                    <ul>
                        <li class="address_contact"><i class="fa-solid fa-location-dot"></i> 54 Triều Khúc - Thanh Xuân - Hà Nội</li>
                        <li class="address_contact"><i class="fa-solid fa-phone"></i> Hotline: 083868386</li>
                        <li class="address_contact"><i class="fa-solid fa-envelope"></i> Email: utt@gmail.com</li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="item_title_contact">
                    <p class="title_contact">CHÍNH SÁCH</p>
                </div>
                <div class="content_contact">
                    <ul>
                        <li class="address_contact"><a href="src/CSTV.php">Chính sách thành viên</a></li>
                        <li class="address_contact"><a href="src/CSDT.php">Chính sách đổi trả</a></li>
                        <li class="address_contact"><a href="src/CSVC.php">Chính sách vận chuyển</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="item_title_contact">
                    <p class="title_contact">KẾT NỐI</p>
                </div>
                <div class="content_contact">
                    <ul style="display: flex; gap:20px;">
                        <li class="address_contact"><i class="fa-brands fa-facebook"></i></li>
                        <li class="address_contact"><i class="fa-brands fa-instagram"></i></li>
                    </ul>
                </div>
            </li>
        </ul>
    </footer>
</div>

<script>
    $(document).ready(function () {
        $('.slick-carousel').slick({
            slidesToShow: 5,
            slidesToScroll: 4,
            autoplay: true,
            autoplaySpeed: 900,
        });
    });
</script>
</body>

</html>
