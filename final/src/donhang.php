<?php
require_once("../connt/connect.php"); // Kết nối cơ sở dữ liệu
global $conn;

// Kiểm tra id sản phẩm
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID sản phẩm không hợp lệ.");
}
$product_id = intval($_GET['id']);

// Xử lý dữ liệu từ form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = trim($_POST['fullname'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $location = trim($_POST['location'] ?? '');
    $tinh_tp = trim($_POST['tinh_tp'] ?? '');  // Mã tỉnh
    $quan_huyen = trim($_POST['quan_huyen'] ?? '');  // Mã quận
    $payment = trim($_POST['payment'] ?? '');
    $soluong = intval($_POST['soluong'] ?? 0);
    $gia = floatval($_POST['gia'] ?? 0);

    // Kiểm tra thông tin đầu vào
    if (empty($fullname) || empty($phone) || empty($email) || empty($location) || empty($tinh_tp) || empty($quan_huyen) || empty($payment)  || $gia <= 0) {
        die("Vui lòng điền đầy đủ thông tin hợp lệ.");
    }

    // Hàm lấy tên địa điểm từ mã
    function getLocationName($code, $type) {
        $url = '';
        switch ($type) {
            case 'province':
                $url = "https://provinces.open-api.vn/api/p/{$code}";
                break;
            case 'district':
                $url = "https://provinces.open-api.vn/api/d/{$code}";
                break;
            default:
                return "Không hợp lệ";
        }

        $data = @file_get_contents($url);
        if ($data) {
            $location = json_decode($data, true);
            return $location['name'] ?? 'Không tìm thấy tên';
        }
        return "Không tìm thấy dữ liệu cho mã {$code} ({$type})";
    }

    // Lấy tên tỉnh và quận
    $tinh_tp_name = getLocationName($tinh_tp, 'province');
    $quan_huyen_name = getLocationName($quan_huyen, 'district');

    // Chuẩn bị truy vấn SQL
    $stmt = $conn->prepare("INSERT INTO orders (product_id, fullname, phone, email, location, tinh_tp, quan_huyen, payment, so_luong, gia_mua) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssssid", $product_id, $fullname, $phone, $email, $location, $tinh_tp_name, $quan_huyen_name, $payment, $soluong, $gia);

    // Thực thi truy vấn
    if ($stmt->execute()) {
        echo "<script type='text/javascript'>
                alert('Bạn đã đặt hàng thành công, có vấn đề xin liên hệ sđt: 0352005165');
                setTimeout(function() {
                    window.location.href = '../index.php';
                }, 1000);
              </script>";
    } else {
        echo "<script type='text/javascript'>
                alert('Có lỗi xảy ra. Vui lòng thử lại.');
                setTimeout(function() {
                    window.location.href = '../index.php';
                }, 1000);
              </script>";
    }

    // Đóng kết nối
    $stmt->close();
    $conn->close();
}
?>