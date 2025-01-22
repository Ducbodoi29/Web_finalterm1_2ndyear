<?php
    $conn = mysqli_connect("localhost","root","","pantio");
    if(!$conn){
        echo ("Connection failed: ". mysqli_connect_error());
    }
?>