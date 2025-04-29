<?php
define('DB_HOST', 'mysql.render.com'); // Cập nhật theo Render
define('DB_USER', 'root'); // Tài khoản MySQL
define('DB_PASS', ''); // Mật khẩu MySQL
define('DB_NAME', 'ql_sach'); // Tên database

// Kết nối MySQL
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
