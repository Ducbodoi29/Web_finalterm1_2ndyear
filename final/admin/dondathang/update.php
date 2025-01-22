<?php
require_once('../../connt/connect.php');
global $conn;
$hmid=$_POST["hid"];
$fullname = $_POST["fullname"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$product=$_POST["product"];
$quantity=$_POST["quantity"];
$price=$_POST["price"];

if(isset($fullname, $phone, $address, $product, $quantity, $price) && $fullname !== '' && $phone !== '' && $address !== '' && $product !== '' && $quantity !== '' && $price !== '') {
    $update_sql = "UPDATE `orders` SET `fullname`='$fullname', `phone`='$phone', `address`='$address', `product`='$product', `quantity`='$quantity', `price`='$price' WHERE id_order='$hmid' ";
    if (mysqli_query($conn, $update_sql)) {
        echo "Cập nhật thành công!";
        header("Location: dondathang.php");

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
