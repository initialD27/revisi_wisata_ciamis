<?php
require_once '../config/headers.php';
require_once '../config/database.php';
require_once '../objects/destination.php';

$database = new Database();
$db = $database->getConnection();

$destination = new Destination($db);

$data = json_decode(file_get_contents("php://input"));

if(!empty($data->id)) {
    $destination->id = $data->id;

    if($destination->delete()) {
        http_response_code(200);
        echo json_encode(array("message" => "Destinasi wisata berhasil dihapus."));
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Tidak dapat menghapus destinasi wisata."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Data tidak lengkap."));
}