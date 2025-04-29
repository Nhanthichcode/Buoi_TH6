<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $con = new mysqli("localhost", "root", "vertrigo", "ql_sach");
    // Kiểm tra kết nối
    if ($con->connect_error) {
        die("Kết nối thất bại: " . $con->connect_error);
    }
    // Nhận dữ liệu từ form
    // id tự tăng
    $category = $_POST['TenDanhMuc'];
    // Thêm vào database
    $sql = "INSERT INTO danhmuc (TenDanhMuc) VALUES ('$category')";
    if ($con->query($sql) === TRUE) {
    } else {
        echo "Lỗi: " . $con->error;
    }
    // Đóng kết nối
    $con->close();
    echo "<script>alert('Xóa sách thành công!');</script>";
    echo "<script>window.location.href='../View/them_danhmuc.php';</script>";
    ?>
</body>
</html>