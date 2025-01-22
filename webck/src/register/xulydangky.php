<?php
require_once '../../connect.php';
global $conn;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $sql = "INSERT INTO user (fullname, email, phone, password) VALUES ('$fullname', '$email', '$phone', '$password')";

    if(mysqli_query($conn, $sql)){
        echo "successfully";
        header("location:../../index.php");

    } else{ echo "Error: " . $sql . "<br>" . mysqli_error($conn); }
}

else {
    echo "False";
}