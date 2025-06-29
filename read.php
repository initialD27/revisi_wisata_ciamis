<?php
require_once '../config/headers.php';
require_once '../config/database.php';
require_once '../objects/gallery.php';

$database = new Database();
$db = $database->getConnection();

$gallery = new Gallery($db);
$stmt = $gallery->read();
$num = $stmt->rowCount();

if($num > 0) {
    $gallery_arr = array();
    $gallery_arr["records"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $gallery_item = array(
            "id" => $id,
            "image_url" => $image_url,
            "created_at" => $created_at
        );
        array_push($gallery_arr["records"], $gallery_item);
    }

    http_response_code(200);
    echo json_encode($gallery_arr);
} else {
    http_response_code(404);
    echo json_encode(array("message" => "Tidak ada foto."));
}