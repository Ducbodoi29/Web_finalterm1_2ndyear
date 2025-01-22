<?php
    require_once "../../connt/connect.php";
    global $conn;

    $name = isset($_POST["name"]) ? $_POST["name"] : null;
    $type = isset($_POST["type"]) ? $_POST["type"] : null;
    $describe = isset($_POST["describe"]) ? $_POST["describe"] : null;
    $quantity = isset($_POST["quantity"]) ? $_POST["quantity"] : null;
    $price = isset($_POST["price"]) ? $_POST["price"] : null;
    $note = isset($_POST["note"]) ? $_POST["note"] : null;
    $image = isset($_FILES["image"]) ? $_FILES["image"] : null;

    $imagePath = null;
    if ($image && $image["error"] == 0) {
        $targetDir = "../../uploads_img/";
        $imagePath = $targetDir . basename($image["name"]);
        if (move_uploaded_file($image["tmp_name"], $imagePath)) {
            echo "Ảnh đã được upload thành công!";
        } else {
            echo "Upload ảnh thất bại!";
            $imagePath = null;
        }
    }

    $addsql = "INSERT INTO `product`(`name`, `type`, `describe`, `quantity`, `price`, `note`, `image`)
               VALUES ('$name','$type','$describe','$quantity','$price','$note','$imagePath')";
    if (mysqli_query($conn, $addsql)) {
        echo 'Thêm sản phẩm thành công!';
        header("Location: Thongtin.php");
        exit();
    } else {
        echo 'Lỗi khi thêm sản phẩm!';
    }

?>
