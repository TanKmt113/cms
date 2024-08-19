<?php
function isUserLoggedIn()
{
    // Bắt đầu session nếu chưa được bắt đầu
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Kiểm tra nếu session 'user_id' tồn tại
    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
        return true; // Người dùng đã đăng nhập
    } else {
        return false; // Người dùng chưa đăng nhập
    }
}
// Kiểm tra nếu người dùng đã đăng nhập
if (isUserLoggedIn()) {
    echo "Chào mừng bạn, " . $_SESSION['username'];
} else {
    echo "Bạn chưa đăng nhập. Vui lòng đăng nhập để tiếp tục.";
    // Hoặc chuyển hướng người dùng đến trang đăng nhập
    // header("Location: login.php");
    // exit();
}