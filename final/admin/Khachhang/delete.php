<?php
require_once('../../connt/connect.php');
global $conn;
$hid=$_GET['hid'];
$delete_sql="DELETE FROM user WHERE id='$hid'";
mysqli_query($conn,$delete_sql);
header("location:Khachhang.php");