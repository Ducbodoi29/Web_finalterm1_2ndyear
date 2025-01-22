document.addEventListener("DOMContentLoaded", function () {
    // Gửi yêu cầu AJAX để lấy số lượt truy cập
    fetch("counter.php?action=get_count")
        .then(response => response.text())
        .then(data => {
            document.getElementById("visit-count").innerText = data;
        })
        .catch(error => {
            console.error("Lỗi khi tải dữ liệu:", error);
        });
});