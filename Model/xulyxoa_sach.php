<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $con = new mysqli("localhost", "root", "", "ql_sach",3307);
    // Kiểm tra kết nối
    if ($con->connect_error) {
        die("Kết nối thất bại: " . $con->connect_error);
    }
    // Nhận dữ liệu từ form
    $sachID = $_GET['SachID'];
    //Kiểm tra
    $result = $con->query("SELECT * FROM sach WHERE SachID = '$sachID'");
        if ($result->num_rows == 0) {
    die("Lỗi: Không tìm thấy sách cần xóa! id ="+$sachID);
            }
    // Xóa sách
    $stmt = $con->prepare("DELETE FROM sach WHERE SachID = ?");
    $stmt->bind_param("i", $sachID);
    if($stmt->execute()) {
        // echo "Xóa sách thành công!";
        echo "<script>alert('Xóa sách thành công!');</script>";
        echo "<script>window.location.href='../View/danhsach.php';</script>";
    } else {
        // echo "Lỗi: " . $stmt->error;
        echo "<script>alert('Lỗi: " . $stmt->error . "');</script>";
        echo "<script>window.location.href='../View/danhsach.php';</script>";
        echo "Lỗi: " . $stmt->error;
    }
    // Đóng kết nối
    $stmt->close();
    $con->close();
    // Chuyển hướng về trang danh sách sách
    
?>
</body>
</html>