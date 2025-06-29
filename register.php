<?php
require_once '../config/headers.php';
require_once '../config/database.php';
require_once '../objects/user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$data = json_decode(file_get_contents("php://input"));

if(
    !empty($data->username) &&
    !empty($data->password) &&
    !empty($data->name)
) {
    $user->username = $data->username;
    $user->password = $data->password;
    $user->name = $data->name;
    $user->role = isset($data->role) ? $data->role : 'user';

    if($user->create()) {
        $response = array(
            "success" => true,
            "message" => "User berhasil dibuat."
        );
        http_response_code(201);
    } else {
        $response = array(
            "success" => false,
            "message" => "Gagal membuat user."
        );
        http_response_code(503);
    }
} else {
    $response = array(
        "success" => false,
        "message" => "Data tidak lengkap."
    );
    http_response_code(400);
}
// Tambahkan ini sebelum echo json_encode($response);
if (!$user->create()) {
    // Tampilkan error PDO jika ada
    $errorInfo = $user->conn->errorInfo();
    $response['debug'] = $errorInfo;
}
echo json_encode($response);