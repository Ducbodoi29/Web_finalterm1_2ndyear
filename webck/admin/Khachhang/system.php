<?php
    require_once('../../connect.php');
    global $conn;

    $fullname = isset($_POST["fullname"]) ? $_POST["fullname"] : null;
    $email = isset($_POST["email"]) ? $_POST["email"] : null;
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : null;
    $password = isset($_POST["password"]) ? $_POST["password"] : null;

    if(isset($fullname, $email, $phone, $password) && $fullname !== '' && $email !== '' && $phone !== '' && $password !== '')
    {
        $addsql = "INSERT INTO `user`(`fullname`, `email`, `phone`, `password`)
                   VALUES ('$fullname','$email','$phone','$password')";
        if(mysqli_query($conn, $addsql)){
            echo "successfully";
        } else{ echo "Error: " . $addsql . "<br>" . mysqli_error($conn); }

    header("location:index.php");
}

else {
    echo "False";
    }

?>
