<?php
require_once('../../connect.php');
global $conn;
$hmid=$_POST["hid"];
$fullname = $_POST["fullname"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$product=$_POST["product"];
$price=$_POST["price"];

if(isset($fullname, $phone, $address, $product, $price) && $fullname !== '' && $phone !== '' && $address !== '' && $product !== '' && $price !== '') {
    $update_sql = "UPDATE `order` SET `fullname`='$fullname', `phone`='$phone', `address`='$address', `product`='$product', `price`='$price' WHERE id_order='$hmid' ";
    if (mysqli_query($conn, $update_sql)) {
        echo "Cập nhật thành công!";
        header("Location: index.php");

    } else {
        echo "Lỗi: " . mysqli_error($conn);
        exit;
    }
}
else{
    echo ("Vui lòng điền đầy đủ thông tin.");
    exit;
}
?>
