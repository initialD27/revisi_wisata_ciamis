<?php
require_once '../config/headers.php';
require_once '../config/database.php';
require_once '../objects/about.php';

$database = new Database();
$db = $database->getConnection();

$about = new About($db);

if(isset($_GET['id'])) {
    $about->id = $_GET['id'];
    $about->readOne();

    if($about->nama_kota != null) {
        $about_arr = array(
            "id" => $about->id,
            "nama_kota" => $about->nama_kota,
            "deskripsi" => $about->deskripsi,
            "foto" => $about->foto
        );
        http_response_code(200);
        echo json_encode($about_arr);
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "Data tidak ditemukan."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "ID tidak ditemukan."));
}