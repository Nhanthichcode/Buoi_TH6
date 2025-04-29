<style>
    navbar-nav {
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
</style>
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="../../upload/disk.png" alt="Logo" width="32" height="32"> Menu
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#">Đăng nhập</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Đăng ký</a></li>
                <li class="nav-item"><a class="nav-link" href="them_sach.php">Thêm sách</a></li>
                <li class="nav-item"><a class="nav-link" href="danhsach.php">Xem danh sách</a></li>
            </ul>
        </div>
    </div>
</nav>