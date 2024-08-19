<?php 
function compressImage($source, $destination, $quality) {
    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg') {
        $image = imagecreatefromjpeg($source);
    } elseif ($info['mime'] == 'image/gif') {
        $image = imagecreatefromgif($source);
    } elseif ($info['mime'] == 'image/png') {
        $image = imagecreatefrompng($source);
    } else {
        return false;
    }
    imagejpeg($image, $destination, $quality);

    imagedestroy($image);

    return true;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $source = $_FILES['image']['tmp_name'];
    $destination = 'uploads/' . $_FILES['image']['name'];
    $quality = 75; // Chất lượng ảnh từ 0-100, 100 là chất lượng gốc

    if (compressImage($source, $destination, $quality)) {
        echo "Ảnh đã được upload và nén thành công.";
    } else {
        echo "Upload ảnh thất bại.";
    }
}
?>