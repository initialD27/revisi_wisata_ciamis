<?php
require_once '../config/headers.php';
require_once '../config/database.php';
require_once '../objects/destination.php';

$database = new Database();
$db = $database->getConnection();

$destination = new Destination($db);

// Cek apakah request menggunakan JSON atau FormData
$contentType = $_SERVER["CONTENT_TYPE"] ?? '';

if (strpos($contentType, 'application/json') !== false) {
    // Handle JSON data
    $data = json_decode(file_get_contents("php://input"));
    
    if(!empty($data->id)) {
        $destination->id = $data->id;
        $destination->name = $data->name;
        $destination->description = $data->description;
        $destination->location = $data->location;
        $destination->image_url = $data->image_url;
    } else {
        http_response_code(400);
        echo json_encode(array("message" => "Data tidak lengkap."));
        exit;
    }
} else {
    // Handle FormData
    if(!empty($_POST['id'])) {
        $destination->id = $_POST['id'];
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
    } else {
        http_response_code(400);
        echo json_encode(array("message" => "Data tidak lengkap."));
        exit;
    }
}

if($destination->update()) {
    http_response_code(200);
    echo json_encode(array("message" => "Destinasi wisata berhasil diperbarui."));
} else {
    http_response_code(503);
    echo json_encode(array("message" => "Tidak dapat memperbarui destinasi wisata."));
}