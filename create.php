<?php
require_once '../config/headers.php';
require_once '../config/database.php';
require_once '../objects/about.php';

$database = new Database();
$db = $database->getConnection();

$about = new About($db);

if(isset($_POST['nama_kota']) && isset($_POST['deskripsi']) && isset($_FILES['foto'])) {
    $target_dir = "../../assets/images/about/";
    $file_extension = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
    $file_name = uniqid() . '.' . $file_extension;
    $target_file = $target_dir . $file_name;
    
    if(move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
        $about->nama_kota = $_POST['nama_kota'];
        $about->deskripsi = $_POST['deskripsi'];
        $about->foto = "assets/images/about/" . $file_name;
        
        if($about->create()) {
            http_response_code(201);
            echo json_encode(array("message" => "Data berhasil ditambahkan."));
        } else {
            http_response_code(503);
            echo json_encode(array("message" => "Gagal menambahkan data."));
        }
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Gagal mengupload file."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Data tidak lengkap."));
}