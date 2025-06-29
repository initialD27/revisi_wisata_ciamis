<?php
require_once '../config/headers.php';
require_once '../config/database.php';
require_once '../objects/about.php';

$database = new Database();
$db = $database->getConnection();

$about = new About($db);

$data = json_decode(file_get_contents("php://input"));

if(!empty($data->id)) {
    $about->id = $data->id;
    
    if($about->delete()) {
        http_response_code(200);
        echo json_encode(array("message" => "Data berhasil dihapus."));
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Gagal menghapus data."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Data tidak lengkap."));
}