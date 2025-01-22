<?php
// Kết nối cơ sở dữ liệu
$conn = new mysqli('localhost', 'root', '', 'pantio');
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
$note = $_POST['note'];

// Kiểm tra nếu có ghi chú trước đó thì cập nhật, nếu không thì thêm mới
$sql_check = "SELECT id FROM notes LIMIT 1";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    // Cập nhật ghi chú
    $sql = "UPDATE notes SET content = ? WHERE id = 1";
} else {
    // Thêm mới ghi chú
    $sql = "INSERT INTO notes (content) VALUES (?)";
}

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $note);
if ($stmt->execute()) {
    echo "Lưu ghi chú thành công!";
} else {
    echo "Lỗi: " . $stmt->error;
}

$stmt->close();
$conn->close();
header("Location: ../trangchu/Trangchu.php"); // Quay lại trang chính
?>
