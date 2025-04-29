<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
   body {
    background: linear-gradient(to right, #000428, #004e92);
    color: white;
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
.navbar-custom .navbar-toggler {
    background: linear-gradient(135deg,rgb(94, 27, 14), #dd2476); /* Gradient đỏ-tím nổi bật */
    border: none;
    padding: 8px 12px;
    border-radius: 8px;
    box-shadow: 0px 2px 10px rgba(255, 255, 255, 0.3); /* Hiệu ứng bóng nhẹ */
    transition: all 0.3s ease-in-out;
}
.navbar-custom .navbar-toggler:hover {
    background: linear-gradient(135deg, #dd2476, #ff512f);
    transform: scale(1.1);
}.navbar-custom {
    background: linear-gradient(90deg, #1a1a1a, #434343); /* Gradient đen-xám sang trọng */
}

.navbar-toggler {
    background-color: #ffcc00; /* Màu vàng ánh kim nổi bật */
}
.nav-link {
    color: white !important; /* Chữ trắng nổi bật */
    font-weight: bold;
    transition: all 0.3s ease-in-out;
}

.table-dark {
    background: linear-gradient(135deg, #1a1a1a, #434343); /* Gradient đen xám mềm mại */
    color: #f5f5f5;
    border-radius: 10px;
    box-shadow: 2px 2px 10px rgba(255, 255, 255, 0.1);
}
.table-dark thead {
    background: linear-gradient(90deg, #8e44ad, #ffcc00);
    color: white;
    font-weight: bold;
}
.table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(255, 255, 255, 0.05); /* Nhẹ hơn một chút */
}

.table-striped tbody tr:hover {
    background-color: rgba(255, 255, 255, 0.15); /* Hiệu ứng hover */
    transition: 0.3s ease-in-out;
}
.table-dark td, .table-dark th {
    border: 1px solid rgba(237, 144, 144, 0.2); /* Viền trắng nhẹ */
    padding: 12px;
}

</style>
</head>
<body>
             <!-- nav -->
    <nav class="navbar navbar-light navbar-custom">
      <div class="container-fluid">
      <img src="../View/upload/jenkins_logo_icon_170552.ico" alt="" width="32" height="32" class="d-inline-block align-text-top">
    </a>
        <button
          class="navbar-toggler navbar-custom"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a
                class="nav-link active"
                aria-current="page"
                href="../index.php"
                >Trang chủ</a
              >
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../View/them_sach.php">Thêm sách</a>
              
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../View/danhsach.php">Xem danh sách</a>
              
            </li>
          </ul>
        </div>
      </div>
    </nav>
      <!-- header -->
    <div class="container">
      <table class="table table-dark table-striped">
      <tr align="center"><th colspan ="2" >Quản Lý Danh Mục</th></tr>
      <tr>
          <th>ID</th>
          <th>Danh mục</th>
      </tr>
      <?php
      // Kết nối database
      $conn = new mysqli("localhost", "root", "", "ql_sach",3307);
      if ($conn->connect_error) {
          die("Kết nối thất bại: " . $conn->connect_error);
      }
      // Lấy danh sách danh mục
      $sql = "SELECT * FROM danhmuc"; 
      $result = $conn->query($sql); 
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo "
              <tr>
              <td>" . $row["DanhMucID"] . "</td>
              <td>" . $row["TenDanhMuc"] . "</td>
              </tr>
              ";
          }
      } else {
          echo "<tr><td>Không có danh mục nào.</td></tr>";
      }
      // Đóng kết nối
      $conn->close();
      ?>
  </table>
     <!-- thêm -->
                 <div class="text-center mb-4 container">
                    <form action="../Model/xulythem_danhmuc.php" method="post">
                    <input class="form-control" type="text" name ="TenDanhMuc" aria-label="Nhập tên danh mục" placeholder="Nhập tên danh mục" required>
                    <br>
                <button class="btn btn-outline-success me-2" type="submit">Thêm</button>
                <button class="btn btn-outline-warning me-2" type="reset">Xóa</button>                
                    </form>

               </div>
               </div>
               <footer class="bg-dark text-white text-center p-3">
    © 2025 - Trang quản lý sách | Thiết kế bởi Trí Nhàn
</footer>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                </body>
</html>