<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <!-- nave menu -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Menu</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../index.php">Trang chủ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../View/danhsach.html">Danh Sách sách</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../View/them_sach.php">Thêm sách</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="../View/them_danhmuc.php" tabindex="-1" aria-disabled="true">Thêm danh mục</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <?php
    $conn = new mysqli("localhost", "root", "", "ql_sach");
    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    
    // Nhận dữ liệu từ form
    $name = $_POST['name'];
    $category = $_POST['category'];
    $publisher = $_POST['publisher'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    // Xử lý hình ảnh
    $image = $_FILES['image']['name'];
    $target_dir = "../View/upload/";
    $target_file = $target_dir . basename($image);
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // Thêm vào database
        $sql = "INSERT INTO sach (TenSach, NhaXuatBan, DanhMucID, GiaBan, MoTa, HinhAnh) VALUES ('$name', '$publisher', '$category', '$price', '$description', '$image')";
        if ($conn->query($sql) === TRUE) {
          echo "<script>alert('Thêm sách thành công!');</script>";
          $conn->close();
          // Chuyển hướng về trang thêm sách
          echo "<script>window.location.href='../View/them_sach.php';</script>";
        }else{         
            echo "Lỗi: " . $conn->error;
        }
    } else {
        echo "Lỗi tải lên ảnh.";
    }
    // Đóng kết nối
    $conn->close();
    
    ?> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
               
</body>
</html>