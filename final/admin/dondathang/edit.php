<?php
    require_once('../../connt/connect.php');
    global $conn;
    $hid=$_GET["hid"];
    $edit_sql="SELECT * FROM `orders` WHERE id_order='$hid'";
    $result=mysqli_query($conn,$edit_sql);
    $row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Sửa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .container {
            margin-top: 50px;
        }
        .panel {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(10px);
            border-radius: 10px;
        }
        .panel-heading {
            background-color: #1f9cca ;
            color: #ffffff ;
            padding: 20px;
        }
        .btn {
            border-radius: 25px;
        }
        select.form-control {
            display: inline-block;
            width: auto;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading text-center">
            <h2><strong>BẢNG SỬA CHỮA</strong></h2>
        </div>
        <div class="panel-body">
            <form action="update.php" method="post" id="form">
                <input type="hidden" name="hid" value="<?php echo $hid?>">
                <div class="form-group">
                    <label for="fullname"><strong>Họ và tên</strong></label>
                    <input type="text" id="fullname" name="fullname" placeholder="Điền họ và tên" class="form-control" value="<?php echo $row["fullname"]?>">
                </div>
                <div class="form-group">
                    <label for="phone"><strong>Số điện thoại</strong></label>
                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Điền số điện thoại" value="<?php echo $row["phone"]?>">
                </div>
                <div class="form-group">
                    <label for="address"><strong>Địa chỉ</strong></label>
                    <input type="text" id="address" name="address" placeholder="Điền địa chỉ" class="form-control" value="<?php echo $row["address"]?>">
                </div>
                <div class="form-group">
                    <label for="product"><strong>Sản phẩm</strong></label>
                    <input type="text" id="product" name="product" placeholder="Điền sản phâm" class="form-control" value="<?php echo $row["product"]?>">
                </div>
                <div class="form-group">
                    <label for="quantity"><strong>Số lượng</strong></label>
                    <input type="text" id="quantity" name="quantity" placeholder="Điền số lượng" class="form-control" value="<?php echo $row["quantity"]?>">
                </div>
                <div class="form-group">
                    <label for="price"><strong>Giá</strong></label>
                    <input type="text" id="price" name="price" placeholder="Điền giá" class="form-control" value="<?php echo $row["price"]?>">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg">Xác nhận</button>
                    <button type="reset" class="btn btn-danger btn-lg">Hủy</button>
                    <a href="home.php" class="btn btn-info btn-lg">Quay lại trang chủ</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

