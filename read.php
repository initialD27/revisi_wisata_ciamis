<?php
require_once '../config/headers.php';
require_once '../config/database.php';
require_once '../objects/destination.php';

$database = new Database();
$db = $database->getConnection();

$destination = new Destination($db);
$stmt = $destination->read();
$num = $stmt->rowCount();

if($num > 0) {
    $destinations_arr = array();
    $destinations_arr["records"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $destination_item = array(
            "id" => $id,
            "name" => $name,
            "description" => $description,
            "location" => $location,
            "image_url" => $image_url,
            "created_at" => $created_at,
            "updated_at" => $updated_at
        );
        array_push($destinations_arr["records"], $destination_item);
    }

    http_response_code(200);
    echo json_encode($destinations_arr);
} else {
    http_response_code(404);
    echo json_encode(array("message" => "No destinations found."));
}
