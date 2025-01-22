<?php
    require_once('../../connect.php');
    global $conn;

    $fullname = isset($_POST["fullname"]) ? $_POST["fullname"] : null;
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : null;
    $address = isset($_POST["address"]) ? $_POST["address"] : null;
    $product = isset($_POST["product"]) ? $_POST["product"] : null;
    $price = isset($_POST["price"]) ? $_POST["price"] : null;

    if(isset($fullname, $phone, $address, $product, $price) && $fullname !== '' && $phone !== '' && $address !== '' && $product !== '' && $price !== '')
    {
        $addsql = "INSERT INTO `order`(`fullname`, `phone`, `address`,`product`,`price`)
                   VALUES ('$fullname', '$phone', '$address', '$product', '$price')";
        if(mysqli_query($conn, $addsql)){
            echo "successfully";
        } else{ echo "Error: " . $addsql . "<br>" . mysqli_error($conn); }

    header("location:index.php");
}

else {
    echo "False";
    }

?>
