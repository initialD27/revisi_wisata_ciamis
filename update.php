<?php
require_once '../config/headers.php';
require_once '../config/database.php';
require_once '../objects/gallery.php';

$database = new Database();
$db = $database->getConnection();

$gallery = new Gallery($db);

if(isset($_POST['id']) && isset($_FILES['image'])) {
    $gallery->id = $_POST['id'];
    
    $target_dir = "../../assets/images/gallery/";
    $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    $file_name = uniqid() . '.' . $file_extension;
    $target_file = $target_dir . $file_name;
    
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $gallery->image_url = "assets/images/gallery/" . $file_name;
        
        if($gallery->update()) {
            http_response_code(200);
            echo json_encode(array("message" => "Foto berhasil diperbarui."));
        } else {
            http_response_code(503);
            echo json_encode(array("message" => "Gagal memperbarui foto."));
        }
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Gagal mengupload file."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Data tidak lengkap."));
}