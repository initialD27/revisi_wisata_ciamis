<?php
require_once '../config/headers.php';
require_once '../config/database.php';
require_once '../objects/gallery.php';

$database = new Database();
$db = $database->getConnection();

$gallery = new Gallery($db);

$data = json_decode(file_get_contents("php://input"));

if(!empty($data->id)) {
    $gallery->id = $data->id;
    
    if($gallery->delete()) {
        http_response_code(200);
        echo json_encode(array("message" => "Foto berhasil dihapus."));
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Tidak dapat menghapus foto."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Data tidak lengkap."));
}