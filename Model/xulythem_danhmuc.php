<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $conn = new mysqli("localhost", "root", "", "ql_sach",3307);
// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
    // Nhận dữ liệu từ form
    // id tự tăng
    $category = trim($_POST['TenDanhMuc']); // Xóa khoảng trắng
$category = htmlspecialchars($category); // Ngăn XSS
$category = mysqli_real_escape_string($conn, $category);
    // Thêm vào database
    $sql = "INSERT INTO danhmuc (TenDanhMuc) VALUES ('$category')";
    if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Thêm danh mục thành công!');</script>";
    echo "<script>window.location.href='../View/them_danhmuc.php';</script>";
    } else {
        echo "Lỗi: " . $conn->error;
    }
    // Đóng kết nối
    $conn->close();
    echo "<script>alert('Thêm danh mục thành công!');</script>";
    echo "<script>window.location.href='../View/them_danhmuc.php';</script>";
    ?>
</body>
</html>