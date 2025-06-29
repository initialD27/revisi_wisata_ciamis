<?php
require_once '../config/headers.php';
require_once '../config/database.php';
require_once '../objects/destination.php';

$database = new Database();
$db = $database->getConnection();

$destination = new Destination($db);

if(
    !empty($_POST['name']) &&
    !empty($_POST['description']) &&
    !empty($_POST['location'])
) {
    $destination->name = $_POST['name'];
    $destination->description = $_POST['description'];
    $destination->location = $_POST['location'];
    
    // Handle image upload
    if(isset($_FILES['image'])) {
        $target_dir = "../../assets/images/best-destination/";
        $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        $file_name = uniqid() . '.' . $file_extension;
        $target_file = $target_dir . $file_name;
        
        if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $destination->image_url = "assets/images/best-destination/" . $file_name;
        }
    }

    if($destination->create()) {
        http_response_code(201);
        echo json_encode(array("message" => "Destinasi wisata berhasil dibuat."));
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Tidak dapat membuat destinasi wisata."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Data tidak lengkap."));
}