<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="myProjects/webProject/icofont/css/icofont.min.css">
<style>
  body {
    background: linear-gradient(to right, #000428, #004e92);
    color: white;
}
.navbar-nav {
    display: flex !important;
    justify-content: center;
}

.navbar-collapse {
    display: flex !important;
    flex-direction: row;
}
.navbar-custom {
    /* background: linear-gradient(90deg, #212121, #424242); Màu xám tối sang trọng */
    background: linear-gradient(to left, #000428, #004e92); /* Gradient xanh đậm huyền bí */
    padding: 10px 20px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3); /* Hiệu ứng đổ bóng */
}

.navbar-brand img {
    border-radius: 50%; /* Làm mềm logo */
    box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.3);
}

.nav-link {
    color: white !important; /* Chữ trắng nổi bật */
    font-weight: bold;
    transition: all 0.3s ease-in-out;
}
.dropdown-item {
    /* color: white !important; Chữ trắng nổi bật */
    transition: all 0.3s ease-in-out;
}
.nav-link:hover, .dropdown-item:hover {
    color: rgb(255, 215, 0) !important; /* Khi rê chuột, chuyển sang vàng ánh kim */
    text-decoration: underline; /* Gạch chân khi rê chuột */
}
.nav-link,.dropdown-item:hover {
    color:rgb(159, 8, 51) !important; /* Khi rê chuột, chuyển sang vàng ánh kim */
}
  .card {
    background: linear-gradient(135deg, #8e44ad, #2980b9);
    color: white;
    border-radius: 15px;
    box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);}
    .btn-primary {
    background: linear-gradient(to right, #ff512f, #dd2476);
    border: none;
    border-radius: 10px;
    transition: all 0.3s ease-in-out;
}

.btn-primary:hover {
    background: linear-gradient(to right, #dd2476, #ff512f);
    transform: scale(1.05); /* Hiệu ứng phóng nhẹ */
}
</style>
  </head>
<body>
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="../Buoi_TH6/View/upload/jenkins_logo_icon_170552.ico" alt="Logo" width="32" height="32">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        Menu
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Đăng nhập</a></li>
                        <li><a class="dropdown-item" href="#">Đăng ký</a></li>
                        <li><a class="dropdown-item" href="./View/them_sach.php">Thêm sách</a></li>
                        <li><a class="dropdown-item" href="./View/them_danhmuc.php">Thêm danh mục</a></li>
                        <li><a class="dropdown-item" href="./View/danhsach.php">Xem danh sách</a></li>
                        <li><a class="dropdown-item disabled" href="#">Thêm về chúng tôi</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- header -->
        <?php
        // Kết nối database
        $conn = new mysqli("localhost", "root", "", "ql_sach");
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }

        // Lấy danh sách sách từ database
        $sql = "SELECT * FROM sach join danhmuc on sach.DanhMucID = danhmuc.DanhMucID";
        $result = $conn->query($sql);

        // Hiển thị dữ liệu theo chiều ngang
        ?>
        <div class="containe ps-5">
        <div class="row">
          <?php
        if ($result->num_rows > 0) {          
            while ($row = $result->fetch_assoc()) {
              ?>              
              <div class="card mb-3" style="max-width: 350px; padding: 5px; margin: 10px;">
              <div class="row g-0" style="height: 90%;">
                  <!-- Cột ảnh (40%) -->
                  <div class="col-4">
                      <img src="../Buoi_TH6/View/upload/<?php echo $row['HinhAnh']; ?>" class="img-fluid rounded-start" alt="Hình ảnh sách">
                  </div>
                  <!-- Cột thông tin (60%) -->
                  <div class="col-8">
                      <div class="card-body">
                          <h5 class="card-title">Tên sách: <?php echo $row['TenSach']; ?></h5>
                          <p class="card-text">Tên nhà xuất bản: <?php echo $row['NhaXuatBan']; ?></p>
                          <p class="card-text">Danh mục: <?php echo $row['TenDanhMuc']; ?></p>
                          <p class="card-text">Giá Bán: <?php echo $row['GiaBan']; ?> VNĐ</p>
                          <button type="button" class="btn btn-primary">Xem chi tiết</button>
                      </div>
                  </div>
              </div>
              <!-- Hàng dưới (40%) -->
              <div class="card-footer bg-drank">
                  <p class="card-text"><i><?php echo $row['MoTa']; ?></i></p>
              </div>
          </div>
      <?php 
            }
        } else {
            echo "<p>Không có dữ liệu.</p>";
        }

        $conn->close();
        ?>
    </div >
    
</div>
</div>
<!-- footer -->
                <footer class="bg-dark text-white text-center p-3">
    © 2025 - Trang quản lý sách | Thiết kế bởi Trí Nhàn
</footer>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
            </body>
</html>