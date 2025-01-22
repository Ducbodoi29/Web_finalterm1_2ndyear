<?php
require_once '../connect.php';
global $conn;
$fullname = $_POST['fullname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$note = $_POST['note'];
$product = $_POST['product'];
$price = $_POST['price'];

$sql = "INSERT INTO `order` (fullname, phone, email, address, note, product, price)
        VALUES ('$fullname', '$phone', '$email', '$address', '$note', '$product', '$price')";

if ($conn->query($sql) === TRUE) {
    echo "Đơn hàng đã được thêm thành công!";
    header("Location: accesPay.php");
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}