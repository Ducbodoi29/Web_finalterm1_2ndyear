<?php
// Kết nối cơ sở dữ liệu
$conn = new mysqli('localhost', 'root', '', 'pantio');
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy nội dung ghi chú từ bảng notes
$sql = "SELECT content FROM notes ORDER BY updated_at DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo htmlspecialchars($row['content']); // Hiển thị nội dung
} else {
    echo ""; // Không có ghi chú nào
}

$conn->close();
?>
