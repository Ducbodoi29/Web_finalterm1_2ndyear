<?php
// Đường dẫn tới file lưu số lượt truy cập
$counterFile = 'counter.txt';

// Nếu file không tồn tại, tạo file và đặt giá trị ban đầu là 0
if (!file_exists($counterFile)) {
    file_put_contents($counterFile, 0);
}

// Đọc số lượt truy cập hiện tại
$counter = (int)file_get_contents($counterFile);

// Kiểm tra nếu đây là yêu cầu AJAX từ admin.html
if (isset($_GET['action']) && $_GET['action'] === 'get_count') {
    echo $counter; // Trả về số lượt truy cập
    exit;
}

// Tăng số lượt truy cập (chỉ khi truy cập vào trang web)
$counter++;
file_put_contents($counterFile, $counter);
?>

