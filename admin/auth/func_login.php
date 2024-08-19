<?php
include '../../config/init.php';
function login($username, $password)
{
    // Kết nối đến cơ sở dữ liệu
    $mysqli = open();

    // Tránh SQL Injection
    $username = $mysqli->real_escape_string($username);
    $password = $mysqli->real_escape_string($password);

    // Truy vấn để lấy thông tin người dùng
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $mysqli->query($sql);

    // Kiểm tra nếu người dùng tồn tại
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Kiểm tra mật khẩu (giả sử mật khẩu đã được mã hóa bằng hàm password_hash)
        if (password_verify($password, $user['password'])) {
            // Khởi tạo session
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            return true; // Đăng nhập thành công
        } else {
            return false; // Mật khẩu không đúng
        }
    } else {
        return false; // Người dùng không tồn tại
    }

    // Đóng kết nối
    $mysqli->close();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (login($username, $password)) {
        echo "Đăng nhập thành công! Chào mừng " . $_SESSION['username'];
    } else {
        echo "Tên đăng nhập hoặc mật khẩu không đúng.";
    }
}
?>