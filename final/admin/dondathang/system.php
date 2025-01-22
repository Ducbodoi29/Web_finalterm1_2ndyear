<?php
    require "../../connt/connect.php";
    global $conn;

    $fullname = isset($_POST["fullname"]) ? $_POST["fullname"] : null;
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : null;
    $address = isset($_POST["address"]) ? $_POST["address"] : null;
    $product = isset($_POST["product"]) ? $_POST["product"] : null;
    $quantity = isset($_POST["quantity"]) ? $_POST["quantity"] : null;
    $price = isset($_POST["price"]) ? $_POST["price"] : null;

    if(isset($fullname, $phone, $address, $product, $quantity, $price) && $fullname !== '' && $phone !== '' && $address !== '' && $product !== '' && $quantity !== '' && $price !== '')
    {
        $addsql = "INSERT INTO `orders`(`fullname`, `phone`, `address`,`product`,`quantity`,`price`)
                   VALUES ('$fullname', '$phone', '$address', '$product', '$quantity', '$price')";
        if(mysqli_query($conn, $addsql)){
            echo "successfully";
        } else{ echo "Error: " . $addsql . "<br>" . mysqli_error($conn); }

    header("location:dondathang.php");
}

else {
    echo "False";
    }

?>
