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

<?php
    $product_id = isset($_GET['id']) ? intval($_GET['id']) : 1;

    $sql = "SELECT * FROM product WHERE id = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        $name = $product['name'];
        $describe = $product['describe'];
        $price = number_format($product['price'], 0, ',', '.') . ' VNĐ';
        $image = $product['image'];
    } else {
        echo "Product not found.";
        exit;
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
    <link rel="stylesheet" href="../src/css/detailProduct.css">
    <link rel="shortcut icon" href="../LOGI NORTHSIDE CREW.png">
    <title><?php echo $name; ?> - NORTHSIDE CREW</title>
</head>
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
    <div class="content_detailProduct">
        <div class="img_product">
            <img src="<?php echo substr($product['image'], 3); ?>" alt="<?php echo $name; ?>" class="image_shirt">
        </div>
        <div class="inf_product">
            <h2 class="title_inf_products"><?php echo $name; ?></h2>
            <p class="price_inf_products"><?php echo $price; ?></p>
            <p class="status_inf_products">Tình trạng: <span class="status_color_inf">Còn hàng</span></p>
            <p class="color_inf_products">Màu sắc:</p>
            <div class="item_box_color"></div>
            <p class="size_inf_products">Size:</p>
            <div class="box_option_size">
                <div class="item_box_optionSize"><p class="size_item_box">S</p></div>
                <div class="item_box_optionSize"><p class="size_item_box">M</p></div>
                <div class="item_box_optionSize"><p class="size_item_box">L</p></div>
                <div class="item_box_optionSize"><p class="size_item_box">XL</p></div>
            </div>
            <div class="quantity_box">
                <a href="PayCart.php?id=<?php echo $product_id; ?>" class="btn_quantity_box">Mua hàng</a>
            </div>
            <div class="inf_detailProducts">
                <p class="title_detai_products">Chi tiết sản phẩm</p>
                <ul class="box_detail_products_inf">
                    <li><?php echo nl2br($describe); ?></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Sản phẩm liên quan -->
    <div class="Related_products">
        <h2 class="title_related_products">SẢN PHẨM LIÊN QUAN</h2>
        <div class="product_related">
            <?php
            $related_sql = "SELECT id, name, price, image FROM product WHERE id != $product_id LIMIT 4";
            $related_result = $conn->query($related_sql);

            while ($related = $related_result->fetch_assoc()) {
                echo '
        <div class="item_product_related">
            <a href="DetailProducts.php?id=' . $related['id'] . '" class="product_link_related">
                <img src="../img/products/' . $related['image'] . '" alt="' . $related['name'] . '" class="image_products_related">
                <div class="boxname_product_related">
                    <p class="name_product_related">' . $related['name'] . '</p>
                </div>
                <p class="price_product_related"><strong>' . number_format($related['price'], 0, ',', '.') . ' VNĐ</strong></p>
            </a>
        </div>';
            }
            ?>
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
