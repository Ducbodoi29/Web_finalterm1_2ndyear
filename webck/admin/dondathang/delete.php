<?php
require_once('../../connect.php');
global $conn;
$hid=$_GET['hid'];
$delete_sql="DELETE FROM `order` WHERE id_order='$hid'";
mysqli_query($conn,$delete_sql);
header("location:index.php");