<?php
require_once '../config/headers.php';
require_once '../config/database.php';
require_once '../objects/destination.php';

$database = new Database();
$db = $database->getConnection();

$destination = new Destination($db);
$destination->id = isset($_GET['id']) ? $_GET['id'] : die();

if($destination->readOne()) {
    $destination_arr = array(
        "id" => $destination->id,
        "name" => $destination->name,
        "description" => $destination->description,
        "location" => $destination->location,
        "image_url" => $destination->image_url,
        "created_at" => $destination->created_at,
        "updated_at" => $destination->updated_at
    );

    http_response_code(200);
    echo json_encode($destination_arr);
} else {
    http_response_code(404);
    echo json_encode(array("message" => "Destinasi tidak ditemukan."));
}