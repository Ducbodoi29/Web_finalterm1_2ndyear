<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/templatemo-style.css" rel="stylesheet">
    <style>
        th{
            text-align: center;
        }
    </style>
</head>
<body>
<div class="templatemo-flex-row">
    <!-- Sidebar -->
    <div class="templatemo-sidebar">
        <header class="templatemo-site-header">
            <h1>Admin Dashboard</h1>
        </header>
        <div class="profile-photo-container">
            <img src="../images/profile-photo.jpg" alt="Profile Photo" class="img-responsive">
        </div>
        <nav class="templatemo-left-nav">
            <ul>
                <li><a href="../index.php"><i class="fa fa-home"></i> TRANG CHỦ</a></li>
                <li><a href="#" class="active"><i class="fa fa-bar-chart"></i> THÔNG TIN SẢN PHẨM</a></li>
                <li><a href="../Khachhang/Khachhang.php"><i class="fa fa-users"></i> THÔNG TIN KHÁCH HÀNG</a></li>
                <li><a href="../dondathang/dondathang.php"><i class="fa fa-sliders"></i> ĐƠN ĐẶT HÀNG</a></li>
                <li><a href="../../src/login.php"><i class="fa fa-sign-out"></i> ĐĂNG XUẤT</a></li>
            </ul>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-top-nav-container">
            <nav class="templatemo-top-nav">
                <ul class="text-right">
                    <li><a href="login.html">Sign out</a></li>
                    <img src="../../img/profile.jpg" alt="Admin" class="img-thumbnail" style="width: 50px; height: 50px; border-radius: 25px;">
                </ul>
            </nav>
        </div>

        <!-- Data Table Section -->
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading text-center" style="background: #1f9cca">
                    <h2><strong><i class="fa fa-table"></i> BẢNG QUẢN LÝ SẢN PHẨM</strong></h2>
                </div>
                <div class="panel-body">
                    <form class="form-inline text-center" style="margin-bottom: 20px;" method="post">
                        <input type="text" name="search" class="form-control" placeholder="Nhập thông tin tìm kiếm" style="width: 300px;">
                        <button type="submit" name="find" class="btn btn-info"><i></i> Tìm kiếm</button>
                        <a href="" class="btn btn-secondary"><i class="fa fa-list"></i> Hiển thị tất cả</a>
                        <a href="addproduct.php" class="btn btn-success" style="margin-left: 10px;"><i class="fa fa-user-plus"></i> Thêm sản phẩm</a>
                    </form>

                    <?php
                        require_once "../../connt/connect.php";
                        global $conn;

                        $sql = "SELECT * FROM product";
                        if (isset($_POST['find'])) {
                            $search = $_POST['search'];

                            if (!empty($search)) {
                                $sql = "SELECT * FROM product WHERE name LIKE '%$search%' ";
                            }
                        }

                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);

                        if (isset($_POST['find']) && empty($search)) {
                            echo '<div class="alert alert-warning text-center">Vui lòng nhập để tìm kiếm.</div>';
                        } elseif (isset($_POST['find']) && $count <= 0) {
                            echo '<div class="alert alert-danger text-center">Không tìm thấy kết quả nào với từ khóa: <strong>' . $search . '</strong></div>';
                        } elseif (isset($_POST['find']) && $count > 0) {
                            echo '<div class="alert alert-success text-center">Tìm thấy <strong>' . $count . '</strong> kết quả với từ khóa: <strong>' . $search . '</strong></div>';
                        }
                    ?>

                    <table class="table table-bordered table-hover text-center">
                        <thead class="bg-info">
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Loại</th>
                            <th>Mô tả sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Ghi chú</th>
                            <th>Ảnh</th>
                            <th>Tùy chọn</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>{$row['id']}</td>";
                                echo "<td>{$row['name']}</td>";
                                echo "<td>{$row['type']}</td>";
                                echo "<td>{$row['describe']}</td>";
                                echo "<td>{$row['quantity']}</td>";
                                echo "<td>{$row['price']}</td>";
                                echo "<td>{$row['note']}</td>";

                                if (!empty($row['image']) && file_exists($row['image'])) {
                                    echo "<td><img src='" . htmlspecialchars($row['image']) . "' alt='Sản phẩm' class='img-fluid' style='max-width: 100px; max-height: 100px; object-fit: cover;'></td>";
                                } else {
                                    echo "<td>Ảnh không tồn tại</td>";
                                }
                                echo "<td>
                                    <a href='edit.php?hid={$row['id']}' class='btn btn-warning btn-sm'>
                                        <i class='fa fa-edit'></i> Sửa
                                    </a>
                                    <a href='delete.php?hid={$row['id']}' onclick='return confirm(\"Bạn có muốn xóa sản phẩm này không?\");' class='btn btn-danger btn-sm'>
                                        <i class='fa fa-trash'></i> Xóa
                                    </a>
                                </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='9'>Không có dữ liệu</td></tr>";
                        }
                        ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <footer class="text-right">
            <p>Trang admin đẹp nhất thế giới | Designed by <a href="#">Nhóm 8</a></p>
        </footer>
    </div>
</div>

<!-- Scripts -->
<script src="../js/jquery-1.11.2.min.js"></script>
<script src="../js/templatemo-script.js"></script>
</body>
</html>
