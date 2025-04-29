<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thêm sách</title>
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
}

.navbar-toggler {
    background-color: #ffcc00; /* Màu vàng ánh kim nổi bật */
}
.nav-link {
    color: white !important; /* Chữ trắng nổi bật */
    font-weight: bold;
    transition: all 0.3s ease-in-out;
}
.nav-link:hover, .dropdown-item:hover {
    color: rgb(255, 215, 0) !important; /* Khi rê chuột, chuyển sang vàng ánh kim */
    text-decoration: underline; /* Gạch chân khi rê chuột */
}
.nav-link,.dropdown-item:hover {
    color:rgb(13, 179, 200) !important; /* Khi rê chuột, chuyển sang vàng ánh kim */
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
            <a class="nav-link" href="../View/them_danhmuc.php">Thêm danh mục</a>
              
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../View/danhsach.php">Xem danh sách</a>
              
            </li>
          </ul>
        </div>
      </div>
    </nav>
  <!-- PHP -->
    <?php
// Kết nối database
$conn = new mysqli("localhost", "root", "", "ql_sach");
if ($conn->connect_error) { die("Kết nối thất bại: " . $conn->connect_error); }
    // Lấy danh sách danh mục
     $sql = "SELECT DanhMucID, TenDanhMuc FROM danhmuc"; 
     $result = $conn->query($sql); ?>
    <div class="text-center mb-4">      
    </div>

    <div class="container">
      <form
        action="../Model/xulythem_sach.php"
        method="post"
        enctype="multipart/form-data"
      >
        <table style="margin: auto; padding: 0;">
          <tr>
            <th>Thêm sách</th>
          </tr>
          <tr>
            <td>
              Tên sách <br /><input
                type="text"
                name="name"
                class="form-control"
                placeholder="Nhập tên sách"
              />
            </td>
          </tr>
          <tr>
            <td>
              Danh mục <br />
              <select name="category" class="form-control">
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["DanhMucID"] . "'>" . $row["TenDanhMuc"] . "</option>";
                        }
                    }
                    ?>
                </select>
            </td>
          </tr>
          <tr>
            <td>
              Nhà xuất bản <br />
              <input
                type="text"
                name="publisher"
                class="form-control"
                placeholder="Nhập nhà xuất bản"
              />
            </td>
          </tr>
          <tr>
            <td>
              Gía bán <br />
              <input
                type="text"
                name="price"
                class="form-control"
                placeholder="Nhập giá bán"
              />
            </td>
          </tr>
          <tr>
            <td>
              Mô tả <br />
              <textarea
                name="description"
                class="form-control"
                rows="5"
                placeholder="Nhập mô tả sách"
              ></textarea>
            </td>
          </tr>
          <tr>
            <td>
              <label for="formFile" class="form-label">Chọn hình ảnh</label
              ><br />
              <input class="form-control" type="file" name="image" id="formFile" />
              <hr />
            </td>
          </tr>
          <tr>
            <td>
              <button class="btn btn-outline-success me-2" type="submit">
                Lưu
              </button>
              <button class="btn btn-sm btn-outline-danger" type="reset">
                Hủy
              </button>
            </td>
          </tr>
        </table>
      </form>
      <?php
$conn->close();
?>
    </div>
    <footer class="bg-dark text-white text-center p-3">
    © 2025 - Trang quản lý sách | Thiết kế bởi Trí Nhàn
</footer>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
