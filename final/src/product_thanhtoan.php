<?php
            require_once("connt/connect.php"); // Kết nối cơ sở dữ liệu
            global $conn;
            if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
                die("ID sản phẩm không hợp lệ.");
            }

            $product_id = intval($_GET['id']);

            // Truy vấn sản phẩm theo ID
            $sql = "SELECT * FROM product WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $product_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $product = $result->fetch_assoc();
            } else {
                die("Không tìm thấy sản phẩm.");
            }
        ?>