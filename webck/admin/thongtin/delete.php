<?php
    require_once('../../connect.php');
    global $conn;
    $hid=$_GET['hid'];
    $delete_sql="DELETE FROM product WHERE id='$hid'";
    if(mysqli_query($conn,$delete_sql)){echo 'true';}else{echo 'false';}
    header("location:index.php");