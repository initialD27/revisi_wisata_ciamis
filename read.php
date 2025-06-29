<?php
require_once '../config/headers.php';
require_once '../config/database.php';
require_once '../objects/about.php';

$database = new Database();
$db = $database->getConnection();

$about = new About($db);
$stmt = $about->read();
$num = $stmt->rowCount();

if($num > 0) {
    $about_arr = array();
    $about_arr["records"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $about_item = array(
            "id" => $id,
            "nama_kota" => $nama_kota,
            "deskripsi" => $deskripsi,
            "foto" => $foto
        );
        array_push($about_arr["records"], $about_item);
    }
    http_response_code(200);
    echo json_encode($about_arr);
} else {
    http_response_code(404);
    echo json_encode(array("message" => "Data tidak ditemukan."));
}