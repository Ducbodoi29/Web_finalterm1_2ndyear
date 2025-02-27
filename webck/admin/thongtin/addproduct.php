<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="checking.js"></script>
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
            <h2><strong>THÊM SẢN PHẨM</strong></h2>
        </div>
        <div class="panel-body">
            <form action="xulyadd.php" method="post" id="form" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name"><strong>Tên sản phẩm</strong></label>
                    <input type="text" id="name" name="name" placeholder="Điền tên sản phẩm" class="form-control">
                </div>
                <div class="form-group">
                    <label for="type"><strong>Loại</strong></label>
                    <input type="text" id="type" name="type" class="form-control" placeholder="Điền loại sản phẩm">
                </div>
                <div class="form-group">
                    <label for="describe"><strong>Mô tả sản phẩm</strong></label><br>
                    <input type="text" id="describe" name="describe" class="form-control" placeholder="Điền mô tả">
                </div>
                <div class="form-group">
                    <label for="quantity"><strong>Số lượng</strong></label>
                    <input type="number" id="quantity" name="quantity" placeholder="Điền số lượng" class="form-control">
                </div>
                <div class="form-group">
                    <label for="price"><strong>Giá</strong></label>
                    <input type="number" id="price" name="price" placeholder="Điền giá" class="form-control">
                </div>
                <div class="form-group">
                    <label for="note"><strong>Ghi chú</strong></label>
                    <input type="text" id="note" name="note" placeholder="Điền ghi chú" class="form-control">
                </div>
                <div class="form-group">
                    <label for="image"><strong>Ảnh sản phẩm</strong></label>
                    <input type="file" id="image" name="image" class="form-control" accept="image/*">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg">Thêm</button>
                    <button type="reset" class="btn btn-danger btn-lg">Hủy</button>
                    <a href="index.php" class="btn btn-info btn-lg">Quay lại trang chủ</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
