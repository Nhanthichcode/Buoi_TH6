<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Xem danh sách</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <style>
       body {
    background: linear-gradient(to right, #000428, #004e92);
    color: white;
       }
       table ,td,th{
        color: white;
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
    </style>
  </head>
  <body>
         <!-- nav -->
         <nav class="navbar navbar-light navbar-custom">
      <div class="container-fluid">
      <img src="../View/upload/jenkins_logo_icon_170552.ico" alt="" width="64" height="64" class="d-inline-block align-text-top">
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
            <a class="nav-link" href="../View/them_danhmuc.php">Thêm danh mục</a>
              
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- header -->
    <div class="container mt-5">
      <h1 class="text-center">Các loại sách</h1><hr>
      <!-- hình ảnh-->
      <div class="container">
        <table class="table table-striped table-bordered table-hover">
        <thead >
        <tr>
            <th>Hình ảnh</th>
            <th>ID</th>
            <th>Tên sách</th>
            <th>Danh mục</th>
            <th>Nhà xuất bản</th>
            <th>Giá bán</th>
            <th>Mô tả</th>
            <th></th>
        </tr>
    </thead>
          <?php
          // Kết nối database
          $conn = new mysqli("localhost", "root", "", "ql_sach",3307);
          if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
          }
          // Lấy danh sách sách
          $sql = "SELECT * FROM sach  join danhmuc on sach.DanhMucID = danhmuc.DanhMucID";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            // Hiển thị danh sách sách
            while ($row = $result->fetch_assoc()) {
              echo "
              <tr>
                <td><img src='upload/" . $row["HinhAnh"] . "' alt='Hình ảnh sách' width='50' /></td>          
                <td>" . $row["SachID"] . "</td>
                <td>" . $row["TenSach"] . "</td>
                <td>" . $row["TenDanhMuc"] . "</td>
                <td>" . $row["NhaXuatBan"] . "</td>
                <td>" . $row["GiaBan"] . " VNĐ</td>
                <td>" . $row["MoTa"] . "</td>
                <td><button type= 'button' value=".$row['SachID']." class='btn btn-danger'>Xóa</button></rd>
                </tr>";
            }
          } else {
            echo "<tr><td colspan='7'>Không có sách nào.</td></tr>";
          }
          // Đóng kết nối
          $conn->close();
          ?>
        </table>      
      </div>
    </div>

    <footer class="bg-dark text-white text-center p-3">
    © 2025 - Trang quản lý sách | Thiết kế bởi Trí Nhàn
</footer>
<script>
  document.querySelectorAll('.btn').forEach(element => {
    element.addEventListener('click', function() {
    var sachID = this.value;
    if (confirm('Bạn có chắc chắn muốn xóa sách  này không?')) {
      window.location.href = '../Model/xulyxoa_sach.php?SachID=' + sachID;
    }
  });
  });
</script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
