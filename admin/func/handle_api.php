<?php

function handleRequest()
{
    // Lấy hành động từ request
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

    // Lấy dữ liệu từ request (ví dụ dữ liệu gửi từ form)
    $data = isset($_REQUEST['data']) ? $_REQUEST['data'] : null;

    switch ($action) {
        case 'create':
            return createUser($data);
        
        case 'read':
            return readUser($data);
        
        case 'update':
            return updateUser($data);
        
        case 'delete':
            return deleteUser($data);
        
        default:
            return "Hành động không hợp lệ.";
    }
}

// Các hàm CRUD giả định
function createUser($data)
{
    // Thực hiện logic tạo người dùng
    return "Người dùng đã được tạo với dữ liệu: " . json_encode($data);
}

function readUser($data)
{
    // Thực hiện logic đọc thông tin người dùng
    return "Thông tin người dùng với ID: " . $data['id'];
}

function updateUser($data)
{
    // Thực hiện logic cập nhật người dùng
    return "Người dùng với ID " . $data['id'] . " đã được cập nhật.";
}

function deleteUser($data)
{
    // Thực hiện logic xóa người dùng
    return "Người dùng với ID " . $data['id'] . " đã được xóa.";
}
