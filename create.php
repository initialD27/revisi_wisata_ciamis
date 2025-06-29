<?php
require_once '../config/headers.php';
require_once '../config/database.php';
require_once '../objects/gallery.php';

$database = new Database();
$db = $database->getConnection();

$gallery = new Gallery($db);

if(isset($_FILES['image'])) {
    $target_dir = "../../assets/images/gallery/";
    $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    $file_name = uniqid() . '.' . $file_extension;
    $target_file = $target_dir . $file_name;
    
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $gallery->image_url = "assets/images/gallery/" . $file_name;
        
        if($gallery->create()) {
            http_response_code(201);
            echo json_encode(array("message" => "Foto berhasil ditambahkan."));
        } else {
            http_response_code(503);
            echo json_encode(array("message" => "Tidak dapat menambahkan foto."));
        }
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Gagal mengupload foto."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Data tidak lengkap."));
}